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

        return view('shop', compact('categories', 'colors', 'products', 'wishlistProductIds', 'wishlistCount'));
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

        return response()->json($products);
    }
}
