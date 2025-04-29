<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Midtrans\Snap;
use Midtrans\Config;
use Illuminate\Support\Str;

class TagihanController extends Controller
{
    public function __construct()
    {
        // Configure Midtrans API credentials
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = false;  // Set to true in production
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    // ✅ Fungsi untuk halaman bayar
    public function pay(Order $order)
    {
        // Generate a unique order_id if needed
        $order_id = 'ORDER-' . Str::uuid();  // Using UUID for a unique order ID

        // Prepare the payment parameters
        $params = [
            'transaction_details' => [
                'order_id' => $order_id,  // Use the generated unique order_id
                'gross_amount' => $order->total_price,
            ],
            'customer_details' => [
                'first_name' => $order->pelanggan->user->name ?? 'User',
                'email' => $order->pelanggan->user->email ?? 'user@example.com',
            ],
        ];

        try {
            // Request a Snap Token from Midtrans
            $snapToken = Snap::getSnapToken($params);

            // Return the view with the Snap Token for client-side processing
            return view('user.tagihan', compact('snapToken'));

        } catch (\Exception $e) {
            // Handle any errors that occur when contacting Midtrans API
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    // ✅ Fungsi untuk menangani callback Midtrans
    public function callback(Request $request)
    {
        // Validate that all necessary parameters are present
        $validated = $request->validate([
            'order_id' => 'required|string',
            'status_code' => 'required|string',
            'gross_amount' => 'required|numeric',
            'signature_key' => 'required|string',
        ]);

        $serverKey = config('midtrans.server_key');
        $signatureKey = hash('sha512',
            $request->order_id .
            $request->status_code .
            $request->gross_amount .
            $serverKey
        );

        // Check if the signature matches
        if ($signatureKey !== $request->signature_key) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        // Find the order by the provided order_id
        $order = Order::where('order_id', $request->order_id)->first();

        // If order is not found, return error
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        // Handle the transaction status
        if ($request->transaction_status === 'settlement') {
            $order->status = 'Paid';
            $order->save();
        }

        return response()->json(['message' => 'Callback processed successfully']);
    }
}
