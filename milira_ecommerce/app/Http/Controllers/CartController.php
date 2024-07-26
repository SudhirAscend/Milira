<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartDetail;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('addToCart', 'index', 'clearCart', 'removeFromCart');
    }

    public function addToCart(Request $request)
{
    if (!Auth::check()) {
        return response()->json(['message' => 'Please login to add products to cart'], 401);
    }

    $product = Product::find($request->product_id);
    
    if (!$product) {
        return response()->json(['message' => 'Product not found'], 404);
    }

    $cart = session()->get('cart', []);

    if (isset($cart[$product->id])) {
        $cart[$product->id]['quantity']++;
    } else {
        $cart[$product->id] = [
            "name" => $product->title,
            "quantity" => 1,
            "price" => $product->price,
            "image" => asset('storage/uploads/' . $product->title . '_0.jpg') // Ensure correct image path
        ];
    }

    // Save to session
    session()->put('cart', $cart);

    // Save to database
    $this->saveCartToDatabase($cart);

    // Calculate the subtotal
    $subtotal = array_reduce($cart, function($sum, $item) {
        return $sum + ($item['price'] * $item['quantity']);
    }, 0);

    return response()->json([
        'message' => 'Product added to cart successfully!',
        'cart' => $cart,
        'subtotal' => $subtotal,
        'cartCount' => count($cart)
    ], 200);
}



public function index()
{
    $cart = session()->get('cart', []);
    $cartCount = count($cart);
    $subtotal = array_reduce($cart, function($sum, $item) {
        return $sum + ($item['price'] * $item['quantity']);
    }, 0);

    return view('cart', compact('cart', 'cartCount', 'subtotal'));
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
    public function remove(Request $request)
{
    if (!Auth::check()) {
        return response()->json(['message' => 'Please login to remove products from cart'], 401);
    }

    $productId = $request->product_id;
    $cart = session()->get('cart', []);

    if (isset($cart[$productId])) {
        unset($cart[$productId]);

        // Save to session
        session()->put('cart', $cart);

        // Remove from database
        CartDetail::where('product_id', $productId)->delete();

        // Calculate the subtotal
        $subtotal = array_reduce($cart, function ($sum, $item) {
            return $sum + ($item['price'] * $item['quantity']);
        }, 0);

        return response()->json([
            'message' => 'Product removed from cart successfully!',
            'cart' => $cart,
            'subtotal' => $subtotal,
            'cartCount' => count($cart)
        ], 200);
    }

    return response()->json(['message' => 'Product not found in cart'], 404);
}

}
