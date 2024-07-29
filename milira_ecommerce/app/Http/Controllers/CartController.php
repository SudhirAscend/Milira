<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartDetail;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('addToCart', 'index', 'clearCart', 'removeFromCart', 'checkout', 'buyNow');
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

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

        $cartCount = count($cart);
        $subtotal = $this->calculateSubtotal($cart);

        return response()->json([
            'message' => 'Product added to cart successfully!',
            'cartCount' => $cartCount,
            'cart' => $cart,
            'subtotal' => $subtotal
        ]);
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        $cartCount = count($cart);
        $subtotal = $this->calculateSubtotal($cart);

        return view('cart', compact('cart', 'cartCount', 'subtotal'));
    }

    public function clearCart()
    {
        session()->forget('cart');

        // Clear the cart details from the database as well
        CartDetail::where('user_id', Auth::id())->delete();

        return redirect()->route('cart.index')->with('success', 'Cart cleared successfully!');
    }

    public function removeFromCart(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'Please login to remove products from cart'], 401);
        }

        $productId = $request->product_id;
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);

            // Save to session
            session()->put('cart', $cart);

            // Remove from database
            CartDetail::where('user_id', Auth::id())->where('product_id', $productId)->delete();

            // Calculate the subtotal
            $subtotal = $this->calculateSubtotal($cart);

            return response()->json([
                'message' => 'Product removed from cart successfully!',
                'cart' => $cart,
                'subtotal' => $subtotal,
                'cartCount' => count($cart)
            ], 200);
        }

        return response()->json(['message' => 'Product not found in cart'], 404);
    }

    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty');
        }

        // Save cart items to the database
        $this->saveCartToDatabase($cart);

        // Clear session cart
        session()->forget('cart');

        return redirect()->route('checkout.show');
    }

    public function buyNow(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $product = Product::find($request->product_id);

        if (!$product) {
            return redirect()->route('shop.product', $request->product_id)->with('error', 'Product not found');
        }

        $cart = session()->get('cart', []);
        $quantity = $request->quantity;

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                "name" => $product->title,
                "quantity" => $quantity,
                "price" => $product->price,
                "image" => asset('storage/uploads/' . $product->title . '_0.jpg') // Ensure correct image path
            ];
        }

        // Save to session
        session()->put('cart', $cart);

        // Save to database
        $this->saveCartToDatabase($cart);

        // Clear session cart
        session()->forget('cart');

        return redirect()->route('checkout.show');
    }

    private function saveCartToDatabase($cart)
    {
        foreach ($cart as $productId => $details) {
            $existingCartDetail = CartDetail::where('user_id', Auth::id())
                ->where('product_id', $productId)
                ->first();

            if ($existingCartDetail) {
                $existingCartDetail->quantity += $details['quantity'];
                $existingCartDetail->save();
            } else {
                CartDetail::create([
                    'user_id' => Auth::id(),
                    'product_id' => $productId,
                    'name' => $details['name'],
                    'quantity' => $details['quantity'],
                    'price' => $details['price'],
                ]);
            }
        }
    }

    private function calculateSubtotal($cart)
    {
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        return $subtotal;
    }

    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1); // Default quantity to 1 if not provided

        $cart = session()->get('cart', []);

        // Check if the product is already in the cart
        if (isset($cart[$productId])) {
            // If it is, update the quantity
            $cart[$productId]['quantity'] += $quantity;
        } else {
            // If not, add it with the given quantity
            $product = Product::find($productId);
            $cart[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            'message' => 'Product added to cart successfully!',
            'cartCount' => count($cart),
            'cart' => $cart,
            'subtotal' => $this->calculateSubtotal($cart),
        ]);
    }
}
