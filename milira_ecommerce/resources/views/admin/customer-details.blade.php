@extends('layouts.app')
@section('title')
    Customer Details
@endsection
@section('content')

    <x-page-title title="Ecommerce" subtitle="Customer Details" />

    <div class="row">
    <div class="col-12 col-lg-4 d-flex">
    <div class="card w-100">
        <div class="card-body">
            <div class="text-center mt-5 pt-4">
                <h4 class="mb-1">{{ $customer->full_name }}</h4>
            </div>
            <div class="d-flex align-items-center justify-content-around mt-5">
                <div class="d-flex flex-column gap-2">
                    <h4 class="mb-0">798</h4>
                    <p class="mb-0">Posts</p>
                </div>
                <div class="d-flex flex-column gap-2">
                    <h4 class="mb-0">48K</h4>
                    <p class="mb-0">Following</p>
                </div>
                <div class="d-flex flex-column gap-2">
                    <h4 class="mb-0">24.3M</h4>
                    <p class="mb-0">Followers</p>
                </div>
            </div>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item border-top">
                <b>Address</b>
                <br>
                {{ $customer->address }}
            </li>
            <li class="list-group-item">
                <b>Email</b>
                <br>
                {{ $customer->email }}
            </li>
            <li class="list-group-item">
                <b>Phone</b>
                <br>
                {{ $customer->phone_number }}
                <br>
            </li>
        </ul>
    </div>
</div>

        <div class="col-12 col-lg-8 d-flex">
            <div class="card w-100">
            <div class="card-body">
            <h5 class="mb-3">Orders<span class="fw-light ms-2">(98)</span></h5>
            <div class="product-table">
                <div class="table-responsive white-space-nowrap">
                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Order</th>
                                <th>Expense</th>
                                <th>Payment Status</th>
                                <th>Order Status</th>
                                <th>Delivery Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#2453</td>
                                <td>$865</td>
                                <td><span
                                        class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Paid<i
                                            class="bi bi-check2 ms-2"></i></span></td>
                                <td><span
                                        class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Completed<i
                                            class="bi bi-check2 ms-2"></i></span></td>
                                <td>Cash on delivery</td>
                                <td>Jun 12, 12:56 PM</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm dropdown-toggle dropdown-toggle-nocaret" type="button"
                                            data-bs-toggle="dropdown">
                                            <i class="bi bi-three-dots"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:;"><i
                                                        class="bi bi-eye-fill me-2"></i>View</a>
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;"><i
                                                        class="bi bi-box-arrow-right me-2"></i>Export</a></li>
                                            <li class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="javascript:;"><i
                                                        class="bi bi-trash-fill me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>#7845</td>
                                <td>$427</td>
                                <td><span
                                        class="lable-table bg-danger-subtle text-danger rounded border border-danger-subtle font-text2 fw-bold">Failed<i
                                            class="bi bi-x-lg ms-2"></i></span></td>
                                <td><span
                                        class="lable-table bg-primary-subtle text-primary rounded border border-primary-subtle font-text2 fw-bold">Completed<i
                                            class="bi bi-check2 ms-2"></i></span></td>
                                <td>Cash on delivery</td>
                                <td>Jun 12, 12:56 PM</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm dropdown-toggle dropdown-toggle-nocaret" type="button"
                                            data-bs-toggle="dropdown">
                                            <i class="bi bi-three-dots"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:;"><i
                                                        class="bi bi-eye-fill me-2"></i>View</a>
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;"><i
                                                        class="bi bi-box-arrow-right me-2"></i>Export</a></li>
                                            <li class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="javascript:;"><i
                                                        class="bi bi-trash-fill me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>#9635</td>
                                <td>$123</td>
                                <td><span
                                        class="lable-table bg-warning-subtle text-warning rounded border border-warning-subtle font-text2 fw-bold">Pending<i
                                            class="bi bi-info-circle ms-2"></i></span></td>
                                <td><span
                                        class="lable-table bg-danger-subtle text-danger rounded border border-danger-subtle font-text2 fw-bold">Failed<i
                                            class="bi bi-x-lg ms-2"></i></span></td>
                                <td>Cash on delivery</td>
                                <td>Jun 12, 12:56 PM</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm dropdown-toggle dropdown-toggle-nocaret" type="button"
                                            data-bs-toggle="dropdown">
                                            <i class="bi bi-three-dots"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:;"><i
                                                        class="bi bi-eye-fill me-2"></i>View</a>
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;"><i
                                                        class="bi bi-box-arrow-right me-2"></i>Export</a></li>
                                            <li class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="javascript:;"><i
                                                        class="bi bi-trash-fill me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>#2415</td>
                                <td>$986</td>
                                <td><span
                                        class="lable-table bg-primary-subtle text-primary rounded border border-primary-subtle font-text2 fw-bold">Completed<i
                                            class="bi bi-check2-all ms-2"></i></span></td>
                                <td><span
                                        class="lable-table bg-warning-subtle text-warning rounded border border-warning-subtle font-text2 fw-bold">Pending<i
                                            class="bi bi-info-circle ms-2"></i></span></td>
                                <td>Cash on delivery</td>
                                <td>Jun 12, 12:56 PM</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm dropdown-toggle dropdown-toggle-nocaret" type="button"
                                            data-bs-toggle="dropdown">
                                            <i class="bi bi-three-dots"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:;"><i
                                                        class="bi bi-eye-fill me-2"></i>View</a>
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;"><i
                                                        class="bi bi-box-arrow-right me-2"></i>Export</a></li>
                                            <li class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="javascript:;"><i
                                                        class="bi bi-trash-fill me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>#3526</td>
                                <td>$104</td>
                                <td><span
                                        class="lable-table bg-danger-subtle text-danger rounded border border-danger-subtle font-text2 fw-bold">Failed<i
                                            class="bi bi-x-lg ms-2"></i></span></td>
                                <td><span
                                        class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Completed<i
                                            class="bi bi-check2 ms-2"></i></span></td>
                                <td>Cash on delivery</td>
                                <td>Jun 12, 12:56 PM</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm dropdown-toggle dropdown-toggle-nocaret" type="button"
                                            data-bs-toggle="dropdown">
                                            <i class="bi bi-three-dots"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:;"><i
                                                        class="bi bi-eye-fill me-2"></i>View</a>
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;"><i
                                                        class="bi bi-box-arrow-right me-2"></i>Export</a></li>
                                            <li class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="javascript:;"><i
                                                        class="bi bi-trash-fill me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>#7845</td>
                                <td>$368</td>
                                <td><span
                                        class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Paid<i
                                            class="bi bi-check2 ms-2"></i></span></td>
                                <td><span
                                        class="lable-table bg-danger-subtle text-danger rounded border border-danger-subtle font-text2 fw-bold">Failed<i
                                            class="bi bi-x-lg ms-2"></i></span></td>
                                <td>Cash on delivery</td>
                                <td>Jun 12, 12:56 PM</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm dropdown-toggle dropdown-toggle-nocaret" type="button"
                                            data-bs-toggle="dropdown">
                                            <i class="bi bi-three-dots"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:;"><i
                                                        class="bi bi-eye-fill me-2"></i>View</a>
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;"><i
                                                        class="bi bi-box-arrow-right me-2"></i>Export</a></li>
                                            <li class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="javascript:;"><i
                                                        class="bi bi-trash-fill me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>#256</td>
                                <td>$865</td>
                                <td><span
                                        class="lable-table bg-warning-subtle text-warning rounded border border-warning-subtle font-text2 fw-bold">Pending<i
                                            class="bi bi-info-circle ms-2"></i></span></td>
                                <td><span
                                        class="lable-table bg-primary-subtle text-primary rounded border border-primary-subtle font-text2 fw-bold">Completed<i
                                            class="bi bi-check2-all ms-2"></i></span></td>
                                <td>Cash on delivery</td>
                                <td>Jun 12, 12:56 PM</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm dropdown-toggle dropdown-toggle-nocaret" type="button"
                                            data-bs-toggle="dropdown">
                                            <i class="bi bi-three-dots"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:;"><i
                                                        class="bi bi-eye-fill me-2"></i>View</a>
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;"><i
                                                        class="bi bi-box-arrow-right me-2"></i>Export</a></li>
                                            <li class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="javascript:;"><i
                                                        class="bi bi-trash-fill me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div><!--end row-->

    <div class="card">
        
    </div>
    <div class="card mt-4">
    <div class="card-body">
        <h5 class="mb-3 fw-bold">Cart <span class="fw-light ms-2">({{ $cartItems->count() }})</span></h5>
        <div class="product-table">
            <div class="table-responsive white-space-nowrap">
                @if($cartItems->isEmpty())
                    <p>No items in the cart</p>
                @else
                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Color</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="product-box">
                                                <img src="{{ asset('storage/' . $item->product->images[0]) }}" width="55" class="rounded-3" alt="{{ $item->product->name }}">
                                            </div>
                                            <div class="product-info">
                                                <a href="{{ route('product.show', $item->product->title) }}" class="product-title">{{ $item->product->title }}</a>
                                                <p class="mb-0 product-category">Category: {{ $item->product->category }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->product->color }}</td>
                                    <td>{{ $item->product->price }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>
    <div class="card mt-4">
        <div class="card-body">
        <h5 class="mb-3 fw-bold">Wishlist<span class="fw-light ms-2">({{ $wishlistItems->count() }})</span></h5>
            <div class="product-table">
                <div class="table-responsive white-space-nowrap">
                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr>

                                <th>Product Name</th>
                                <th>Color</th>
                                <th>Price</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($wishlistItems as $item)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="product-box">
                                    <img src="{{ asset('storage/' . $item->product->images[0]) }}" width="55" class="rounded-3" alt="">
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript:;" class="product-title">{{ $item->product->title }}</a>
                                        <p class="mb-0 product-category">Category : {{ $item->product->category }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $item->product->color }}</td>
                            <td>${{ $item->product->price }}</td>
                        </tr>
                    @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

       <div class="card mt-4">
            <div class="card-body">
                <h5 class="mb-3 fw-bold">Ratings & Reviews<span class="fw-light ms-2">({{ $reviews->count() }})</span></h5>
                <div class="product-table">
                    <div class="table-responsive white-space-nowrap">
                        <table class="table align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Product Name</th>
                                    <th>Rating</th>
                                    <th>Review</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                        @forelse ($reviews as $review)
                            <tr>
                                <td>
                                    <a href="javascript:;" class="product-title">{{ $review->product->title }}</a>
                                </td>
                                <td>
                                    @for ($i = 0; $i < $review->rating; $i++)
                                        <i class="bi bi-star-fill text-warning"></i>
                                    @endfor
                                </td>
                                <td class="review-desc">{{ $review->description }}</td>
                                <td>{{ $review->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No reviews posted.</td>
                            </tr>
                        @endforelse
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
    <script>
        new PerfectScrollbar(".customer-notes")
    </script>
@endpush
