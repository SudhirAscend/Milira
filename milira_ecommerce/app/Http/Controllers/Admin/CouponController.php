<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function create()
    {
        return view('admin.coupons.create');
    }

    public function index()
    {
        $coupons = Coupon::all(); // Or paginate if there are many coupons
        return view('admin.coupons.index', compact('coupons'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:255|unique:coupons,code',
            'type' => 'required|in:fixed,percentage',
            'value' => 'required|numeric|min:0',
            'expiry_date' => 'nullable|date',
        ]);

        Coupon::create([
            'code' => $request->input('code'),
            'type' => $request->input('type'),
            'value' => $request->input('value'),
            'expiry_date' => $request->input('expiry_date'),
        ]);

        return redirect()->route('admin.coupons.create')->with('success', 'Coupon created successfully.');
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('admin.coupons.index')->with('success', 'Coupon deleted successfully.');
    }
   
}
