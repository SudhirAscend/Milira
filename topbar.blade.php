<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords"
        content="ShopUS, bootstrap-5, bootstrap, sass, css, HTML Template, HTML,html, bootstrap template, free template, figma, web design, web development,front end, bootstrap datepicker, bootstrap timepicker, javascript, ecommerce template,dashboard,bootstrap-dashboard">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
.is-invalid {
    border-color: red !important;
}

.is-valid {
    border-color: green !important;
}
</style>
<!-- Bootstrap JS (if not included in your Laravel Mix setup) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="{{ asset('assets/images/homepage-one/icon.png') }}">

<!--title  -->
<title>Milira-Dashboard</title>

<!--------------- swiper-css ---------------->
<link rel="stylesheet" href="{{ asset('assets/css/swiper10-bundle.min.css') }}">

<!--------------- bootstrap-css ---------------->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-5.3.2.min.css') }}">

<!---------------------- Range Slider ------------------->
<link rel="stylesheet" href="{{ asset('assets/css/nouislider.min.css') }}">

<!---------------------- Scroll ------------------->
<link rel="stylesheet" href="{{ asset('assets/css/aos-3.0.0.css') }}">

<!--------------- additional-css ---------------->
<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
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
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
</svg>
                            </span>
                            <span class="text">Dashboard</span>
                        </button>

                        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                            aria-selected="false">
                            <span>
                                <svg width="14" height="19" viewBox="0 0 14 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    </svg>
                            </span>
                            <span class="text">
                                Parsonal Info
                            </span>
                        </button>

                        <button class="nav-link" id="v-pills-payment-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-payment" type="button" role="tab" aria-controls="v-pills-payment"
                            aria-selected="false">
                            <span>
                                <svg width="17" height="12" viewBox="0 0 17 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    </svg>

                            </span>
                            <span class="text">
                                Payment Method
                            </span>
                        </button>

                        <button class="nav-link" id="v-pills-order-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-order" type="button" role="tab" aria-controls="v-pills-order"
                            aria-selected="false">
                            <span>
                                <svg width="15" height="18" viewBox="0 0 15 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                      </svg>
                            </span>
                            <span class="text">
                                Order
                            </span>
                        </button>

                        <button class="nav-link" id="v-pills-wishlist-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-wishlist" type="button" role="tab" aria-controls="v-pills-wishlist"
                            aria-selected="false">
                            <span>
                                <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    
                                </svg>
                            </span>
                            <span class="text">
                                Wishlist
                            </span>
                        </button>

                        <button class="nav-link" id="v-pills-address-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-address" type="button" role="tab" aria-controls="v-pills-address"
                            aria-selected="false">
                            <span>
                                <svg width="14" height="20" viewBox="0 0 14 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.864 15.9822C11.4632 12.6506 9.25877 11.1118 7.04363 11.0545C5.70166 11.0223 4.5422 11.5126 3.57598 12.4609C2.60976 13.4057 2.19465 14.5938 1.99067 16.0288C1.37873 15.7461 0.809733 15.5063 0.272945 15.2128C0.147695 15.1449 0.0582333 14.8944 0.0582333 14.7262C0.0439189 13.5631 -0.0849134 12.3822 0.0940158 11.2478C0.365988 9.54079 1.99067 8.23819 3.71555 8.05568C4.60661 7.96264 5.46547 7.9519 6.35296 8.1702C6.88617 8.3026 7.51243 8.19167 8.06711 8.05926C10.2357 7.52963 13.1559 8.64973 13.7571 10.9973C14.0577 12.1675 14.0577 13.3663 13.8751 14.5615C13.8107 14.9981 13.6068 15.3202 13.1737 15.4812C12.7336 15.6387 12.3042 15.8105 11.864 15.9822Z" />
                                    <path
                                        d="M10.6071 3.72194C10.5928 5.77962 8.96814 7.38999 6.93193 7.36494C4.8814 7.33989 3.24241 5.7009 3.26388 3.69331C3.28535 1.59984 4.90287 -0.0212607 6.94982 0.000210833C9.01824 0.0181038 10.6215 1.64994 10.6071 3.72194Z" />
                                    <path
                                        d="M10.9467 16.0178C10.9109 18.2795 9.07512 19.9972 6.74188 19.9507C4.58041 19.9077 2.77681 18.0719 2.80902 15.9498C2.8448 13.7454 4.69493 11.9776 6.9387 12.0062C9.17174 12.0384 10.9789 13.8492 10.9467 16.0178ZM6.84208 18.4834C7.27509 18.462 7.76893 18.4262 8.26278 18.419C8.62779 18.4154 8.74947 18.2222 8.74947 17.8966C8.74947 17.1808 8.75305 16.4687 8.74589 15.753C8.74589 15.6599 8.70652 15.5025 8.65642 15.4882C8.32719 15.4059 8.40234 15.1482 8.38087 14.9263C8.36298 14.7367 8.34151 14.547 8.30572 14.3645C8.15542 13.6309 7.64011 13.2122 6.91723 13.2229C6.22299 13.2337 5.64683 13.7418 5.52874 14.4432C5.4679 14.8154 5.65041 15.2735 5.17088 15.5096C5.14941 15.5204 5.14941 15.5919 5.14941 15.6349C5.14941 16.4508 5.1351 17.2667 5.16015 18.0826C5.16372 18.19 5.34981 18.3689 5.4679 18.3868C5.90449 18.4477 6.34108 18.4548 6.84208 18.4834Z" />
                                    <path
                                        d="M7.78818 15.3706C7.81323 14.8159 7.93491 14.2684 7.41601 13.9069C7.09036 13.6815 6.70745 13.6851 6.40327 13.9499C5.95953 14.3328 6.03826 14.8481 6.08836 15.3706C6.66451 15.3706 7.19414 15.3706 7.78818 15.3706ZM6.76113 17.643C6.8828 17.643 7.00448 17.643 7.11899 17.643C7.15836 17.3209 7.22635 17.0239 7.21561 16.7304C7.21204 16.6088 7.02953 16.4978 6.92933 16.3797C6.83986 16.4835 6.6824 16.5837 6.67883 16.6911C6.67167 16.9988 6.72892 17.3137 6.76113 17.643Z"
                                        fill="white" />
                                    <path
                                        d="M7.78818 15.3706C7.19414 15.3706 6.66451 15.3706 6.08836 15.3706C6.03826 14.8445 5.95953 14.3328 6.40327 13.9499C6.71103 13.6851 7.09394 13.6815 7.41601 13.9069C7.93491 14.2684 7.81323 14.8159 7.78818 15.3706Z" />
                                    <path
                                        d="M6.76261 17.6421C6.7304 17.3129 6.67314 17.0016 6.6803 16.6902C6.68388 16.5865 6.84134 16.4827 6.9308 16.3789C7.031 16.4934 7.21351 16.6079 7.21709 16.7296C7.22782 17.0231 7.15983 17.3201 7.12046 17.6421C7.00595 17.6421 6.88786 17.6421 6.76261 17.6421Z" />
                                </svg>
                            </span>
                            <span class="text">
                                Address
                            </span>
                        </button>

                        <button class="nav-link" id="v-pills-review-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-review" type="button" role="tab" aria-controls="v-pills-review"
                            aria-selected="false">
                            <span>
                                <svg width="16" height="18" viewBox="0 0 16 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                </svg>
                            </span>
                            <span class="text">
                                Reviews
                            </span>
                        </button>

                        <button class="nav-link" id="v-pills-password-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-password" type="button" role="tab" aria-controls="v-pills-password"
                            aria-selected="false">
                            <span>
                                <svg width="16" height="19" viewBox="0 0 16 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    </svg>
                            </span>
                            <span class="text">
                                Change Password
                            </span>
                        </button>

                        <button class="nav-link" id="v-pills-ticket-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-ticket" type="button" role="tab" aria-controls="v-pills-ticket"
                            aria-selected="false">
                            <span>
                                <svg width="18" height="20" viewBox="0 0 18 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    </svg>
                            </span>
                            <span class="text">
                                Support Ticket
                            </span>
                        </button>

                        <div class="nav-link">
                            <a href="login.html">
                                <span>
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                       
                                    </svg>
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
                                                        <svg width="62" height="62" viewBox="0 0 62 62" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            </svg>
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
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="product-wrapper">
                                                <div class="wrapper-img">
                                                    <span>
                                                        <svg width="62" height="62" viewBox="0 0 62 62" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                             </svg>

                                                    </span>
                                                </div>
                                                <div class="wrapper-content">
                                                    <p class="paragraph">Delivery Completed</p>
                                                    <h3 class="heading">99783</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="product-wrapper">
                                                <div class="wrapper-img">
                                                    <span>
                                                        <svg width="62" height="62" viewBox="0 0 62 62" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                           
                                                        </svg>

                                                    </span>
                                                </div>
                                                <div class="wrapper-content">
                                                    <p class="paragraph">Support Tickets</p>
                                                    <h3 class="heading">09</h3>
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
                                                            <p>City:</p>
                                                            <p>pincode:</p>
                                                        </div>
                                                        <div class="info-details">
                                                        <p>{{ $user->full_name }}</p>
                                                        <p>{{ $user->email }}</p>
                                                        <p>{{ $user->phone_number }}</p>
                                                        <p>{{ $user->city }}</p>
                                                        <p>{{ $user->pin_code }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="devider"></div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="info-section">
                                                <div class="seller-info">
                                                    <h5 class="heading">Address</h5>
                                                    <div class="info-list">
                                                        <div class="info-title">
                                                            <p>Address:</p>
                                                        </div>
                                                        <div class="info-details">
                                                        <p>{{ $user->address }}</p>
                                                        
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
                                <div class="review-form-name address-form">
                                    <label for="address" class="form-label">Address*</label>
                                    <input type="text" id="address" name="address" class="form-control" value="{{ $user->address }}" required>
                                </div>
                                <div class="review-form-name address-form">
                                    <label for="city" class="form-label">City*</label>
                                    <input type="text" id="city" name="city" class="form-control" value="{{ $user->city }}" required>
                                </div>
                                <div class="review-form-name address-form">
                                    <label for="state" class="form-label">State*</label>
                                    <input type="text" id="state" name="state" class="form-control" value="{{ $user->state }}" required>
                                </div>
                                <div class="review-form-name address-form">
                                    <label for="pin_code" class="form-label">Pin Code*</label>
                                    <input type="text" id="pin_code" name="pin_code" class="form-control" value="{{ $user->pin_code }}" required>
                                </div>
                                <div class="review-form-name">
                                    <label for="country" class="form-label">Country*</label>
                                    <select id="country" name="country" class="form-select" required>
                                        <option value="">Choose...</option>
                                        <option value="Bangladesh" {{ $user->country == 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
                                        <option value="United States" {{ $user->country == 'United States' ? 'selected' : '' }}>United States</option>
                                        <option value="United Kingdom" {{ $user->country == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
                                        <option value="India" {{ $user->country == 'India' ? 'selected' : '' }}>India</option>
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

                        <div class="tab-pane fade" id="v-pills-payment" role="tabpanel"
                            aria-labelledby="v-pills-order-tab" tabindex="0">
                            <div class="payment-section">
                                <div class="wrapper">
                                    <div class="wrapper-item">
                                        <div class="wrapper-img">
                                            <img src="./assets/images/homepage-one/payment-img-1.png" alt="payment">
                                        </div>
                                        <div class="wrapper-content">
                                            <h5 class="heading">Dutch Bangl Bank Lmtd</h5>
                                            <p class="paragraph">Bank **********5535</p>
                                            <p class="verified">Verified</p>
                                        </div>
                                    </div>
                                    <a href="#" class="shop-btn">Manage</a>
                                </div>
                                <hr>
                                <div class="wrapper">
                                    <div class="wrapper-item">
                                        <div class="wrapper-img">
                                            <img src="./assets/images/homepage-one/payment-img-2.png" alt="payment">
                                        </div>
                                        <div class="wrapper-content">
                                            <h5 class="heading">Master Card</h5>
                                            <p class="paragraph">Bank **********5535</p>
                                            <p class="verified">Verified</p>
                                        </div>
                                    </div>
                                    <a href="#" class="shop-btn">Manage</a>
                                </div>
                                <hr>
                                <div class="wrapper">
                                    <div class="wrapper-item">
                                        <div class="wrapper-img">
                                            <img src="./assets/images/homepage-one/payment-img-3.png" alt="payment">
                                        </div>
                                        <div class="wrapper-content">
                                            <h5 class="heading">Paypal Account</h5>
                                            <p class="paragraph">Bank **********5535</p>
                                            <p class="verified">Verified</p>
                                        </div>
                                    </div>
                                    <a href="#" class="shop-btn">Manage</a>
                                </div>
                                <hr>
                                <div class="wrapper">
                                    <div class="wrapper-item">
                                        <div class="wrapper-img">
                                            <img src="./assets/images/homepage-one/payment-img-4.png" alt="payment">
                                        </div>
                                        <div class="wrapper-content">
                                            <h5 class="heading">Visa Card</h5>
                                            <p class="paragraph">Bank **********5535</p>
                                            <p class="verified">Verified</p>
                                        </div>
                                    </div>
                                    <a href="#" class="shop-btn">Manage</a>
                                </div>
                                <hr>
                                <div class="wrapper-btn">
                                    <a href="#" class="shop-btn" onclick="modalAction('.cart')">Add Cart</a>

                                    <!-- cart-modal -->
                                    <div class="modal-wrapper cart">
                                        <div onclick="modalAction('.cart')" class="anywhere-away"></div>

                                        <!-- change this -->
                                        <div class="login-section account-section modal-main">
                                            <div class="review-form">
                                                <div class="review-content">
                                                    <h5 class="comment-title">Add New Card</h5>
                                                    <div class="close-btn">
                                                        <img src="./assets/images/homepage-one/close-btn.png"
                                                            onclick="modalAction('.cart')" alt="close-btn">
                                                    </div>
                                                </div>
                                                <div class="review-form-name address-form">
                                                    <label for="cnumber" class="form-label">Card Number*</label>
                                                    <input type="number" id="cnumber" class="form-control"
                                                        placeholder="*** *** ***">
                                                </div>
                                                <div class="review-form-name address-form">
                                                    <label for="holdername" class="form-label">Card Holder Name*</label>
                                                    <input type="text" id="holdername" class="form-control"
                                                        placeholder="Demo Name">
                                                </div>
                                                <div class=" account-inner-form">
                                                    <div class="review-form-name">
                                                        <label for="expirydate" class="form-label">Expiry Date*</label>
                                                        <input type="date" id="expirydate" class="form-control">
                                                    </div>
                                                    <div class="review-form-name">
                                                        <label for="cvv" class="form-label">CVV*</label>
                                                        <input type="number" id="cvv" class="form-control"
                                                            placeholder="21232">
                                                    </div>
                                                </div>
                                                <div class="login-btn text-center">
                                                    <a href="#" onclick="modalAction('.cart')" class="shop-btn">Add
                                                        Card</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- change this -->

                                    </div>
                                    <a href="#" class="shop-btn bank-btn" onclick="modalAction('.bank')">Add Bank</a>

                                    <!-- bank-modal -->
                                    <div class="modal-wrapper bank">
                                        <div onclick="modalAction('.bank')" class="anywhere-away"></div>

                                        <!-- change this -->
                                        <div class="login-section account-section modal-main">
                                            <div class="review-form">
                                                <div class="review-content">
                                                    <h5 class="comment-title">Add Bank Account</h5>
                                                    <div class="close-btn">
                                                        <img src="./assets/images/homepage-one/close-btn.png"
                                                            onclick="modalAction('.bank')" alt="close-btn">
                                                    </div>
                                                </div>
                                                <div class="review-form-name address-form">
                                                    <label for="accountnumber" class="form-label">Account
                                                        Number*</label>
                                                    <input type="number" id="accountnumber" class="form-control"
                                                        placeholder="*** *** ***">
                                                </div>
                                                <div class="review-form-name address-form">
                                                    <label for="accountholdername" class="form-label">Card Holder
                                                        Name*</label>
                                                    <input type="text" id="accountholdername" class="form-control"
                                                        placeholder="Demo Name">
                                                </div>
                                                <div class=" account-inner-form">
                                                    <div class="review-form-name">
                                                        <label for="branchname" class="form-label">Branch*</label>
                                                        <input type="text" id="branchname" class="form-control"
                                                            placeholder="Demo Branch">
                                                    </div>
                                                    <div class="review-form-name">
                                                        <label for="ipscode" class="form-label">IPSC Code</label>
                                                        <input type="number" id="ipscode" class="form-control"
                                                            placeholder="21232">
                                                    </div>
                                                </div>
                                                <div class="login-btn text-center">
                                                    <a href="#" onclick="modalAction('.bank')" class="shop-btn">Add Bank
                                                        Account</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- change this -->

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




                        <div class="tab-pane fade" id="v-pills-wishlist" role="tabpanel"
                            aria-labelledby="v-pills-wishlist-tab" tabindex="0">

                            <div class="wishlist">
                                <div class="cart-content">
                                    <h5 class="cart-heading">SpaceRace</h5>
                                    <p>Order ID: <span class="inner-text">#4345</span></p>
                                </div>
                                <div class="cart-section wishlist-section">
                                    <table>
                                        <tbody>
                                            <tr class="table-row table-top-row">
                                                <td class="table-wrapper wrapper-product">
                                                    <h5 class="table-heading">PRODUCT</h5>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center">
                                                        <h5 class="table-heading">PRICE</h5>
                                                    </div>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center">
                                                        <h5 class="table-heading">ACTION</h5>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="table-row ticket-row">
                                                <td class="table-wrapper wrapper-product">
                                                    <div class="wrapper">
                                                        <div class="wrapper-img">
                                                            <img src="./assets/images/homepage-one/product-img/product-img-1.webp"
                                                                alt="img">
                                                        </div>
                                                        <div class="wrapper-content">
                                                            <h5 class="heading">Classic Design Skart</h5>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center">
                                                        <h5 class="heading">$20.00</h5>
                                                    </div>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center">
                                                        <span>
                                                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                </svg>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="table-row ticket-row">
                                                <td class="table-wrapper wrapper-product">
                                                    <div class="wrapper">
                                                        <div class="wrapper-img">
                                                            <img src="./assets/images/homepage-one/product-img/product-img-2.webp"
                                                                alt="img">
                                                        </div>
                                                        <div class="wrapper-content">
                                                            <h5 class="heading">Classic Black Suit</h5>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center">
                                                        <h5 class="heading">$20.00</h5>
                                                    </div>
                                                </td>
                                                <td class="table-wrapper ">
                                                    <div class="table-wrapper-center">
                                                        <span>
                                                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="table-row ticket-row">
                                                <td class="table-wrapper wrapper-product">
                                                    <div class="wrapper">
                                                        <div class="wrapper-img">
                                                            <img src="./assets/images/homepage-one/product-img/product-img-3.webp"
                                                                alt="img">
                                                        </div>
                                                        <div class="wrapper-content">
                                                            <h5 class="heading">Blue Party Dress</h5>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center">
                                                        <h5 class="heading">$20.00</h5>
                                                    </div>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center">
                                                        <span>
                                                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="table-row ticket-row">
                                                <td class="table-wrapper wrapper-product">
                                                    <div class="wrapper">
                                                        <div class="wrapper-img">
                                                            <img src="./assets/images/homepage-one/product-img/product-img-4.webp"
                                                                alt="img">
                                                        </div>
                                                        <div class="wrapper-content">
                                                            <h5 class="heading">Classic Party Dress</h5>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center">
                                                        <h5 class="heading">$20.00</h5>
                                                    </div>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center">
                                                        <span>
                                                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="wishlist-btn">
                                    <a href="#" class="clean-btn">Clean Wishlist</a>
                                    <a href="#" class="shop-btn">View Cards</a>
                                </div>
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
                                                        <svg width="75" height="15" viewBox="0 0 75 15" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            
                                                        </svg>
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
                                                        <svg width="75" height="15" viewBox="0 0 75 15" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                           
                                                        </svg>
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
                                                        <svg width="75" height="15" viewBox="0 0 75 15" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                      
                                                        </svg>
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
                                                        <svg width="75" height="15" viewBox="0 0 75 15" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                           
                                                        </svg>
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

                        <div class="tab-pane fade" id="v-pills-ticket" role="tabpanel"
                            aria-labelledby="v-pills-ticket-tab" tabindex="0">
                            <div class="support-ticket">
                                <a href="#" class="shop-btn" onclick="modalAction('.ticket')">Add New Support</a>

                                <!-- ticket-modal -->
                                <div class="modal-wrapper ticket">
                                    <div onclick="modalAction('.ticket')" class="anywhere-away"></div>

                                    <!-- change this -->
                                    <div class="login-section account-section modal-main">
                                        <div class="review-form">
                                            <div class="review-content">
                                                <h5 class="comment-title">Add New Ticket</h5>
                                                <div class="close-btn">
                                                    <img src="./assets/images/homepage-one/close-btn.png"
                                                        onclick="modalAction('.ticket')" alt="close-btn">
                                                </div>
                                            </div>
                                            <div class="review-form-name address-form">
                                                <label for="ticket" class="form-label">First Name*</label>
                                                <input type="text" id="ticket" class="form-control" placeholder="Name">
                                            </div>
                                            <div class=" account-inner-form">
                                                <div class="review-form-name">
                                                    <label for="ticketaddress" class="form-label">Email Address*</label>
                                                    <input type="email" id="ticketaddress" class="form-control"
                                                        placeholder="email@gmail.com">
                                                </div>
                                                <div class="review-form-name">
                                                    <label for="ticketphone" class="form-label">Phone Number*</label>
                                                    <input type="tel" id="ticketphone" class="form-control"
                                                        placeholder="******">
                                                </div>
                                            </div>
                                            <div class="review-form-name address-form">
                                                <label for="ticketmassage" class="form-label">Description*</label>
                                                <textarea name="ticketmassage" id="ticketmassage" cols="10" rows="3"
                                                    class="form-control"
                                                    placeholder="Write Here your Description"></textarea>
                                            </div>
                                            <div class="login-btn text-center">
                                                <a href="#" onclick="modalAction('.ticket')" class="shop-btn">Add Ticekt
                                                    Now</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- change this -->

                                </div>
                                <div class="ticket-section">
                                    <table>
                                        <tbody>
                                            <tr class="table-row table-top-row">
                                                <td class="table-wrapper">
                                                    <h5 class="table-heading">NO</h5>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center">
                                                        <h5 class="table-heading">TIME</h5>
                                                    </div>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center">
                                                        <h5 class="table-heading">REPORT</h5>
                                                    </div>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center">
                                                        <h5 class="table-heading">ACTION</h5>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="table-row ticket-row">
                                                <td class="table-wrapper">
                                                    <p class="ticker-number">#354</p>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center">
                                                        <p class="ticket-date">11th Oct, 2023</p>
                                                    </div>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center">
                                                        <p class="ticket-info">Printing and typesetting industry
                                                            standard <span class="inner-text">dummy text ever
                                                                since</span></p>
                                                    </div>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center table-wrapper-img">
                                                        <div class="comment-img">
                                                            <span>
                                                                <svg width="18" height="17" viewBox="0 0 18 17"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    </svg>
                                                            </span>
                                                        </div>
                                                        <div class="delete-img">
                                                            <span>
                                                                <svg width="16" height="19" viewBox="0 0 16 19"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    
                                                                </svg>

                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="table-row ticket-row">
                                                <td class="table-wrapper">
                                                    <p class="ticker-number">#355</p>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center">
                                                        <p class="ticket-date">11th Oct, 2023</p>
                                                    </div>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center">
                                                        <p class="ticket-info">Printing and typesetting industry
                                                            standard <span class="inner-text">dummy text ever
                                                                since</span></p>
                                                    </div>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center table-wrapper-img">
                                                        <div class="comment-img">
                                                            <span>
                                                                <svg width="18" height="17" viewBox="0 0 18 17"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        <div class="delete-img">
                                                            <span>
                                                                <svg width="16" height="19" viewBox="0 0 16 19"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                   
                                                                </svg>

                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="table-row ticket-row">
                                                <td class="table-wrapper">
                                                    <p class="ticker-number">#356</p>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center">
                                                        <p class="ticket-date">11th Oct, 2023</p>
                                                    </div>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center">
                                                        <p class="ticket-info">Printing and typesetting industry
                                                            standard <span class="inner-text">dummy text ever
                                                                since</span></p>
                                                    </div>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center table-wrapper-img">
                                                        <div class="comment-img">
                                                            <span>
                                                                <svg width="18" height="17" viewBox="0 0 18 17"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        <div class="delete-img">
                                                            <span>
                                                                <svg width="16" height="19" viewBox="0 0 16 19"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    
                                                                </svg>

                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="table-row ticket-row">
                                                <td class="table-wrapper">
                                                    <p class="ticker-number">#357</p>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center">
                                                        <p class="ticket-date">11th Oct, 2023</p>
                                                    </div>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center">
                                                        <p class="ticket-info">Printing and typesetting industry
                                                            standard <span class="inner-text">dummy text ever
                                                                since</span></p>
                                                    </div>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center table-wrapper-img">
                                                        <div class="comment-img">
                                                            <span>
                                                                <svg width="18" height="17" viewBox="0 0 18 17"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        <div class="delete-img">
                                                            <span>
                                                                <svg width="16" height="19" viewBox="0 0 16 19"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                   
                                                                </svg>

                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="table-row ticket-row">
                                                <td class="table-wrapper">
                                                    <p class="ticker-number">#358</p>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center">
                                                        <p class="ticket-date">11th Oct, 2023</p>
                                                    </div>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center">
                                                        <p class="ticket-info">Printing and typesetting industry
                                                            standard <span class="inner-text">dummy text ever
                                                                since</span></p>
                                                    </div>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center table-wrapper-img">
                                                        <div class="comment-img">
                                                            <span>
                                                                <svg width="18" height="17" viewBox="0 0 18 17"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                   
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        <div class="delete-img">
                                                            <span>
                                                                <svg width="16" height="19" viewBox="0 0 16 19"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    
                                                                </svg>

                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="table-row ticket-row">
                                                <td class="table-wrapper">
                                                    <p class="ticker-number">#359</p>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center">
                                                        <p class="ticket-date">11th Oct, 2023</p>
                                                    </div>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center">
                                                        <p class="ticket-info">Printing and typesetting industry
                                                            standard <span class="inner-text">dummy text ever
                                                                since</span></p>
                                                    </div>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center table-wrapper-img">
                                                        <div class="comment-img">
                                                            <span>
                                                                <svg width="18" height="17" viewBox="0 0 18 17"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                   
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        <div class="delete-img">
                                                            <span>
                                                                <svg width="16" height="19" viewBox="0 0 16 19"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                   
                                                                </svg>

                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="table-row ticket-row">
                                                <td class="table-wrapper">
                                                    <p class="ticker-number">#360</p>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center">
                                                        <p class="ticket-date">11th Oct, 2023</p>
                                                    </div>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center">
                                                        <p class="ticket-info">Printing and typesetting industry
                                                            standard <span class="inner-text">dummy text ever
                                                                since</span></p>
                                                    </div>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center table-wrapper-img">
                                                        <div class="comment-img">
                                                            <span>
                                                                <svg width="18" height="17" viewBox="0 0 18 17"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                   
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        <div class="delete-img">
                                                            <span>
                                                                <svg width="16" height="19" viewBox="0 0 16 19"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                   
                                                                </svg>

                                                            </span>
                                                        </div>
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