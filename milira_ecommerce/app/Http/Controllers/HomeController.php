<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch categories from the database
        $categories = ProductCategory::all();
    
        // Fetch the latest 6 products for each category
        $products = $categories->mapWithKeys(function ($category) {
            return [
                $category->name => Product::where('category', $category->name)
                    ->latest()  // Order by latest
                    ->take(6)   // Limit to 6 products
                    ->get()
            ];
        });
    
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
       // Fetch cart items from the database for the logged-in user
       $cartItems = Cart::where('user_id', $user_id)->with('product')->get();
       $cartCount = $cartItems->count();
       $subtotal = $cartItems->sum(function ($item) {
           return $item->product->price * $item->quantity;
       });
    
        // Pass data to the view
        return view('index', compact('categories', 'products', 'featuredProducts', 'wishlistProductIds','wishlistCount', 'cartCount', 'subtotal', 'cartItems'));
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
