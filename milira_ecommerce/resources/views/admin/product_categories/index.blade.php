@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Product Categories</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($categories) && $categories->count() > 0)
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <!-- You can add actions like edit and delete here -->
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">No categories found</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
