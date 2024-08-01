<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collection;

class CollectionController extends Controller
{
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
            // Sanitize the name to create a valid filename
            $sanitizedFileName = preg_replace('/[^A-Za-z0-9\-]/', '_', $request->name);
            
            // Set the file name using the sanitized name and original file extension
            $imageName = $sanitizedFileName . '.' . $request->image->extension();
    
            // Move the file to the desired location
            $request->image->move(public_path('images/collections'), $imageName);
    
            // Save the image name to the data array
            $data['image'] = $imageName;
        }
    
        Collection::create($data);
    
        return redirect()->route('collections.create')->with('success', 'Collection added successfully.');
    }
    
}
