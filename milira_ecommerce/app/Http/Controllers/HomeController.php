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
            ->latest()
            ->take(3)
            ->get();

        // Pass data to the view
        return view('index', compact('categories', 'products', 'featuredProducts'));
    }
    public function showSignupForm()
    {
        return view('signup');
    }
    public function root(Request $request)
    {
        if (view()->exists($request->path())) {
            return view($request->path());
        } else {
            return abort(404);
        }
    }

    public function profile()
{
    return view('profile'); // Assuming you have a profile.blade.php view file
}
}
