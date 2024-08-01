<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collection;

class CollectionController extends Controller
{
    public function index()
    {
        $collections = Collection::all(); // Fetch all collections from the database
        return view('admin.collections.index', compact('collections'));
    }

    public function create()
    {
        return view('admin.collections.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:50000',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $sanitizedFileName = preg_replace('/[^A-Za-z0-9\-]/', '_', $request->name);
            $imageName = $sanitizedFileName . '.' . $request->image->extension();
            $request->image->move(public_path('images/collections'), $imageName);
            $data['image'] = $imageName;
        }

        Collection::create($data);

        return redirect()->route('collections.index')->with('success', 'Collection added successfully.');
    }

    public function destroy($id)
    {
        $collection = Collection::findOrFail($id);

        // Delete the image from storage
        if ($collection->image) {
            unlink(public_path('images/collections/' . $collection->image));
        }

        $collection->delete();

        return redirect()->route('collections.index')->with('success', 'Collection deleted successfully.');
    }
    
}
