<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch categories and products from the database
        $categories = ProductCategory::all();
        $products = Product::all();
        $featuredProducts = Product::where('collection', 'women')
        ->orWhere('collection', 'Women')
        ->get();

        // Pass data to the view
        return view('index', compact('categories', 'products', 'featuredProducts'));
    }

    
    
    public function root(Request $request)
    {
        if (view()->exists($request->path())) {
            return view($request->path());
        } else {
            return abort(404);
        }
    }
}