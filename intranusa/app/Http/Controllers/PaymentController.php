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


    $orderId = 'ORDER-' . time(); // Atau pakai UUID
    $order = Order::create([
        'user_id' => $user->id,
        'paket_id' => $paket->id,
        'pelanggan_id' => $pelanggan->pelanggan_id,
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
    // public function checkout(Request $request)
    // {
    //     $pelanggan = Pelanggan::with('paket')->findOrFail($request->pelanggan_id);
    //     $paket = $pelanggan->paket;
    //     $user = $pelanggan->user;

    //     $total = $paket->harga;

    //     $order = Order::create([
    //         'user_id' => $user->id,
    //         'paket_id' => $paket->id,
    //         'total_price' => $total,
    //         'status' => 'Unpaid',
    //     ]);

    //     // Midtrans config
    //     \Midtrans\Config::$serverKey = config('midtrans.server_key');
    //     \Midtrans\Config::$isProduction = config('midtrans.is_production');
    //     \Midtrans\Config::$isSanitized = true;
    //     \Midtrans\Config::$is3ds = true;

    //     $params = [
    //         'transaction_details' => [
    //             'order_id' => $order->id,
    //             'gross_amount' => $total, // Make sure this is the correct total
    //         ],
    //         'customer_details' => [
    //             'first_name' => $user->name,
    //             'phone' => $user->phone,
    //         ],
    //         'item_details' => [
    //             [
    //                 'id' => $paket->id,
    //                 'price' => $paket->harga,
    //                 'quantity' => 1,
    //                 'name' => $paket->nama_paket, // Ensure this is not empty
    //             ]
    //         ]
    //     ];

    //     // Ensure that the gross amount is the same as the sum of item details
    //     $itemTotal = $paket->harga * 1; // Assuming 1 quantity

    //     if ($total !== $itemTotal) {
    //         // Handle error if the amounts do not match
    //         return redirect()->back()->with('error', 'Total price mismatch');
    //     }

    //     $snapToken = \Midtrans\Snap::getSnapToken($params);
    //     return view('user.payment', compact('snapToken', 'order', 'paket'));
    // }


    public function callback(Request $request)
    {
        \Log::info('🔔 Callback diterima dari Midtrans');
        \Log::info($request->all());

        $data = json_decode($request->getContent(), true);
        $serverKey = config('midtrans.server_key');

        $orderId = $data['order_id'] ?? null;
        $statusCode = $data['status_code'] ?? null;
        $grossAmount = number_format($data['gross_amount'] ?? 0, 2, '.', '');
        $signatureKey = $data['signature_key'] ?? null;
        $transactionStatus = $data['transaction_status'] ?? null;

        $computedSignature = hash('sha512', $orderId . $statusCode . $grossAmount . $serverKey);

        \Log::info("✅ Computed Signature: $computedSignature");
        \Log::info("📝 Original Signature: $signatureKey");

        if ($computedSignature === $signatureKey) {
            \Log::info('🔒 Signature cocok');

            $order = Order::where('order_id', $orderId)->first();

            if ($order) {
                \Log::info("📦 Order ditemukan: ID $orderId - Status transaksi: $transactionStatus");

                switch ($transactionStatus) {
                    case 'capture':
                    case 'settlement':
                        $order->update(['status' => 'Paid']);
                        \Log::info("💰 Order ID $orderId diupdate jadi Paid");

                        // ✅ DITAMBAHKAN: update status_pelanggan di tabel pelanggan
                        if ($order->pelanggan) {
                            $order->pelanggan->update(['status_langganan' => 'Aktif']);
                            \Log::info("✅ Status pelanggan (ID: {$order->pelanggan->id}) diupdate jadi Aktif");
                        } else {
                            \Log::warning("⚠️ Pelanggan tidak ditemukan untuk order ID: $orderId");
                        }

                        if ($order->user) {
                            $order->user->update(['status_langganan' => 'Aktif']);
                            \Log::info("✅ Status user (ID: {$order->user->id}) diupdate jadi Aktif");
                        } else {
                            \Log::warning("⚠️ User tidak ditemukan untuk order ID: $orderId");
                        }


                        break;

                    case 'pending':
                        $order->update(['status' => 'Pending']);
                        \Log::info("⏳ Order ID $orderId diupdate jadi Pending");
                        break;

                    case 'deny':
                    case 'cancel':
                    case 'expire':
                        $order->update(['status' => 'Failed']);
                        \Log::info("❌ Order ID $orderId diupdate jadi Failed");
                        break;

                    default:
                        \Log::warning("❓ Status transaksi tidak dikenali: $transactionStatus");
                        break;
                }
            } else {
                \Log::warning("🚫 Order dengan ID $orderId tidak ditemukan di database.");
            }
        } else {
            \Log::warning('❗ Signature tidak cocok - Callback ditolak');
        }

        return response()->json(['message' => 'OK'], 200);
    }

    public function invoice($id)
    {
        // $order = Order::find($id);
        $order = Order::with('user')->findOrFail($id);
        return view('user.invoice', compact('order'));
    }
}
