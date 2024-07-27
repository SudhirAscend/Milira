<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        
        $customer = User::find($id);

       
        if (!$customer) {
            abort(404, 'Customer not found');
        }

        return view('admin.customer-details', compact('customer'));
    }
}
