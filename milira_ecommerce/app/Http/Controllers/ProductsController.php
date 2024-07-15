<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory; // Ensure you import the ProductCategory model
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = ProductCategory::all(); // Fetch all categories
        return view('admin.products.create', compact('categories')); // Pass categories to the view
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'small_description' => 'nullable|string',
            'description' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'file|mimes:jpeg,png,jpg|max:2048',
            'category' => 'nullable|string',
            'collection' => 'nullable|string',
            'tags' => 'nullable|string',
            'sku' => 'nullable|string',
            'color' => 'nullable|string',
            'size' => 'nullable|string',
        ]);

        $product = new Product();
        $product->title = $request->title;
        $product->small_description = $request->small_description;
        $product->description = $request->description;

        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('uploads', $filename, 'public');
                $images[] = $path;
            }
            $product->images = $images;
        }

        $product->category = $request->category;
        $product->collection = $request->collection;
        $product->tags = $request->tags;
        $product->sku = $request->sku;
        $product->color = $request->color;
        $product->size = $request->size;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = ProductCategory::all(); // Fetch all categories for the edit view
        return view('admin.products.edit', compact('product', 'categories')); // Pass product and categories to the view
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'small_description' => 'nullable|string',
            'description' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'file|mimes:jpeg,png,jpg|max:2048',
            'category' => 'nullable|string',
            'collection' => 'nullable|string',
            'tags' => 'nullable|string',
            'sku' => 'nullable|string',
            'color' => 'nullable|string',
            'size' => 'nullable|string',
        ]);

        $product = Product::findOrFail($id);
        $product->title = $request->title;
        $product->small_description = $request->small_description;
        $product->description = $request->description;

        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('uploads', $filename, 'public');
                $images[] = $path;
            }
            $product->images = $images;
        }

        $product->category = $request->category;
        $product->collection = $request->collection;
        $product->tags = $request->tags;
        $product->sku = $request->sku;
        $product->color = $request->color;
        $product->size = $request->size;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
