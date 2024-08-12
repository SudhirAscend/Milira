<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CouponPopup;
use App\Models\Wishlist;
use App\Models\Collection;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();
        $products = $categories->mapWithKeys(function ($category) {
            return [
                $category->name => Product::where('category', $category->name)
                    ->latest()
                    ->take(6)
                    ->get()
            ];
        });
        $collections = Collection::all();
        $featuredProducts = Product::where('collection', 'women')
            ->orWhere('collection', 'Women')
            ->latest()
            ->take(3)
            ->get();

        $user_id = Auth::id();
        $wishlistProductIds = Wishlist::where('user_id', $user_id)->pluck('product_id')->toArray();
        $wishlistCount = Wishlist::where('user_id', $user_id)->count();
        $latestPopup = CouponPopup::latest()->first();

        $cartItems = Cart::where('user_id', $user_id)->with('product')->get();
        $cartCount = $cartItems->count();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('index', compact('categories', 'products', 'featuredProducts', 'wishlistProductIds', 'wishlistCount', 'cartCount', 'subtotal', 'cartItems', 'collections','latestPopup'));
    }

    public function showSignupForm()
    {
        return view('signup'); // Ensure this view exists
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
        return view('profile');
    }
    public function showCheckoutPage()
    {
        $latestPopup = CouponPopup::latest()->first();
        return view('checkout', compact('latestPopup'));
    }
    

}
