<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index($category = null)
{
    $categories = Product::select('category')->distinct()->get();
    $collections = Product::select('collection')->distinct()->get(); // Fetch distinct collections
    $colors = Product::select('color')->distinct()->pluck('color');

    // Fetch products based on the selected category
    $products = Product::when($category, function ($query, $category) {
        return $query->where('category', $category);
    })->get();

    $user_id = Auth::id();
    $wishlistProductIds = Wishlist::where('user_id', $user_id)->pluck('product_id')->toArray();
    $wishlistCount = Wishlist::where('user_id', $user_id)->count();

    // Fetch cart items from the database for the logged-in user
    $cartItems = Cart::where('user_id', $user_id)->with('product')->get();
    $cartCount = $cartItems->count();
    $subtotal = $cartItems->sum(function ($item) {
        return $item->product->price * $item->quantity;
    });

    return view('shop', compact('categories', 'collections', 'colors', 'products', 'wishlistProductIds', 'wishlistCount', 'cartItems', 'cartCount', 'subtotal', 'category'));
}

    public function filterByCategory(Request $request)
    {
        $categories = $request->categories;
        $collections = $request->collections; // Get collections from the request
        $colors = $request->colors;

        $query = Product::query();

        if (!empty($categories)) {
            $query->whereIn('category', $categories);
        }

        if (!empty($collections)) {
            $query->whereIn('collection', $collections); // Filter by collections
        }

        if (!empty($colors)) {
            $query->whereIn('color', $colors);
        }

        $products = $query->get();

        // Get the wishlist status
        $user_id = Auth::id();
        $wishlistProductIds = Wishlist::where('user_id', $user_id)->pluck('product_id')->toArray();
        $wishlistCount = Wishlist::where('user_id', $user_id)->count();

        $cartItems = Cart::where('user_id', $user_id)->with('product')->get();
        $cartCount = $cartItems->count();

        $products = $products->map(function ($product) use ($wishlistProductIds) {
            $product->in_wishlist = in_array($product->id, $wishlistProductIds);
            return $product;
        });

        return response()->json(compact('products', 'wishlistCount', 'cartItems', 'cartCount'));
    }

    public function showProduct($title)
    {
        $product = Product::where('title', $title)->first();

        if (!$product) {
            return redirect()->route('shop.index')->with('error', 'Product not found');
        }

        $user_id = Auth::id();
        $wishlistProductIds = Wishlist::where('user_id', $user_id)->pluck('product_id')->toArray();
        $wishlistCount = Wishlist::where('user_id', $user_id)->count();

        $cartItems = Cart::where('user_id', $user_id)->with('product')->get();
        $cartCount = $cartItems->count();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('shop.product', compact('product', 'wishlistCount', 'cartItems', 'cartCount', 'subtotal'));
    }
}
