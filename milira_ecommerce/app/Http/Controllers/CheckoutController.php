<?php
// app/Http/Controllers/CheckoutController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart; // Assume you have a Cart model to handle user's cart items

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $product_id = $request->input('product_id');
        $user = Auth::user();

        // Add the product to the user's cart
        $cart = new Cart();
        $cart->user_id = $user->id;
        $cart->product_id = $product_id;
        $cart->save();

        return redirect()->route('checkout.show');
    }

    public function showCheckoutPage()
    {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->with('product')->get();

        return view('checkout', compact('cartItems'));
    }
}

