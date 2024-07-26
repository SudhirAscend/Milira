<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\CartDetail;
use App\Models\Address;

class CheckoutController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cartItems = CartDetail::where('user_id', $user->id)->with('product')->get();
        $addresses = Address::where('user_id', $user->id)->get();

        return view('checkout', compact('cartItems', 'addresses'));
    }

    public function showCheckoutPage()
    {
        $user = Auth::user();
        $cartItems = CartDetail::where('user_id', $user->id)->with('product')->get();
        $addresses = Address::where('user_id', $user->id)->get();

        return view('checkout', compact('cartItems', 'addresses'));
    }

    public function storeAddress(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'country' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postcode' => 'required|string|max:10',
        ]);

        $user = Auth::user();

        $address = new Address();
        $address->user_id = $user->id;
        $address->first_name = $request->first_name;
        $address->last_name = $request->last_name;
        $address->email = $request->email;
        $address->phone = $request->phone;
        $address->country = $request->country;
        $address->address = $request->address;
        $address->city = $request->city;
        $address->postcode = $request->postcode;
        $address->is_default = $request->is_default ?? false;

        if ($address->is_default) {
            Address::where('user_id', $user->id)->update(['is_default' => false]);
        }

        $address->save();

        return redirect()->back()->with('success', 'Address saved successfully.');
    }
}
