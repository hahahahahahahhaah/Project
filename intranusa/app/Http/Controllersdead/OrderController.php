<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function index(){
        return view('home');
    }
    public function checkout(Request $request){
        $request->request->add(['total_price' => $request->qty * 10000, 'status' => 'Unpaid']);
        $order = Order::create($request->all());

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $order->total_price,
            ),
            'customer_details' => array(
                'first_name' => $request->name,
                'last_name' => '',
                'phone' => $request->phone,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('checkout', compact('snapToken', 'order'));
    }
    // public function callback(Request $request){
    //     $serverKey = config('midtrans.server_key');
    //     $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
    //     if($hashed == $request->signature_key){
    //         if($request->transaction_status == 'capture' or $request->transaction_status == 'settlement'){
    //             $order = Order::find($request->order_id);
    //             $order->update(['status' => 'Paid']);
    //         }
    //     }
    // }
    public function callback(Request $request)
    {
        \Log::info('Callback diterima');
        \Log::info($request->all());

        $serverKey = config('midtrans.server_key');
        $orderId = $request->order_id;
        $statusCode = $request->status_code;
        $grossAmount = number_format($request->gross_amount, 2, '.', ''); // Format disamakan
        $signatureKey = $request->signature_key;

        $computedSignature = hash('sha512', $orderId . $statusCode . $grossAmount . $serverKey);

        \Log::info("Computed Signature: $computedSignature");
        \Log::info("Original Signature: $signatureKey");

        if ($computedSignature === $signatureKey) {
            \Log::info('Signature cocok');

            if (in_array($request->transaction_status, ['capture', 'settlement'])) {
                $order = Order::find($orderId);
                if ($order) {
                    $order->update(['status' => 'Paid']);
                    \Log::info("Order ID $orderId diupdate jadi Paid");
                }
            }
        } else {
            \Log::warning('Signature tidak cocok');
        }

        // Balasan agar Midtrans tidak mengulang callback
        return response()->json(['message' => 'OK'], 200);
    }





    public function invoice($id){
        $order = Order::find($id);
        return view('invoice', compact('order'));
    }
}
