<?php

// app/Http/Controllers/PaymentController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;

class PaymentController extends Controller
{
    public function initiatePayment()
    {
        $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));

        $order = $api->order->create([
            'receipt' => 'order_rcptid_11',
            'amount' => 50000, // amount in paise (50000 paise = 500 INR)
            'currency' => 'INR'
        ]);

        return view('payment', ['order' => $order]);
    }

    public function paymentSuccess(Request $request)
    {
        $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));

        $attributes = [
            'razorpay_order_id' => $request->razorpay_order_id,
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'razorpay_signature' => $request->razorpay_signature
        ];

        try {
            $api->utility->verifyPaymentSignature($attributes);
            // Payment successful
            return view('payment-success');
        } catch (\Exception $e) {
            // Payment failed
            return view('payment-failed');
        }
    }
}
