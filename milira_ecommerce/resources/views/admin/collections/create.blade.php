
@extends('layouts.app')

@section('title')
    Add Category
@endsection

@section('content')
<div class="container">
    <h2>Add New Collection</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('collections.store') }}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Collection Name</label>
            <input type="text" class="form-control" id="name" name="name" value="" required>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong></strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong></strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong></strong>
                </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add Collection</button>
    </form>
</div>
@endsection
