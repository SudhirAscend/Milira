<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // Add this line
use App\Models\ProductCategory;
use App\Models\Cart; // Add this line to include Cart model
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Composer for header view
        View::composer('header', function ($view) {
            // Fetch product categories
            $categories = ProductCategory::all();

            // Fetch cart items for the authenticated user
            $cartItems = [];
            $cartCount = 0;
            $subtotal = 0;

            if (Auth::check()) {
                $userId = Auth::id(); // Get authenticated user ID
                $cartItems = Cart::where('user_id', $userId)->with('product')->get();
                $cartCount = $cartItems->count();
                $subtotal = $cartItems->sum(function($cartItem) {
                    return $cartItem->product->price;
                });
            }

            // Pass categories and cart items to the view
            $view->with([
                'categories' => $categories,
                'cartItems' => $cartItems,
                'cartCount' => $cartCount,
                'subtotal' => $subtotal,
            ]);
        });
    }
}
