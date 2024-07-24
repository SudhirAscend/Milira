<?php
// app/Http/Controllers/CartController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartDetail;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product = Product::find($request->product_id);
        
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                "name" => $product->title, // Updated to use 'title'
                "quantity" => 1,
                "price" => $product->price,
            ];
        }

        // Save to session
        session()->put('cart', $cart);

        // Save to database
        $this->saveCartToDatabase($cart);

        return response()->json(['message' => 'Product added to cart successfully!'], 200);
    }

    public function index()
    {
        $cart = session()->get('cart');
        return view('cart', compact('cart'));
    }

    public function clearCart()
    {
        session()->forget('cart');

        // Clear the cart details from the database as well
        CartDetail::truncate();

        return redirect()->route('cart.index')->with('success', 'Cart cleared successfully!');
    }

    private function saveCartToDatabase($cart)
    {
        // Clear previous cart details
        CartDetail::truncate();

        // Save new cart details
        foreach ($cart as $productId => $details) {
            CartDetail::create([
                'product_id' => $productId,
                'name' => $details['name'],
                'quantity' => $details['quantity'],
                'price' => $details['price'],
            ]);
        }
    }
}
