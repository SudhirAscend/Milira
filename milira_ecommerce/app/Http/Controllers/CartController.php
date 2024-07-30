<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\CartDetail;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('add', 'remove','addToCart', 'index', 'clearCart', 'removeFromCart', 'checkout', 'buyNow');
    }

    public function addToCart(Request $request)
    {
        $userId = Auth::id();
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1); // Default quantity to 1 if not provided

        $cart = Cart::firstOrNew(['user_id' => $userId, 'product_id' => $productId]);
        $cart->quantity += $quantity;
        $cart->save();

        // Calculate the subtotal
        $subtotal = $this->calculateSubtotal($userId);

        return response()->json([
            'message' => 'Product added to cart successfully!',
            'cartCount' => Cart::where('user_id', $userId)->count(),
            'cart' => Cart::where('user_id', $userId)->with('product')->get(),
            'subtotal' => $subtotal
        ]);
    }

    private function calculateSubtotal($userId)
    {
        $cartItems = Cart::where('user_id', $userId)->get();
        $subtotal = 0;
        foreach ($cartItems as $item) {
            $subtotal += $item->product->price * $item->quantity;
        }
        return $subtotal;
    }

    public function index()
    {
        $userId = Auth::id();
        $cart = Cart::where('user_id', $userId)->with('product')->get();
        $cartCount = $cart->count();
        $subtotal = $this->calculateSubtotal($userId);

        $user_id = Auth::id();
        $wishlistProductIds = Wishlist::where('user_id', $user_id)->pluck('product_id')->toArray();
        $wishlistCount = Wishlist::where('user_id', $user_id)->count();

        // Fetch cart items from the database for the logged-in user
        $cartItems = Cart::where('user_id', $user_id)->with('product')->get();
        $cartCount = $cartItems->count();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('cart', compact('cart', 'cartCount', 'subtotal','wishlistCount', 'cartItems'));
    }

    public function clearCart()
    {
        $userId = Auth::id();
        Cart::where('user_id', $userId)->delete();
        return redirect()->route('cart.index')->with('success', 'Cart cleared successfully!');
    }

    public function removeFromCart(Request $request)
    {
        $userId = Auth::id();
        $productId = $request->product_id;

        Cart::where('user_id', $userId)->where('product_id', $productId)->delete();

        // Refresh the cart
        $cart = Cart::where('user_id', $userId)->with('product')->get();
        $subtotal = $this->calculateSubtotal($userId);

        return response()->json([
            'success' => true,
            'message' => 'Product removed from cart successfully!',
            'cartCount' => $cart->count(),
            'subtotal' => $subtotal
        ]);
    }

    public function add(Request $request)
    {
        $user = Auth::user();
        $product_id = $request->product_id;
        $quantity = $request->quantity;

        $cartItem = Cart::where('user_id', $user->id)->where('product_id', $product_id)->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
        } else {
            $cartItem = new Cart();
            $cartItem->user_id = $user->id;
            $cartItem->product_id = $product_id;
            $cartItem->quantity = $quantity;
        }

        $cartItem->save();

        return $this->getCartDetails($user->id);
    }

    public function remove(Request $request)
    {
        $user = Auth::user();
        $product_id = $request->product_id;

        $cartItem = Cart::where('user_id', $user->id)->where('product_id', $product_id)->first();

        if ($cartItem) {
            $cartItem->delete();
        }

        return $this->getCartDetails($user->id);
    }

    public function checkout(Request $request)
    {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('shop.index')->with('error', 'Cart is empty');
        }

        foreach ($cartItems as $cartItem) {
            CartDetail::create([
                'user_id' => $user->id,
                'product_id' => $cartItem->product_id,
                'name' => $cartItem->product->title,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->price,
            ]);
            $cartItem->delete();
        }

        return redirect()->route('checkout.index')->with('success', 'Checkout successful');
    }

    public function buyNow(Request $request)
    {
        $user = Auth::user();
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        $cartDetail = CartDetail::where('user_id', $user->id)->where('product_id', $product_id)->first();

        if ($cartDetail) {
            $cartDetail->quantity += $quantity;
            $cartDetail->save();
        } else {
            $product = Product::find($product_id);
            if ($product) {
                CartDetail::create([
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                    'name' => $product->title,
                    'quantity' => $quantity,
                    'price' => $product->price,
                ]);
            }
        }

        // Clear the session cart
        session()->forget('cart');

        return redirect()->route('checkout.index')->with('success', 'Product added to checkout');
    }

    private function getCartDetails($user_id)
    {
        $cartItems = Cart::where('user_id', $user_id)->with('product')->get();
        $cartCount = $cartItems->count();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $cart = $cartItems->mapWithKeys(function ($item) {
            return [$item->product_id => [
                'name' => $item->product->title,
                'price' => $item->product->price,
                'quantity' => $item->quantity
            ]];
        });

        return response()->json([
            'cartCount' => $cartCount,
            'cart' => $cart,
            'subtotal' => $subtotal
        ]);
    }
}
