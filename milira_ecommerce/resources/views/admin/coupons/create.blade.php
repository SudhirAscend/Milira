
@extends('layouts.app')

@section('title')
    Add Category
@endsection
@section('content')
    <h1>Create Coupon</h1>
    <form action="{{ route('admin.coupons.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="code">Coupon Code</label>
        <input type="text" name="code" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="type">Type</label>
        <select name="type" class="form-control" required>
            <option value="fixed">Fixed</option>
            <option value="percentage">Percentage</option>
        </select>
    </div>
    <div class="form-group">
        <label for="value">Value</label>
        <input type="number" name="value" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="expiry_date">Expiry Date</label>
        <input type="date" name="expiry_date" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Create Coupon</button>
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