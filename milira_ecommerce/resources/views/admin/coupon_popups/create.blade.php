@extends('layouts.app')

@section('title')
    Add Category
@endsection


@section('content')
<div class="container mt-5">
    <h1>Create Coupon Popup</h1>
    <form action="{{ route('admin.coupon_popups.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="coupon_code">Coupon Code</label>
            <input type="text" id="coupon_code" name="coupon_code" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="image">Image (optional)</label>
            <input type="file" id="image" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Create</button>
    </form>
@endsection
@push('script')
    <!--plugins-->
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