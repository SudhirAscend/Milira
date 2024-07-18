<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;

class HomeController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();
        $products = Product::all();
        return view('index', compact('categories', 'products'));
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