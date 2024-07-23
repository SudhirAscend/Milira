<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity', 1); // Default quantity is 1
        $user = Auth::user();

        // Check if the product already exists in the user's cart
        $cartItem = Cart::where('user_id', $user->id)->where('product_id', $product_id)->first();

        if ($cartItem) {
            // If it exists, update the quantity
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            // If it doesn't exist, create a new cart item
            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->product_id = $product_id;
            $cart->quantity = $quantity;
            $cart->save();
        }

        return redirect()->route('checkout.show');
    }

    public function showCheckoutPage()
    {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->with('product')->get();

        return view('checkout', compact('cartItems'));
    }
}


