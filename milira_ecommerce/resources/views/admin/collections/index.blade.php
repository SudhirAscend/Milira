@extends('layouts.app')

@section('title')
    Collections
@endsection

@section('content')
<div class="container">
    <h2>Collections</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered"
           id="collectionsTable"
           data-toggle="table"
           data-search="true"
           data-pagination="true"
           data-sortable="true">
        <thead>
            <tr>
                <th data-sortable="true">Serial No</th>
                <th data-sortable="true">Name</th>
                <th data-sortable="true">Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($collections as $key => $collection)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $collection->name }}</td>
                    <td>{{ $collection->description }}</td>
                    <td>
                        @if ($collection->image)
                            <img src="{{ asset('images/collections/' . $collection->image) }}" alt="{{ $collection->name }}" width="50">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('collections.destroy', $collection->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this collection?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('script')
    <!-- Bootstrap Table CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.20.2/dist/bootstrap-table.min.css">

    <!-- Bootstrap Table JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.20.2/dist/bootstrap-table.min.js"></script>

    <!-- Additional plugins -->
    <script src="{{ URL::asset('build/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/peity/jquery.peity.min.js') }}"></script>
    <script>
        $(".data-attributes span").peity("donut")
    </script>
    <script src="{{ URL::asset('build/js/dashboard2.js') }}"></script>
    <script src="{{ URL::asset('build/js/main.js') }}"></script>
@endpush
