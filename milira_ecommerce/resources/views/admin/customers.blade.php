@extends('layouts.app')
@section('title')
    Customers
@endsection
@section('content')

    <x-page-title title="Ecommerce" subtitle="Customers " />

    <div class="product-count d-flex align-items-center gap-3 gap-lg-4 mb-4 fw-bold flex-wrap font-text1">
        <a href="javascript:;"><span class="me-1">All</span><span class="text-secondary">(85472)</span></a>
        <a href="javascript:;"><span class="me-1">New</span><span class="text-secondary">(145)</span></a>
        <a href="javascript:;"><span class="me-1">Checkouts</span><span class="text-secondary">(89)</span></a>
        <a href="javascript:;"><span class="me-1">Locals</span><span class="text-secondary">(5872)</span></a>
        <a href="javascript:;"><span class="me-1">Subscribers</span><span class="text-secondary">(163)</span></a>
        <a href="javascript:;"><span class="me-1">Top Reviews</span><span class="text-secondary">(8)</span></a>
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
                    <button type="button" class="btn btn-filter dropdown-toggle px-4" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Country
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
                    <button type="button" class="btn btn-filter dropdown-toggle px-4" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Source
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
                    <button type="button" class="btn btn-filter dropdown-toggle px-4" data-bs-toggle="dropdown"
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
                <button class="btn btn-primary px-4"><i class="bi bi-plus-lg me-2"></i>Add Customers</button>
            </div>
        </div>
    </div><!--end row-->

    <div class="card mt-4">
        <div class="card-body">
            <div class="customer-table">
                <div class="table-responsive white-space-nowrap">
                    <table class="table align-middle"
                           id="customersTable"
                           data-toggle="table"
                           data-search="true"
                           data-pagination="true"
                           data-sortable="true">
                        <thead class="table-light">
                            <tr>
                                <th data-checkbox="true">
                                    <input class="form-check-input" type="checkbox">
                                </th>
                                <th data-sortable="true">Customers</th>
                                <th data-sortable="true">Email</th>
                                <th data-sortable="true">Orders</th>
                                <th data-sortable="true">Total Spent</th>
                                <th data-sortable="true">Location</th>
                                <th data-sortable="true">Last Seen</th>
                                <th data-sortable="true">Last Order</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                            <tr>
                                <td>
                                    <input class="form-check-input" type="checkbox">
                                </td>
                                <td>
                                    <a class="d-flex align-items-center gap-3" href="javascript:;">
                                        <p class="mb-0 customer-name fw-bold">{{ $customer->full_name }}</p>
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:;" class="font-text1">{{ $customer->email }}</a>
                                </td>
                                <td>142</td>
                                <td>$2485</td>
                                <td>{{ $customer->address }}</td>
                                <td>{{ $customer->updated_at->format('Y-m-d') }}</td>
                                <td>{{ $customer->updated_at->format('H:i') }}</td>
                                <td>
                                    <a href="{{ route('admin.customer.details', $customer->id) }}" class="btn btn-link">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>
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
    <!-- Bootstrap Table CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.20.2/dist/bootstrap-table.min.css">

    <!-- Bootstrap Table JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.20.2/dist/bootstrap-table.min.js"></script>

    <!-- Additional plugins -->
    <script src="{{ URL::asset('build/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/main.js') }}"></script>
@endpush
