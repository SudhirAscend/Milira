@extends('layouts.app')
@section('title')
    Orders
@endsection
@section('content')

    <x-page-title title="Ecommerce" subtitle="Orders" />

    <div class="product-count d-flex align-items-center gap-3 gap-lg-4 mb-4 fw-medium flex-wrap font-text1">
        <a href="javascript:;"><span class="me-1">All</span><span class="text-secondary">(85472)</span></a>
        <a href="javascript:;"><span class="me-1">Pending Payment</span><span class="text-secondary">(86)</span></a>
        <a href="javascript:;"><span class="me-1">Incomplete</span><span class="text-secondary">(76)</span></a>
        <a href="javascript:;"><span class="me-1">Completed</span><span class="text-secondary">(8759)</span></a>
        <a href="javascript:;"><span class="me-1">Refunded</span><span class="text-secondary">(769)</span></a>
        <a href="javascript:;"><span class="me-1">Failed</span><span class="text-secondary">(42)</span></a>
    </div>

    <div class="row g-3">
        <div class="col-auto">
            <div class="position-relative">
                <input class="form-control px-5" type="search" placeholder="Search Customers">
                <span
                    class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50 fs-5">search</span>
            </div>
        </div>
        <div class="col-auto flex-grow-1 overflow-auto">
            <div class="btn-group position-static">
                <div class="btn-group position-static">
                    <button type="button" class="btn border btn-filter dropdown-toggle px-4" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Payment Status
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                        <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                    </ul>
                </div>
                <div class="btn-group position-static">
                    <button type="button" class="btn border btn-filter dropdown-toggle px-4" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Completed
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                        <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                    </ul>
                </div>
                <div class="btn-group position-static">
                    <button type="button" class="btn border btn-filter dropdown-toggle px-4" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        More Filters
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                        <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <div class="d-flex align-items-center gap-2 justify-content-lg-end">
                <button class="btn btn-filter px-4"><i class="bi bi-box-arrow-right me-2"></i>Export</button>
                <button class="btn btn-primary px-4"><i class="bi bi-plus-lg me-2"></i>Add Order</button>
            </div>
        </div>
    </div><!--end row-->

    <div class="card mt-4">
    <div class="card-body">
        <div class="customer-table">
            <div class="table-responsive white-space-nowrap">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>
                                <input class="form-check-input" type="checkbox">
                            </th>
                            <th>Order Id</th>
                            <th>Price</th>
                            <th>Customer</th>
                            <th>Payment Status</th>
                            <th>Completed Payment</th>
                            <th>Delivery Type</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>
                                    <input class="form-check-input" type="checkbox">
                                </td>
                                <td>
                                    <a href="javascript:;">#{{ $order->order_id }}</a>
                                </td>
                                <td>${{ $order->total_amount }}</td>
                                <td>
                                    <a class="d-flex align-items-center gap-3" href="javascript:;">
                                        <p class="mb-0 customer-name fw-bold">{{ $order->user->full_name }}</p>
                                    </a>
                                </td>
                                <td>
                                    <span class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">
                                        {{ ucfirst($order->status) }}
                                        <i class="bi bi-check2 ms-2"></i>
                                    </span>
                                </td>
                                <td>
                                    @if($order->payment_status === 'completed')
                                        <span class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">
                                            Completed<i class="bi bi-check2 ms-2"></i>
                                        </span>
                                    @else
                                        <span class="lable-table bg-danger-subtle text-danger rounded border border-danger-subtle font-text2 fw-bold">
                                            Failed<i class="bi bi-x-lg ms-2"></i>
                                        </span>
                                    @endif
                                </td>
                                <td>{{ $order->delivery_type }}</td>
                                <td>{{ $order->created_at->format('M d, h:i A') }}</td>
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
