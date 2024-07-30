<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function showCheckoutPage()
    {
        $user = Auth::user();
        $cartItems = CartDetail::where('user_id', $user->id)->with('product')->get();
        $addresses = Address::where('user_id', $user->id)->get();

        $totalAmount = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        return view('checkout', compact('cartItems', 'addresses', 'totalAmount'));
    }

    public function storeOrder(Request $request)
    {
        $user = Auth::user();
        $cartItems = CartDetail::where('user_id', $user->id)->with('product')->get();
        $totalAmount = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        DB::beginTransaction();

        try {
            // Create a new order
            $order = Order::create([
                'user_id' => $user->id,
                'order_id' => 'ORD_' . strtoupper(uniqid()),
                'status' => 'pending',
                'total_amount' => $totalAmount,
            ]);

            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product->id,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                ]);
            }

            // Initialize Razorpay payment
            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
            $razorpayOrder = $api->order->create([
                'receipt' => $order->order_id,
                'amount' => $totalAmount * 100,
                'currency' => 'INR'
            ]);

            $order->payment_id = $razorpayOrder->id;
            $order->save();

            DB::commit();

            return response()->json(['order_id' => $order->order_id, 'razorpay_order_id' => $razorpayOrder->id]);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Order creation failed', [
                'error' => $e->getMessage(),
                'user_id' => $user->id,
                'cartItems' => $cartItems,
                'totalAmount' => $totalAmount,
            ]);

            if (isset($order)) {
                $order->status = 'failed';
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

            // Move items from CartDetail to OrderItem and clear CartDetail
            $cartItems = CartDetail::where('user_id', $order->user_id)->get();
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                ]);
                $item->delete();
            }

            // Clear the session cart
            session()->forget('cart');

            return redirect()->route('thank-you');
        } else {
            return redirect()->route('checkout.show')->with('error', 'Payment verification failed. Please try again.');
        }
    }
}
