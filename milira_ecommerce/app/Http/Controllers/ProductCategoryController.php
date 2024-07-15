<?php
namespace App\Http\Controllers;

use App\Models\Product;
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
        ]);

        $category = new ProductCategory();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return redirect()->route('admin.product_categories.index')->with('success', 'Category added successfully.');
    }

    public function destroy($id)
    {
        $category = ProductCategory::findOrFail($id);

        // Set category_id to NULL for associated products
        Product::where('category_id', $id)->update(['category_id' => null]);

        $category->delete();

        return redirect()->route('admin.product_categories.index')->with('success', 'Category and associated products updated successfully.');
    }
}
