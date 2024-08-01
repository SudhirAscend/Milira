<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'description' => 'required|string|max:1000',
            'image' => 'nullable|image|max:50000',
        ]);

        $review = new Review();
        $review->product_id = $request->product_id;
        $review->user_id = Auth::id();
        $review->rating = $request->rating;
        $review->description = $request->description;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('reviews', 'public');
            $review->image = $path;
        }

        $review->save();

        return redirect()->back()->with('success', 'Review submitted successfully.');
    }
}
