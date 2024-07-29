<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;
use App\Models\Product;
use App\Models\CartDetail;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Razorpay\Api\Api;

class CheckoutController extends Controller
{
    public function showCheckoutPage()
    {
        $user = Auth::user();
        $cartItems = CartDetail::where('user_id', $user->id)->with('product')->get();
        $addresses = Address::where('user_id', $user->id)->get();

        $totalAmount = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('checkout', compact('cartItems', 'addresses', 'totalAmount'));
    }

    public function storeAddress(Request $request)
    {
        $user = Auth::user();

        $address = new Address();
        $address->user_id = $user->id;
        $address->first_name = $request->first_name;
        $address->last_name = $request->last_name;
        $address->address_line1 = $request->address_line1;
        $address->address_line2 = $request->address_line2;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->postal_code = $request->postal_code;
        $address->country = $request->country;
        $address->phone = $request->phone;
        $address->save();

        return redirect()->route('checkout.show')->with('success', 'Address saved successfully.');
    }

    public function storeOrder(Request $request)
    {
        $user = Auth::user();
        $cartItems = CartDetail::where('user_id', $user->id)->with('product')->get();
        $totalAmount = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        DB::beginTransaction();

        try {
            // Create a new order
            $order = Order::create([
                'user_id' => $user->id,
                'order_id' => 'ORD_' . strtoupper(uniqid()), // Ensure unique order ID is generated
                'status' => 'pending',
                'total_amount' => $totalAmount,
            ]);

            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product->id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);
            }

            // Clear the cart after creating the order
            CartDetail::where('user_id', $user->id)->delete();

            // Initialize Razorpay payment
            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
            $razorpayOrder = $api->order->create([
                'receipt' => $order->order_id,
                'amount' => $totalAmount * 100, // amount in paise
                'currency' => 'INR'
            ]);

            $order->payment_id = $razorpayOrder->id;
            $order->save();

            DB::commit();

            return response()->json(['order_id' => $order->order_id, 'razorpay_order_id' => $razorpayOrder->id]);
        } catch (\Exception $e) {
            DB::rollBack();

            if (isset($order)) {
                $order->status = 'failed'; // Update status to failed
                $order->save();
            }

            return response()->json(['message' => 'Order failed. Please try again.'], 500);
        }
    }

    public function paymentSuccess(Request $request)
    {
        $order_id = $request->input('order_id');
        $razorpay_payment_id = $request->input('razorpay_payment_id');

        $order = Order::where('order_id', $order_id)->first();

        if ($order && $order->payment_id == $request->input('razorpay_order_id')) {
            $order->status = 'success';
            $order->payment_id = $razorpay_payment_id;
            $order->save();

            return redirect()->route('thank-you');
        } else {
            return redirect()->route('checkout.index')->with('error', 'Payment verification failed. Please try again.');
        }
    }
}
