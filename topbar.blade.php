<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="keywords" content="ShopUS, bootstrap-5, bootstrap, sass, css, HTML Template, HTML,html, bootstrap template, free template, figma, web design, web development,front end, bootstrap datepicker, bootstrap timepicker, javascript, ecommerce template">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('assets/images/logos/favicon.png') }}">

    <title>Milira-Shop</title>

    <!--------------- swiper-css ---------------->
    <link rel="stylesheet" href="{{ asset('assets/css/swiper10-bundle.min.css') }}">

    <!--------------- bootstrap-css ---------------->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!---------------------- Range Slider ------------------->
    <link rel="stylesheet" href="{{ asset('assets/css/nouislider.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.0/nouislider.min.css" rel="stylesheet">

    <!---------------------- Scroll ------------------->
    <link rel="stylesheet" href="{{ asset('assets/css/aos-3.0.0.css') }}">

    <!--------------- additional-css ---------------->
    <link rel="stylesheet" href="{{ asset('assets/css/shop.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>


    <!--------------- header-section --------------->
    @include('header')
    <!--------------- header-section-end --------------->

    <!--------------- blog-tittle-section---------------->
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="index.html">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">Dashboard</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">User Dashboard</h1>
            </div>
        </div>
    </section>
    <!--------------- blog-tittle-section-end---------------->

    <!---------------user-profile-section---------------->
    <section class="user-profile footer-padding">
        <div class="container">
            <div class="user-profile-section">
                <div class="dashboard-heading ">
                    <h5 class="dashboard-title">Change Password</h5>
                    <div class="dashboard-switch">
                        <span class="text">Switch Dashboard</span>
                        <span onclick="switchDashboard()" class="switch-icon"></span>
                    </div>
                </div>
                <div class="user-dashboard">
                    <div class="nav nav-item nav-pills  me-3" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">

                        <!-- nav-buttons -->
                        <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                            aria-selected="true">
                            <span>
                             
                            </span>
                            <span class="text">Dashboard</span>
                        </button>

                        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                            aria-selected="false">
                            <span>
                             
                            </span>
                            <span class="text">
                                Personal Info
                            </span>
                        </button>

                        <button class="nav-link" id="v-pills-order-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-order" type="button" role="tab" aria-controls="v-pills-order"
                            aria-selected="false">
                            <span>
                               
                            </span>
                            <span class="text">
                                Order
                            </span>
                        </button>

                        <button class="nav-link" id="v-pills-address-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-address" type="button" role="tab" aria-controls="v-pills-address"
                            aria-selected="false">
                            <span>
                        
                            </span>
                            <span class="text">
                                Address
                            </span>
                        </button>

                        <button class="nav-link" id="v-pills-review-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-review" type="button" role="tab" aria-controls="v-pills-review"
                            aria-selected="false">
                            <span>
                              
                            </span>
                            <span class="text">
                                Reviews
                            </span>
                        </button>

                        <button class="nav-link" id="v-pills-password-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-password" type="button" role="tab" aria-controls="v-pills-password"
                            aria-selected="false">
                            <span>
                                
                            </span>
                            <span class="text">
                                Change Password
                            </span>
                        </button>

                        <div class="nav-link">
                            <a href="login.html">
                                <span>
                                   
                                </span>
                                <span class="text">
                                    Logout
                                </span>
                            </a>
                        </div>

                    </div>

                    <!-- nav-content -->
                    <div class="tab-content nav-content" id="v-pills-tabContent" style="flex: 1 0%;">

                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab" tabindex="0">
                            <div class="user-profile">
                                <div class="user-title">
                                    <p class="paragraph">Hello, {{ $user->full_name }}</p>
                                    <h5 class="heading">Welcome to your Profile </h5>
                                </div>
                                <div class="profile-section">
                                    <div class="row g-5">
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="product-wrapper">
                                                <div class="wrapper-img">
                                                    <span>
                                                      
                                                    </span>
                                                </div>
                                                <div class="wrapper-content">
                                                    <p class="paragraph">Orders</p>
                                                    @if($orderCount > 0)
                                                        <h3 class="heading">{{ $orderCount }}</h3>
                                                    @else
                                                        <h3 class="heading">No items</h3>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <div class="info-section">
                                                <div class="seller-info">
                                                    <h5 class="heading">Personal Information</h5>
                                                    <div class="info-list">
                                                        <div class="info-title">
                                                            <p>Name:</p>
                                                            <p>Email:</p>
                                                            <p>Phone:</p>
                                                        </div>
                                                        <div class="info-details">
                                                        <p>{{ $user->full_name }}</p>
                                                        <p>{{ $user->email }}</p>
                                                        <p>{{ $user->phone_number }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="devider"></div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab" tabindex="0">
                            <div class="seller-application-section">
                                <div class="row ">
                                    <div class="col-lg-12">
                                        <div class=" account-section">
                                        <div class="review-form">
                            <h5 class="comment-title">Update Profile</h5>
                            <form id="updateProfileForm" method="POST" action="{{ route('profile.update') }}">
                                @csrf
                                <div class="account-inner-form">
                                    <div class="review-form-name">
                                        <label for="full_name" class="form-label">Full Name*</label>
                                        <input type="text" id="full_name" name="full_name" class="form-control" value="{{ $user->full_name }}" required>
                                    </div>
                                    <div class="review-form-name">
                                        <label for="email" class="form-label">Email Address*</label>
                                        <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" required>
                                    </div>
                                </div>
                                
                                <div class="account-inner-form">
                                    <div class="review-form-name">
                                        <label for="phone_number" class="form-label">Phone Number*</label>
                                        <input type="tel" id="phone_number" name="phone_number" class="form-control" value="{{ $user->phone_number }}" required>
                                    </div>
                                    <div class="review-form-name">
                                        <label for="dob" class="form-label">Date of Birth*</label>
                                        <input type="date" id="dob" name="dob" class="form-control" value="{{ $user->dob }}" required>
                                    </div>
                                </div>
                                <div class="review-form-name">
                                    <label for="gender" class="form-label">Gender*</label>
                                    <select id="gender" name="gender" class="form-select" required>
                                        <option value="">Choose...</option>
                                        <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                        <option value="Other" {{ $user->gender == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>
                            
                                <div class="submit-btn">
                                    <a href="#" class="shop-btn cancel-btn">Cancel</a>
                                    <button type="submit" class="shop-btn update-btn">Update Profile</button>
                                </div>
                            </form>
                </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="v-pills-order" role="tabpanel" aria-labelledby="v-pills-order-tab" tabindex="0">
    <div class="cart-section">
        <table>
            <tbody>
                <!-- Table Header -->
                <tr class="table-row table-top-row">
                    <td class="table-wrapper wrapper-product">
                        <h5 class="table-heading">Order ID</h5>
                    </td>
                    <td class="table-wrapper">
                        <div class="table-wrapper-center">
                            <h5 class="table-heading">Date</h5>
                        </div>
                    </td>
                    <td class="table-wrapper wrapper-total">
                        <div class="table-wrapper-center">
                            <h5 class="table-heading">Total</h5>
                        </div>
                    </td>
                    <td class="table-wrapper">
                        <div class="table-wrapper-center">
                            <h5 class="table-heading">Action</h5>
                        </div>
                    </td>
                </tr>

                <!-- Table Content -->
                @forelse($orders as $order)
                    <tr class="table-row ticket-row">
                        <!-- Order ID -->
                        <td class="table-wrapper wrapper-product">
                            <div class="wrapper-content">
                                <h5 class="heading">{{ $order->order_id }}</h5>
                            </div>
                        </td>

                        <!-- Order Date -->
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <h5 class="heading">{{ $order->created_at->format('d M Y') }}</h5>
                            </div>
                        </td>

                        <!-- Order Total -->
                        <td class="table-wrapper wrapper-total">
                            <div class="table-wrapper-center">
                                <h5 class="heading">₹{{ number_format($order->total_amount, 2) }}</h5>
                            </div>
                        </td>

                        <!-- Action -->
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <a href="{{ route('order.view', $order->id) }}" class="btn btn-primary">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No orders found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>





                        <div class="tab-pane fade" id="v-pills-address" role="tabpanel" aria-labelledby="v-pills-address-tab" tabindex="0">
    <div class="profile-section address-section addresses">
        <div class="row gy-md-0 g-5">
            @if($user->addresses && $user->addresses->isNotEmpty())
                @foreach($user->addresses as $index => $address)
                    <div class="col-md-6">
                        <div class="seller-info">
                            <h5 class="heading">Address-{{ $index + 1 }}</h5>
                            <div class="info-list">
                                <div class="info-title">
                                    <p>Name:</p>
                                    <p>Email:</p>
                                    <p>Phone:</p>
                                    <p>City:</p>
                                    <p>Pincode:</p>
                                    <p>Address:</p>
                                </div>
                                <div class="info-details">
                                    <p>{{ $address->first_name }} {{ $address->last_name }}</p>
                                    <p>{{ $address->email }}</p>
                                    <p>{{ $address->phone }}</p>
                                    <p>{{ $address->city }}</p>
                                    <p>{{ $address->postcode }}</p>
                                    <p>{{ $address->address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No addresses found.</p>
            @endif

           
        </div>
    </div>
</div>

<div class="col-lg-6">
                <button type="button" class="shop-btn" data-bs-toggle="modal" data-bs-target="#addAddressModal">Add New Address</button>
            </div>
    
                        <div class="tab-pane fade" id="v-pills-review" role="tabpanel"
                            aria-labelledby="v-pills-review-tab" tabindex="0">

                            <div class="top-selling-section">
                                <div class="row g-5">
                                    <div class="col-md-6">
                                        <div class="product-wrapper">
                                            <div class="product-img">
                                                <img src="./assets/images/homepage-one/product-img/product-img-5.webp"
                                                    alt="product-img">
                                            </div>
                                            <div class="product-info">
                                                <div class="review-date">
                                                    <p>July 22, 2022</p>
                                                </div>
                                                <div class="ratings">
                                                    <span>
                                                      
                                                    </span>
                                                </div>
                                                <div class="product-description">
                                                    <a href="product-sidebar.html" class="product-details">Rainbow
                                                        Sequin Dress
                                                    </a>
                                                    <p>Didn't I tell you not put your phone on charge because weekend?
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="product-cart-btn">
                                                <a href="cart.html" class="product-btn">Edit Review</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="product-wrapper">
                                            <div class="product-img">
                                                <img src="./assets/images/homepage-one/product-img/product-img-6.webp"
                                                    alt="product-img">
                                            </div>
                                            <div class="product-info">
                                                <div class="review-date">
                                                    <p>July 22, 2022</p>
                                                </div>
                                                <div class="ratings">
                                                    <span>
                                                    </span>
                                                </div>
                                                <div class="product-description">
                                                    <a href="product-sidebar.html" class="product-details">Rainbow
                                                        Sequin Dress
                                                    </a>
                                                    <p>Didn't I tell you not put your phone on charge because weekend?
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="product-cart-btn">
                                                <a href="cart.html" class="product-btn">Edit Review</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="product-wrapper">
                                            <div class="product-img">
                                                <img src="./assets/images/homepage-one/product-img/product-img-7.webp"
                                                    alt="product-img">
                                            </div>
                                            <div class="product-info">
                                                <div class="review-date">
                                                    <p>July 22, 2022</p>
                                                </div>
                                                <div class="ratings">
                                                    <span>
                                                   
                                                    </span>
                                                </div>
                                                <div class="product-description">
                                                    <a href="product-sidebar.html" class="product-details">Rainbow
                                                        Sequin Dress
                                                    </a>
                                                    <p>Didn't I tell you not put your phone on charge because weekend?
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="product-cart-btn">
                                                <a href="cart.html" class="product-btn">Edit Review</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="product-wrapper">
                                            <div class="product-img">
                                                <img src="./assets/images/homepage-one/product-img/product-img-8.webp"
                                                    alt="product-img">
                                            </div>
                                            <div class="product-info">
                                                <div class="review-date">
                                                    <p>July 22, 2022</p>
                                                </div>
                                                <div class="ratings">
                                                    <span>
                                             
                                                    </span>
                                                </div>
                                                <div class="product-description">
                                                    <a href="product-sidebar.html" class="product-details">Rainbow
                                                        Sequin Dress
                                                    </a>
                                                    <p>Didn't I tell you not put your phone on charge because weekend?
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="product-cart-btn">
                                                <a href="cart.html" class="product-btn">Edit Review</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        @if(session('otp_sent'))
        <div class="alert alert-info">{{ session('otp_sent') }}</div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- Password Update Form -->
<div class="tab-pane fade" id="v-pills-password" role="tabpanel" aria-labelledby="v-pills-password-tab" tabindex="0">
    <div class="row align-items-center">
        <div class="col-lg-12">
            <div class="form-section">
                <form id="passwordUpdateForm" method="POST" action="{{ route('profile.changePassword') }}">
                    @csrf
                    <div class="currentpass form-item">
                        <label for="currentpass" class="form-label">Current Password*</label>
                        <input type="password" class="form-control" id="currentpass" name="current_password" placeholder="******" required>
                    </div>
                    <div class="password form-item">
                        <label for="pass" class="form-label">New Password*</label>
                        <input type="password" class="form-control" id="pass" name="new_password" placeholder="******" required>
                    </div>
                    <div class="re-password form-item">
                        <label for="repass" class="form-label">Re-enter New Password*</label>
                        <input type="password" class="form-control" id="repass" name="new_password_confirmation" placeholder="******" required>
                    </div>
                    <div class="form-btn">
                        <button type="submit" class="shop-btn">Update Password</button>
                        <a href="#" class="shop-btn cancel-btn">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="otpModal" tabindex="-1" aria-labelledby="otpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="otpModalLabel">OTP Verification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="otpVerificationForm" method="POST" action="{{ route('profile.verifyOtp') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="otp" class="form-label">Enter OTP</label>
                        <input type="text" class="form-control" id="otp" name="otp" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Verify OTP</button>
                </form>
            </div>
        </div>
    </div>
</div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--------------- user-profile-section-end --------------->

    
    <!--------------- footer-section-end--------------->


    <div class="modal fade" id="addAddressModal" tabindex="-1" aria-labelledby="addAddressModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAddressModalLabel">Add New Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('profile.addAddress') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="country" class="form-label">Country</label>
                            <input type="text" class="form-control" id="country" name="country" required>
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city" required>
                        </div>
                        <div class="mb-3">
                            <label for="postcode" class="form-label">Postcode</label>
                            <input type="text" class="form-control" id="postcode" name="postcode" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_default" name="is_default" value="1">
                            <label class="form-check-label" for="is_default">Set as default address</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Address</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    <!--------------- footer-section --------------->
    <footer id="footer">
        <div class="footer-details">
            <div class="foot-logo py-5">
                <img src="../assets/images/logos/Milira-White-Logo.png" alt="Milira-White-Logo">
            </div>
            <div class="footer-content">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="foot-navigation">
                            <div class="foot-title">
                                <h4>Navigation</h4>
                            </div>
                            <div class="foot-items">
                                <ul>
                                    <li>
                                        <a href="index.html">Home</a>
                                    </li>
                                    <li>
                                        <a href="about.html">About</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Shop</a>
                                    </li>
                                    <li>
                                        <a href="#">Categories</a>
                                    </li>
                                    <li>
                                        <a href="contact.html">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="foot-navigation">
                            <div class="foot-title">
                                <h4>Categories</h4>
                            </div>
                            <div class="foot-items">
                                <ul>
                                    <li>
                                        <a href="#">Pendemt Set</a>
                                    </li>
                                    <li>
                                        <a href="#">Chain</a>
                                    </li>
                                    <li>
                                        <a href="#">Stud</a>
                                    </li>
                                    <li>
                                        <a href="#">Earrings</a>
                                    </li>
                                    <li>
                                        <a href="#">Bracelet</a>
                                    </li>
                                    <li>
                                        <a href="#">Necklace</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="foot-navigation">
                            <div class="foot-title">
                                <h4>Account</h4>
                            </div>
                            <div class="foot-items">
                                <ul>
                                    <li>
                                        <a href="#">My Account</a>
                                    </li>
                                    <li>
                                        <a href="#">Account Settings</a>
                                    </li>
                                    <li>
                                        <a href="#">Payments</a>
                                    </li>
                                    <li>
                                        <a href="#">Subscription</a>
                                    </li>
                                    <li>
                                        <a href="#">Dashboard</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="foot-navigation">
                            <div class="foot-title">
                                <h4>Legal</h4>
                            </div>
                            <div class="foot-items">
                                <ul>
                                    <li>
                                        <a href="#">Terms & Conditions</a>
                                    </li>
                                    <li>
                                        <a href="#">Privacy Policy</a>
                                    </li>
                                    <li>
                                        <a href="#">Shipping Policy</a>
                                    </li>
                                    <li>
                                        <a href="#">Payment Policy</a>
                                    </li>
                                    <li>
                                        <a href="#">Refund Policy</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyrights mt-4">
                <div class="row pt-4">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="copy">
                            <p>©<span id="demo"></span> by milira, All rights reserved</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="social">
                            <p>
                                <span>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                </span>
                                <span>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                </span>
                                <span>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </span>
                                <span>
                                    <a href=""><i class="bi bi-youtube"></i></a>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--------------- footer-section-end --------------->

    <script src="{{ asset('assets/js/jquery_3.7.1.min.js') }}"></script>

<!--------------- bootstrap-js ---------------->
<script src="{{ asset('assets/js/bootstrap_5.3.2.bundle.min.js') }}"></script>

<!--------------- Range-Slider-js ---------------->
<script src="{{ asset('assets/js/nouislider.min.js') }}"></script>

<!--------------- scroll-Animation-js ---------------->
<script src="{{ asset('assets/js/aos-3.0.0.js') }}"></script>

<!--------------- swiper-js ---------------->
<script src="{{ asset('assets/js/swiper10-bundle.min.js') }}"></script>

<!--------------- additional-js ---------------->
<script src="{{ asset('assets/js/shopus.js') }}"></script>
<script>
$(document).ready(function() {
    // Validate if the new passwords match
    function validatePasswordMatch() {
        const newPassword = $('#pass').val();
        const confirmPassword = $('#repass').val();

        if (newPassword === confirmPassword) {
            $('#pass, #repass').removeClass('is-invalid').addClass('is-valid');
        } else {
            $('#pass, #repass').removeClass('is-valid').addClass('is-invalid');
        }
    }

    // Trigger validation on password input change
    $('#pass, #repass').on('input', function() {
        validatePasswordMatch();
    });

    $('#passwordUpdateForm').on('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally

        $.ajax({
            url: '{{ route("profile.changePassword") }}',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if (response.otp_sent) {
                    // Show the OTP modal (this is assuming you have implemented OTP verification)
                    $('#otpModal').modal('show');
                }
            },
            error: function(response) {
                // Handle validation errors
                if (response.status === 422) {
                    let errors = response.responseJSON.errors;
                    
                    // Check for current password error
                    if (errors.current_password) {
                        $('#currentpass').addClass('is-invalid');
                    } else {
                        $('#currentpass').removeClass('is-invalid').addClass('is-valid');
                    }

                    // Check for new password match error
                    validatePasswordMatch();
                }
            }
        });
    });
});
</script>



</body>

</html>