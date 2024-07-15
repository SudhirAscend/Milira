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
            $file = $request->file('images');
            $extension = $file->getClientOriginalExtension();
            $filename = $request->title . '.' . $extension;
            $path = 'uploads/' . $filename;
            $file->move(public_path('uploads'), $filename);
            $product->images = $path;
        }
    
        $product->category = $request->category;
        $product->collection = $request->collection;
        $product->tags = $request->tags;
        $product->sku = $request->sku;
        $product->color = $request->color;
        $product->size = $request->size;
        $product->save();
    
        return redirect()->route('products.create')->with('success', 'Product added successfully.');
    }
    

    
}
