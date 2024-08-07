@extends('layouts.app')
@section('title')
    Orders
@endsection
@section('content')

    <x-page-title title="Ecommerce" subtitle="Orders" />

    <div class="card mt-4">
        <div class="card-body">
            <div class="customer-table">
                <div class="table-responsive white-space-nowrap">
                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Total Amount Paid</th>
                                <th>Payment Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <!-- Order ID -->
                                    <td>
    <a href="{{ route('admin.orderDetails', $order->id) }}">#{{ $order->order_id }}</a>
</td>

                                    <!-- Customer Name -->
                                    <td>
                                        <p class="mb-0 customer-name fw-bold">{{ $order->user->full_name }}</p>
                                    </td>

                                    <!-- Total Amount Paid -->
                                    <td>₹{{ number_format($order->total_amount, 2) }}</td>

                                    <!-- Payment Status -->
                                    <td>
                                        @if($order->status === 'success')
                                            <span class="badge bg-success">Paid</span>
                                        @else
                                            <span class="badge bg-danger">Failed</span>
                                        @endif
                                    </td>

                                    <!-- Date -->
                                    <td>{{ $order->created_at->format('M d, Y h:i A') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <!--plugins-->
    <script src="{{ URL::asset('build/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/main.js') }}"></script>
@endpush
