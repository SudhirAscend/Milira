<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
<<<<<<< HEAD
=======
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Wishlist;
use App\Models\Review;

>>>>>>> 21e7cf62a499e0d387aa5c245b3fd98fd13efac3

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
<<<<<<< HEAD
        
        $customer = User::find($id);

       
=======
        // Fetch customer details by ID
        $customer = User::find($id);

        // Handle case where customer is not found
>>>>>>> 21e7cf62a499e0d387aa5c245b3fd98fd13efac3
        if (!$customer) {
            abort(404, 'Customer not found');
        }

<<<<<<< HEAD
        return view('admin.customer-details', compact('customer'));
=======
        // Fetch wishlist items for the customer
        $wishlistItems = Wishlist::where('user_id', $id)->with('product')->get();

        // Fetch reviews for the customer
        $reviews = Review::where('user_id', $id)->with('product')->get();

        return view('admin.customer-details', compact('customer', 'wishlistItems', 'reviews'));
>>>>>>> 21e7cf62a499e0d387aa5c245b3fd98fd13efac3
    }
}
