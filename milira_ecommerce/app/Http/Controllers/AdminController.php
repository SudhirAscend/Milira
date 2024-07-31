<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductCategory;
use App\Models\Wishlist;
use App\Models\Review;


class AdminController extends Controller
{
    public function dashboard()
    {
        // Logic for fetching data can be added here
        return view('admin.dashboard');
    }
    public function customers()
    {
        // Fetch all customers
        $customers = User::all();
        return view('admin.customers', compact('customers'));
    }

    public function customerDetails($id)
{
    // Fetch customer details by ID
    $customer = User::find($id);

    // Handle case where customer is not found
    if (!$customer) {
        abort(404, 'Customer not found');
    }

    // Fetch wishlist items for the customer
    $wishlistItems = Wishlist::where('user_id', $id)->with('product')->get();

    // Fetch reviews for the customer
    $reviews = Review::where('user_id', $id)->with('product')->get();

    // Fetch cart items for the customer
    $cartItems = Cart::where('user_id', $id)->with('product')->get();

    // Fetch orders for the customer
    $orders = Order::where('user_id', $id)->with('orderItems.product')->get();

    return view('admin.customer-details', compact('customer', 'wishlistItems', 'reviews', 'cartItems', 'orders'));
}
public function orders()
{
    // Fetch all orders with related user and order items
    $orders = Order::with('user', 'orderItems.product')->get();

    return view('admin.orders', compact('orders'));
}
}
