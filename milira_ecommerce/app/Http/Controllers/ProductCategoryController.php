<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();
        return view('admin.product_categories.index', compact('categories'));
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $category = new ProductCategory();
        $category->name = $request->name;
        $category->description = $request->description;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads/categories', $filename, 'public');
            $category->image = $filename;
        }

        $category->save();

        return redirect()->route('admin.product_categories.index')->with('success', 'Category added successfully.');
    }

    public function destroy($id)
    {
        $category = ProductCategory::findOrFail($id);

        // Delete the image from storage
        if ($category->image) {
            Storage::disk('public')->delete('uploads/categories/' . $category->image);
        }

        $category->delete();

        return redirect()->route('admin.product_categories.index')->with('success', 'Category and associated products deleted successfully.');
    }
}
