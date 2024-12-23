@extends('layouts.app')
@section('title')
    Order Details
@endsection
@section('content')

    <x-page-title title="Ecommerce" subtitle="Order Details" />

    <div class="card">
        <div class="card-body">
            <div
                class="d-flex flex-lg-row flex-column align-items-start align-items-lg-center justify-content-between gap-3">
                <div class="flex-grow-1">
                    <h4 class="fw-bold">Order #849</h4>
                    <p class="mb-0">Customer ID : <a href="javascript:;">6589743</a></p>
                </div>
                <div class="overflow-auto">
                    <div class="btn-group position-static">
                        <div class="btn-group position-static">
                            <button type="button" class="btn btn-outline-primary">
                                <i class="bi bi-printer-fill me-2"></i>Print
                            </button>
                        </div>
                        <div class="btn-group position-static">
                            <button type="button" class="btn btn-outline-primary">
                                <i class="bi bi-arrow-clockwise me-2"></i>Refund
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
                            <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                More Actions
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
            </div>
        </div>
    </div>

    <div class="row">
    <div class="col-12 col-lg-8 d-flex">
        <div class="card w-100">
            <div class="card-body">
                <h5 class="mb-3 fw-bold">Order Items<span class="fw-light ms-2">({{ $order->orderItems->count() }})</span></h5>
                <div class="product-table">
                    <div class="table-responsive white-space-nowrap">
                        <table class="table align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Product Name</th>
                                    <th>Color</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->orderItems as $item)
                                <tr>
    <td>
        <div class="d-flex align-items-center gap-3">
        <div class="product-box">
    <img src="{{ asset('storage/uploads/' . $item->product->title . '_0.jpg') }}" 
         width="70" 
         class="rounded-3" 
         alt="{{ $item->product->title ?? 'Product Image' }}">
</div>
            <div class="product-info">
                <a href="javascript:;" class="product-title">{{ $item->product->title ?? 'Product Deleted' }}</a>
                <p class="mb-0 product-category">
                    Category: {{ $item->product->category ?? 'Unknown' }}
                </p>
            </div>
        </div>
    </td>
    <td>{{ ucfirst($item->product->color ?? 'N/A') }}</td>
    <td>{{ $item->quantity }}</td>
    <td>₹{{ number_format($item->price, 2) }}</td>
    <td>₹{{ number_format($item->price * $item->quantity, 2) }}</td>
</tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <p class="mb-0 fw-bold">Items subtotal :</p>
                    <p class="mb-0 fw-bold">₹{{ number_format($order->total_amount, 2) }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4 d-flex">
        <div class="w-100">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4 fw-bold">Summary</h4>
                    <div>
                        <div class="d-flex justify-content-between">
                            <p class="fw-semi-bold">Items subtotal :</p>
                            <p class="fw-semi-bold">₹{{ number_format($order->total_amount, 2) }}</p>
                        </div>
                        <!-- Additional details such as discounts, tax, shipping can be added here -->
                    </div>
                    <div class="d-flex justify-content-between border-top pt-4">
                        <h5 class="mb-0 fw-bold">Total :</h5>
                        <h5 class="mb-0 fw-bold">₹{{ number_format($order->total_amount, 2) }}</h5>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4 fw-bold">Order Status</h4>
                    <label class="form-label">Payment status</label>
                    <select class="form-select mb-4">
                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Done</option>
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div><!--end row-->


    <h5 class="fw-bold mb-4">Billing Details</h5>
    <div class="card">
        <div class="card-body">
            <div class="row g-3 row-cols-1 row-cols-lg-4">
                <div class="col">
                    <div class="d-flex align-items-start gap-3 border p-3 rounded">
                        <div class="detail-icon fs-5">
                            <i class="bi bi-person-circle"></i>
                        </div>
                        <div class="detail-info">
                            <p class="fw-bold mb-1">Customer Name</p>
                            <a href="javascript:;" class="mb-0">{{ $order->user->full_name }}</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="d-flex align-items-start gap-3 border p-3 rounded">
                        <div class="detail-icon fs-5">
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                        <div class="detail-info">
                            <h6 class="fw-bold mb-1">Email</h6>
                            <a href="javascript:;" class="mb-0">{{ $defaultAddress->email ?? 'N/A' }}</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="d-flex align-items-start gap-3 border p-3 rounded">
                        <div class="detail-icon fs-5">
                            <i class="bi bi-telephone-fill"></i>
                        </div>
                        <div class="detail-info">
                            <h6 class="fw-bold mb-1">Phone</h6>
                            <a href="javascript:;" class="mb-0">{{ $defaultAddress->phone ?? 'N/A' }}</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="d-flex align-items-start gap-3 border p-3 rounded">
                        <div class="detail-icon fs-5">
                            <i class="bi bi-calendar-check-fill"></i>
                        </div>
                        <div class="detail-info">
                            <h6 class="fw-bold mb-1">Shipping Date</h6>
                            <p class="mb-0">15 Dec, 2022</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="d-flex align-items-start gap-3 border p-3 rounded">
                        <div class="detail-icon fs-5">
                            <i class="bi bi-gift-fill"></i>
                        </div>
                        <div class="detail-info">
                            <h6 class="fw-bold mb-1">Gift Order</h6>
                            <p class="mb-0">Gift voucher has available</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="d-flex align-items-start gap-3 border p-3 rounded">
                        <div class="detail-icon fs-5">
                            <i class="bi bi-house-door-fill"></i>
                        </div>
                        <div class="detail-info">
                            <h6 class="fw-bold mb-1">Address 1</h6>
                            <p class="mb-0">123 Street Name, City, Australia</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="d-flex align-items-start gap-3 border p-3 rounded">
                        <div class="detail-icon fs-5">
                            <i class="bi bi-house-fill"></i>
                        </div>
                        <div class="detail-info">
                            <h6 class="fw-bold mb-1">Shipping Address</h6>
                            <p class="mb-0">198 Street Name, City, Inited States of America</p>
                        </div>
                    </div>
                </div>
            </div><!--end row-->
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
