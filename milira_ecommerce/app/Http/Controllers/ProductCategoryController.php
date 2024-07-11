<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory; // Import the ProductCategory model
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all(); // Fetch all categories
        return view('admin.product_categories.index')->with('categories', $categories);
    }

    public function create()
    {
        return view('admin.product_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        ProductCategory::create($request->all());

        return redirect()->route('admin.product_categories.create')->with('success', 'Category added successfully.');
    }
}
