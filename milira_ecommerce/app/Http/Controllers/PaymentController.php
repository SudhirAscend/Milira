<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Razorpay\Api\Api;

class PaymentController extends Controller
{
    public function paymentSuccess(Request $request)
    {
        $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));

        $attributes = array(
            'razorpay_order_id' => $request->razorpay_order_id,
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'razorpay_signature' => $request->razorpay_signature
        );

        $order = Order::where('payment_id', $request->razorpay_order_id)->first();

        try {
            $api->utility->verifyPaymentSignature($attributes);
            $order->status = 'success';
            $order->save();
            return response()->json(['message' => 'Payment successful']);
        } catch (\Exception $e) {
            $order->status = 'failed';
            $order->save();
            return response()->json(['message' => 'Payment verification failed'], 500);
        }
    }
}
