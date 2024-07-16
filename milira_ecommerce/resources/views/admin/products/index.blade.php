<!-- resources/views/admin/products/index.blade.php -->
@extends('layouts.app')

@section('title')
    Product List
@endsection

@section('content')
<div class="container">
    <h2>Product List</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
    <thead>
    <tr>
        <th>S.No</th>
        <th>Title</th>
        <th>Small Description</th>
        <th>Description</th>
        <th>Category</th>
        <th>Images</th>
        <th>Collection</th>
        <th>Tags</th>
        <th>SKU</th>
        <th>Color</th>
        <th>Size</th>
        <th>Price</th>
        <th>Stocks</th> <!-- Add Stocks Column -->
        <th>Actions</th>
    </tr>
</thead>
<tbody>
    @foreach ($products as $index => $product)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $product->title }}</td>
            <td>{{ $product->small_description }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->category }}</td>
            <td>
                @if(is_array($product->images))
                    @foreach ($product->images as $image)
                        <img src="{{ asset('storage/' . $image) }}" alt="Product Image" style="width: 50px;">
                    @endforeach
                @else
                    <img src="{{ asset('storage/' . $product->images) }}" alt="Product Image" style="width: 50px;">
                @endif
            </td>
            <td>{{ $product->collection }}</td>
            <td>{{ $product->tags }}</td>
            <td>{{ $product->sku }}</td>
            <td>{{ $product->color }}</td>
            <td>{{ $product->size }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stocks }}</td> <!-- Display Stocks -->
            <td>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>

    </table>
</div>
@endsection
