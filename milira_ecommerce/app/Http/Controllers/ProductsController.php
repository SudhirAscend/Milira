<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory; // Ensure you import the ProductCategory model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
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
        'color' => 'required|string|in:Gold,Silver,RoseGold',
        'size' => 'nullable|string',
        'price' => 'required|numeric',
        'stocks' => 'required|integer',
    ]);

    $product = new Product();
    $product->title = $request->title;
    $product->small_description = $request->small_description;
    $product->description = $request->description;

    if ($request->hasFile('images')) {
        $images = [];
        foreach ($request->file('images') as $index => $file) {
            $filename = $request->title . '_' . $index . '.' . $file->getClientOriginalExtension();
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
    $product->price = $request->price;
    $product->stocks = $request->stocks; // Save stocks
    $product->save();

    // Generate product detail page
    $this->generateProductDetailPage($product);

    return redirect()->route('products.index')->with('success', 'Product added successfully.');
}

private function generateProductDetailPage($product)
{
    $templatePath = resource_path('views/template.blade.php');
    $targetPath = resource_path('views/shop/' . str_replace(' ', '-', $product->title) . '.blade.php');

    $templateContent = File::get($templatePath);

    $replacements = [
        '<--title-->' => $product->title,
        '<--price-->' => $product->price,
        '<--Small description-->' => $product->small_description,
        '<--stocks-->' => $product->stocks,
        '<--category-->' => $product->category,
        '<--tags-->' => $product->tags,
        '<--sku-->' => $product->sku,
    ];

    $newContent = str_replace(array_keys($replacements), array_values($replacements), $templateContent);

    File::put($targetPath, $newContent);
}


public function show($slug)
{
    // Convert the slug back to the original title format for searching
    $title = Str::slug($slug, ' '); 
    $product = Product::where('title', $title)->firstOrFail();
    return view('shop.product', compact('product'));
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
        'color' => 'required|string|in:Gold,Silver,RoseGold', // Validate color
        'size' => 'nullable|string',
        'price' => 'required|numeric', // Validate price
        'stocks' => 'required|integer',
    ]);

    $product = Product::findOrFail($id);
    $product->title = $request->title;
    $product->small_description = $request->small_description;
    $product->description = $request->description;

    if ($request->hasFile('images')) {
        $images = [];
        foreach ($request->file('images') as $index => $file) {
            $filename = $request->title . '_' . $index . '.' . $file->getClientOriginalExtension();
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
    $product->price = $request->price; // Save price
    $product->stocks = $request->stocks;
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
