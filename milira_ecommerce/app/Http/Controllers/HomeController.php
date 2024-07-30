<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

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

        $user_id = Auth::id();
        $wishlistProductIds = Wishlist::where('user_id', $user_id)->pluck('product_id')->toArray();
        $wishlistCount = Wishlist::where('user_id', $user_id)->count();
        
        $cart = session()->get('cart', []);
        $cartItems = [];
        foreach ($cart as $productId => $details) {
            $product = Product::find($productId);
            if ($product) {
                $details['product'] = $product;
                $cartItems[] = $details;
            }
        }
        $cartCount = count($cartItems);
        $subtotal = array_reduce($cartItems, function($sum, $item) {
            return $sum + ($item['price'] * $item['quantity']);
        }, 0);

        // Pass data to the view
        return view('index', compact('categories', 'products', 'featuredProducts', 'wishlistCount', 'cartCount', 'subtotal', 'cartItems'));
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
