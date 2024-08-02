<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;
use App\Models\Product;
use App\Models\Wishlist;
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
        $cartItemsa = CartDetail::where('user_id', $user->id)->with('product')->get();
        $addresses = Address::where('user_id', $user->id)->get();

        $totalAmount = $cartItemsa->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        $user_id = Auth::id();
        $wishlistProductIds = Wishlist::where('user_id', $user_id)->pluck('product_id')->toArray();
        $wishlistCount = Wishlist::where('user_id', $user_id)->count();

        // Fetch cart items from the database for the logged-in user
        $cartItems = Cart::where('user_id', $user_id)->with('product')->get();
        $cartCount = $cartItems->count();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('checkout', compact('cartItemsa', 'addresses', 'totalAmount','wishlistCount', 'cartItems', 'cartCount', 'subtotal'));
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
    public function storeAddress(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:100',
            'postcode' => 'required|string|max:20',
        ]);
    
        $user = Auth::user();
    
        // If "Set as default address" is checked, set all other addresses to non-default
        if ($request->has('is_default') && $request->is_default) {
            Address::where('user_id', $user->id)->update(['is_default' => 0]);
        }
    
        // Create the new address
        Address::create([
            'user_id' => $user->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'address' => $request->address,
            'city' => $request->city,
            'postcode' => $request->postcode,
            'is_default' => $request->has('is_default') ? 1 : 0,
        ]);
    
        return redirect('checkout');
    }
}
