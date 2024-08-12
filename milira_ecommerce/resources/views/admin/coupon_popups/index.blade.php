@extends('layouts.app')

@section('title')
    Add Category
@endsection

@section('content')
<div class="container">
    <h1>Coupon Popups</h1>
    <a href="{{ route('admin.coupon_popups.create') }}" class="btn btn-primary">Add New Popup</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Coupon Code</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($popups as $popup)
                <tr>
                    <td>{{ $popup->title }}</td>
                    <td>{{ $popup->description }}</td>
                    <td>{{ $popup->coupon_code }}</td>
                    <td>
                        @if($popup->image)
                            <img src="{{ Storage::url($popup->image) }}" width="100" alt="Image">
                        @endif
                    </td>
                    <td>
                        <!-- Add actions like edit or delete -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
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