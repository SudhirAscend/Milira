<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
{
    $categories = Product::select('category')->distinct()->get();
    $colors = Product::select('color')->distinct()->pluck('color');
    $products = Product::all();

    $user_id = Auth::id();
    $wishlistProductIds = Wishlist::where('user_id', $user_id)->pluck('product_id')->toArray();
    $wishlistCount = Wishlist::where('user_id', $user_id)->count();

    $cart = session()->get('cart', []);
    $cartCount = count($cart);
    $subtotal = array_reduce($cart, function($sum, $item) {
        return $sum + ($item['price'] * $item['quantity']);
    }, 0);

    return view('shop', compact('categories', 'colors', 'products', 'wishlistProductIds', 'wishlistCount', 'cartCount', 'subtotal'));
}


public function filterByCategory(Request $request)
{
    $categories = $request->categories;
    $colors = $request->colors;

    $query = Product::query();

    if (!empty($categories)) {
        $query->whereIn('category', $categories);
    }

    if (!empty($colors)) {
        $query->whereIn('color', $colors);
    }

    $products = $query->get();

    // Get the wishlist status
    $user_id = Auth::id();
    $wishlistProductIds = Wishlist::where('user_id', $user_id)->pluck('product_id')->toArray();

    $products = $products->map(function ($product) use ($wishlistProductIds) {
        $product->in_wishlist = in_array($product->id, $wishlistProductIds);
        return $product;
    });

    return response()->json($products);
}

}
