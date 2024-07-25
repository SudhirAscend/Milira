<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $wishlistItems = Wishlist::where('user_id', $user_id)->with('product')->get();

        return view('wishlist', compact('wishlistItems'));
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
        $product_id = $request->product_id;
        $user_id = Auth::id();

        Wishlist::where('user_id', $user_id)->where('product_id', $product_id)->delete();

        $wishlistCount = Wishlist::where('user_id', $user_id)->count();

        return response()->json(['message' => 'Product removed from wishlist successfully!', 'wishlistCount' => $wishlistCount], 200);
    }
    public function toggle(Request $request, $productId)
    {
        $userId = Auth::id();
        $wishlistItem = Wishlist::where('user_id', $userId)->where('product_id', $productId)->first();

        if ($wishlistItem) {
            $wishlistItem->delete();
        } else {
            Wishlist::create(['user_id' => $userId, 'product_id' => $productId]);
        }

        $wishlistCount = Wishlist::where('user_id', $userId)->count();

        return response()->json(['success' => true, 'wishlistCount' => $wishlistCount]);
    }
}
