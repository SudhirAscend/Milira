<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    public function index()
    {
        $categories = Product::select('category')->distinct()->get();
        $colors = Product::select('color')->distinct()->pluck('color');
        $products = Product::all();

        return view('shop', compact('categories', 'colors', 'products'));
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
