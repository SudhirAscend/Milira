<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
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
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1); // Default quantity to 1 if not provided

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $product = Product::find($productId);
            if ($product) {
                $cart[$productId] = [
                    'name' => $product->title,
                    'price' => $product->price,
                    'quantity' => $quantity,
                    'image' => $product->image // assuming the product has an 'image' attribute
                ];
            }
        }

        session()->put('cart', $cart);

        // Calculate the subtotal
        $subtotal = $this->calculateSubtotal($cart);

        return response()->json([
            'message' => 'Product added to cart successfully!',
            'cartCount' => count($cart),
            'cart' => $cart,
            'subtotal' => $subtotal
        ]);
    }

    private function calculateSubtotal($cart)
    {
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        return $subtotal;
    }

    public function index()
    {
        $cart = Cart::where('user_id', Auth::id())->get();
        $cartCount = $cart->count();
        $subtotal = $this->calculateSubtotal($cart);

        return view('cart', compact('cart', 'cartCount', 'subtotal'));
    }

    public function clearCart()
    {
        // Clear the cart details from the database
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('cart.index')->with('success', 'Cart cleared successfully!');
    }

    public function removeFromCart(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'Please login to remove products from cart'], 401);
        }

        $productId = $request->product_id;

        // Remove from database
        Cart::where('user_id', Auth::id())->where('product_id', $productId)->delete();

        // Refresh the cart
        $cart = Cart::where('user_id', Auth::id())->get();
        $subtotal = $this->calculateSubtotal($cart);

        return response()->json([
            'success' => true,
            'message' => 'Product removed from cart successfully!',
            'cartCount' => $cart->count(),
            'subtotal' => $subtotal
        ], 200);
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
