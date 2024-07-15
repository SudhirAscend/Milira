<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductsController extends Controller
{
    public function create()
    {
        $categories = ProductCategory::all();
        return view('admin.ecommerce-add-product', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'small_description' => 'nullable|string',
            'description' => 'nullable|string',
            'images' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'required|exists:product_categories,id',
            'collection' => 'nullable|string',
            'tags' => 'nullable|string',
            'sku' => 'nullable|string',
            'color' => 'nullable|string',
            'size' => 'nullable|string',
        ]);

        // Fetch the category name based on the selected category_id
        $category = ProductCategory::findOrFail($request->category_id);

        $product = new Product();
        $product->title = $request->title;
        $product->small_description = $request->small_description;
        $product->description = $request->description;
        $product->category = $category->name; // Save the category name directly

        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename, 'public');

            if ($path) {
                Log::info('File uploaded to: ' . $path);
                $product->images = $path;
            } else {
                Log::error('File upload failed.');
            }
        } else {
            Log::warning('No file was uploaded.');
        }

        $product->collection = $request->collection;
        $product->tags = $request->tags;
        $product->sku = $request->sku;
        $product->color = $request->color;
        $product->size = $request->size;
        $product->save();

        return redirect()->route('products.create')->with('success', 'Product added successfully.');
    }
}
