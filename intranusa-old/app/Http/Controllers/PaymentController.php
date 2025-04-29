<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Pelanggan;
use App\Models\Paket;
use App\Models\Order;

class PaymentController extends Controller
{
     public function showPaymentPage()
{
    $user = auth()->user();

    // Ambil data pelanggan user yang sudah di-ACC admin
    $pelanggan = Pelanggan::with('paket')->where('user_id', $user->id)
        ->where('status_langganan', 'Disetujui') // pastikan hanya yang sudah di-ACC
        ->latest()
        ->first();

    if (!$pelanggan) {
        return redirect()->back()->with('error', 'Belum ada pengajuan disetujui.');
    }

    // Midtrans config
    \Midtrans\Config::$serverKey = config('midtrans.server_key');
    \Midtrans\Config::$isProduction = config('midtrans.is_production');
    \Midtrans\Config::$isSanitized = true;
    \Midtrans\Config::$is3ds = true;

    $paket = $pelanggan->paket;
    $user = $pelanggan->user;

    $total = $paket->harga;

    // // Membuat order
    // $order = Order::create([
    //     'user_id' => $user->id,
    //     'paket_id' => $paket->id,
    //    'id_pelanggan' => $pelanggan->id_pelanggan,  // <-- ini wajib diisi
    //     'total_price' => $total,
    //     'status' => 'Unpaid',
    // ]);

    $orderId = 'ORDER-' . time(); // Atau pakai UUID
    $order = Order::create([
        'user_id' => $user->id,
        'paket_id' => $paket->id,
        'id_pelanggan' => $pelanggan->id_pelanggan,
        'total_price' => $total,
        'status' => 'Unpaid',
        'order_id' => $orderId, // <- penting!
    ]);

    $params = [
        'transaction_details' => [
            'order_id' => $orderId, // Misalnya bisa menggunakan time() untuk order_id yang unik
            'gross_amount' => $total,
        ],
        'customer_details' => [
            'first_name' => $user->username,
            'phone' => $user->phone,
        ],
        'item_details' => [[
            'id' => $paket->id,
            'price' => $paket->harga,
            'quantity' => 1,
            'name' => $paket->nama_paket
        ]],
    ];

    // Menghasilkan Snap Token
    $snapToken = \Midtrans\Snap::getSnapToken($params);

    // Kirimkan variabel $order ke view
    return view('user.payment', compact('pelanggan', 'snapToken', 'paket', 'order'));
}


    // Metode ini dipanggil ketika user melakukan pembayaran
    public function checkout(Request $request)
    {
        $pelanggan = Pelanggan::with('paket')->findOrFail($request->id_pelanggan);
        $paket = $pelanggan->paket;
        $user = $pelanggan->user;

        $total = $paket->harga;

        $order = Order::create([
            'user_id' => $user->id,
            'paket_id' => $paket->id,
            'total_price' => $total,
            'status' => 'Unpaid',
        ]);

        // Midtrans config
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $order->id,
                'gross_amount' => $total, // Make sure this is the correct total
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'phone' => $user->phone,
            ],
            'item_details' => [
                [
                    'id' => $paket->id,
                    'price' => $paket->harga,
                    'quantity' => 1,
                    'name' => $paket->nama_paket, // Ensure this is not empty
                ]
            ]
        ];

        // Ensure that the gross amount is the same as the sum of item details
        $itemTotal = $paket->harga * 1; // Assuming 1 quantity

        if ($total !== $itemTotal) {
            // Handle error if the amounts do not match
            return redirect()->back()->with('error', 'Total price mismatch');
        }

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('user.payment', compact('snapToken', 'order', 'paket'));
    }

    public function callback(Request $request)
    {
        \Log::info('Callback diterima');
        \Log::info('Data callback:', $request->all());

        $serverKey = config('midtrans.server_key');
        $orderId = $request->order_id; // Pastikan ini sesuai dengan yang disimpan
        $statusCode = $request->status_code;
        $grossAmount = $request->gross_amount; // Ambil nilai asli
        $signatureKey = $request->signature_key;

        // Hitung signature lokal
        $computedSignature = hash('sha512', $orderId . $statusCode . $grossAmount . $serverKey);

        \Log::info("Computed Signature: $computedSignature");
        \Log::info("Original Signature: $signatureKey");

        // Cek apakah signature cocok
        if ($computedSignature === $signatureKey) {
            \Log::info('Signature cocok');

            // Proses status transaksi
            $order = Order::where('order_id', $orderId)->first();
            if ($order) {
                switch ($request->transaction_status) {
                    case 'capture':
                    case 'settlement':
                        $order->update(['status' => 'Paid']);
                        \Log::info("Order ID $orderId diupdate jadi Paid");
                        break;

                    case 'pending':
                        $order->update(['status' => 'Pending']);
                        \Log::info("Order ID $orderId diupdate jadi Pending");
                        break;

                    case 'deny':
                    case 'cancel':
                    case 'expire':
                        $order->update(['status' => 'Failed']);
                        \Log::info("Order ID $orderId diupdate jadi Failed");
                        break;
                }
            } else {
                \Log::warning("⚠️ Order dengan order_id $orderId tidak ditemukan di DB");
            }
        } else {
            \Log::warning('Signature tidak cocok');
        }

        return response()->json(['message' => 'OK'], 200);
    }



    // public function callback(Request $request)
    // {
    //     \Log::info('Callback diterima');
    //     \Log::info('Data callback:', $request->all());

    //     $serverKey = config('midtrans.server_key');
    //     $orderId = $request->order_id; // Pastikan ini sesuai dengan yang disimpan
    //     $statusCode = $request->status_code;
    //     $grossAmount = $request->gross_amount; // Ambil nilai asli
    //     $signatureKey = $request->signature_key;

    //     // Hitung signature lokal
    //     $computedSignature = hash('sha512', $orderId . $statusCode . $grossAmount . $serverKey);

    //     \Log::info("Computed Signature: $computedSignature");
    //     \Log::info("Original Signature: $signatureKey");
    //     \Log::info($request->all());

    //     // Cek apakah signature cocok
    //     if ($computedSignature === $signatureKey) {
    //         \Log::info('Signature cocok');

    //         // Jika status transaksi adalah 'capture' atau 'settlement'
    //         if (in_array($request->transaction_status, ['capture', 'settlement'])) {
    //             $order = Order::where('order_id', $orderId)->first();
    //             if ($order) {
    //                 $order->update(['status' => 'Paid']);
    //                 \Log::info("Order ID $orderId diupdate jadi Paid");

    //                 // Update status pelanggan menjadi Aktif
    //                 $pelanggan = Pelanggan::where('user_id', $order->user_id)
    //                     ->where('paket_id', $order->paket_id)
    //                     ->latest()
    //                     ->first();

    //                 if ($pelanggan) {
    //                     $pelanggan->update(['status_langganan' => 'Aktif']);
    //                     \Log::info("Pelanggan ID {$pelanggan->id} diupdate jadi Aktif");
    //                 } else {
    //                     \Log::warning("⚠️ Pelanggan untuk Order ID $orderId tidak ditemukan di DB");
    //                 }
    //             } else {
    //                 \Log::warning("⚠️ Order dengan order_id $orderId tidak ditemukan di DB");
    //             }
    //         } elseif ($request->transaction_status == 'pending') {
    //             // Jika status transaksi adalah 'pending'
    //             $order = Order::where('order_id', $orderId)->first();
    //             if ($order) {
    //                 $order->update(['status' => 'Pending']);
    //                 \Log::info("Order ID $orderId diupdate jadi Pending");
    //             }
    //         } elseif (in_array($request ->transaction_status, ['deny', 'cancel', 'expire'])) {
    //             // Jika status transaksi adalah 'deny', 'cancel', atau 'expire'
    //             $order = Order::where('order_id', $orderId)->first();
    //             if ($order) {
    //                 $order->update(['status' => 'Failed']);
    //                 \Log::info("Order ID $orderId diupdate jadi Failed");
    //             }
    //         }
    //     } else {
    //         \Log::warning('Signature tidak cocok');
    //     }

    //     return response()->json(['message' => 'OK'], 200);
    // }

    // Menampilkan invoice berdasarkan order_id
    public function invoice($id)
    {
        $order = Order::find($id);
        return view('invoice', compact('order'));
    }
}
