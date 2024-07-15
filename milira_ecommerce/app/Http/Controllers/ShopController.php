<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    public function index()
    {
        $categories = Product::select('category')->distinct()->get();
        $products = Product::all();

        return view('shop', compact('categories', 'products'));
    }

    public function filterByCategory(Request $request)
    {
        $categories = $request->categories;
        $products = Product::whereIn('category', $categories)->get();

        return response()->json($products);
    }
}
