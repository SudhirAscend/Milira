<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $wishlist = Wishlist::where('user_id', Auth::id())->with('product')->get();
        $wishlistItems = Wishlist::where('user_id', $user_id)->with('product')->get();
        $user_id = Auth::id();
        $wishlistProductIds = Wishlist::where('user_id', $user_id)->pluck('product_id')->toArray();
        $wishlistCount = Wishlist::where('user_id', $user_id)->count();

        // Fetch cart items from the database for the logged-in user
        $cartItems = Cart::where('user_id', $user_id)->with('product')->get();
        $cartCount = $cartItems->count();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });


        return view('wishlist', compact('wishlist','wishlistItems','wishlistCount', 'cartItems', 'cartCount', 'subtotal'));
    }

    public function addToWishlist(Request $request)
    {
        $product_id = $request->product_id;
        $user_id = Auth::id();

        if (Wishlist::where('user_id', $user_id)->where('product_id', $product_id)->exists()) {
            return response()->json(['message' => 'Product already in wishlist!'], 400);
        }

        $wishlist = new Wishlist();
        $wishlist->user_id = $user_id;
        $wishlist->product_id = $product_id;
        $wishlist->save();

        $wishlistCount = Wishlist::where('user_id', $user_id)->count();

        return response()->json(['message' => 'Product added to wishlist successfully!', 'wishlistCount' => $wishlistCount], 200);
    }

    public function removeFromWishlist(Request $request)
    {
        $user_id = Auth::id();
        $product_id = $request->input('product_id');
    
        // Find the product in the wishlist
        $wishlistItem = Wishlist::where('user_id', $user_id)->where('product_id', $product_id)->first();
    
        if ($wishlistItem) {
            // Remove the product from the wishlist
            $wishlistItem->delete();
    
            return response()->json(['message' => 'Product removed from wishlist successfully!']);
        } else {
            return response()->json(['message' => 'Product not found in wishlist!'], 400);
        }
    }

    public function toggle($productId)
    {
        $user = Auth::user();
        $wishlist = Wishlist::where('user_id', $user->id)->where('product_id', $productId)->first();
    
        if ($wishlist) {
            // Remove from wishlist
            $wishlist->delete();
            $inWishlist = false;
        } else {
            // Add to wishlist
            Wishlist::create([
                'user_id' => $user->id,
                'product_id' => $productId,
            ]);
            $inWishlist = true;
        }
    
        $wishlistCount = Wishlist::where('user_id', $user->id)->count();
    
        return response()->json([
            'success' => true,
            'wishlistCount' => $wishlistCount,
            'inWishlist' => $inWishlist,
        ]);
    }

    // New method to add item to cart from wishlist
    public function addToCartFromWishlist(Request $request)
    {
        $userId = Auth::id();
        $productId = $request->input('product_id');

        // Add product to cart
        $cart = new CartController();
        $response = $cart->addToCart($request);

        // Remove product from wishlist
        Wishlist::where('user_id', $userId)->where('product_id', $productId)->delete();

        return $response;
    }
}
