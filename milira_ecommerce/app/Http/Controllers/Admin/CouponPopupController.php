<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CouponPopup;
use Illuminate\Http\Request;

class CouponPopupController extends Controller
{
    public function index()
    {
        $popups = CouponPopup::all();
        return view('admin.coupon_popups.index', compact('popups'));
    }

    public function create()
    {
        return view('admin.coupon_popups.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'coupon_code' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:555555555',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/coupon_popups');
        }

        CouponPopup::create([
            'title' => $request->title,
            'description' => $request->description,
            'coupon_code' => $request->coupon_code,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.coupon_popups.index')->with('success', 'Coupon Popup Created Successfully');
    }
}
