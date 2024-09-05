<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Wishlist;
use App\Models\Cart;
use App\Models\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str; // Add this import for Str helper

class ShopController extends Controller
{
    public function index($category = null)
{
    $categories = ProductCategory::all();
    $collections = Collection::all();
    $colors = Product::select('color')->distinct()->pluck('color');

    // Calculate min and max price from the products
    $minPrice = Product::min('price');
    $maxPrice = Product::max('price');

    $products = Product::when($category, function ($query, $category) {
        return $query->where('category', $category);
    })->get();

    $user_id = Auth::id();
    $wishlistProductIds = Wishlist::where('user_id', $user_id)->pluck('product_id')->toArray();
    $wishlistCount = Wishlist::where('user_id', $user_id)->count();

    $cartItems = Cart::where('user_id', $user_id)->with('product')->get();
    $cartCount = $cartItems->count();
    $subtotal = $cartItems->sum(function ($item) {
        return $item->product->price * $item->quantity;
    });

    return view('shop', compact('categories', 'collections', 'colors', 'products', 'wishlistProductIds', 'wishlistCount', 'cartItems', 'cartCount', 'subtotal', 'minPrice', 'maxPrice'));
}


public function filterByCategory(Request $request)
{
    $categories = $request->categories;
    $collections = $request->collections; // Get collections from the request
    $colors = $request->colors;
    $priceMin = $request->price_min; // Minimum price from the request
    $priceMax = $request->price_max; // Maximum price from the request

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

    // Apply the price range filter if both min and max prices are provided
    if (isset($priceMin) && isset($priceMax)) {
        $query->whereBetween('price', [$priceMin, $priceMax]);
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



    public function filterByCollection($collectionName)
    {
        $categories = ProductCategory::all();
        $collections = Collection::all();
        $colors = Product::select('color')->distinct()->pluck('color');

        // Fetch products based on the selected collection
        $products = Product::where('collection', $collectionName)->get();

        $user_id = Auth::id();
        $wishlistProductIds = Wishlist::where('user_id', $user_id)->pluck('product_id')->toArray();
        $wishlistCount = Wishlist::where('user_id', $user_id)->count();

        $cartItems = Cart::where('user_id', $user_id)->with('product')->get();
        $cartCount = $cartItems->count();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('shop', compact('categories', 'collections', 'colors', 'products', 'wishlistProductIds', 'wishlistCount', 'cartItems', 'cartCount', 'subtotal', 'collectionName'));
    }

    public function showProduct($titleSlug)
    {
        // Normalize the slug by removing unwanted characters like apostrophes
        $normalizedSlug = Str::slug(str_replace("'", '', $titleSlug), '-');

        // Find the product using the normalized slug
        $product = Product::whereRaw("REPLACE(LOWER(REPLACE(title, '''', '')), ' ', '-') = ?", [$normalizedSlug])->first();

        if (!$product) {
            return redirect()->route('shop.index')->with('error', 'Product not found');
        }

        $user_id = Auth::id();
        $wishlistProductIds = Wishlist::where('user_id', $user_id)->pluck('product_id')->toArray();
        $wishlistCount = Wishlist::where('user_id', $user_id)->count();
        $randomProducts = Product::inRandomOrder()->take(4)->get();
        $cartItems = Cart::where('user_id', $user_id)->with('product')->get();
        $cartCount = $cartItems->count();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('shop.product', compact('product', 'wishlistCount', 'cartItems', 'cartCount', 'subtotal','randomProducts','wishlistProductIds'));
    }
}
