<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="keywords"
        content="ShopUS, bootstrap-5, bootstrap, sass, css, HTML Template, HTML,html, bootstrap template, free template, figma, web design, web development,front end, bootstrap datepicker, bootstrap timepicker, javascript, ecommerce template">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('assets/images/logos/favicon.png') }}">
    


<!--title  -->
<title>Milira-Shop</title>

<!--------------- swiper-css ---------------->
<link rel="stylesheet" href="{{ asset('assets/css/swiper10-bundle.min.css') }}">

<!--------------- bootstrap-css ---------------->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!---------------------- Range Slider ------------------->
<link rel="stylesheet" href="{{ asset('assets/css/nouislider.min.css') }}">

<!---------------------- Scroll ------------------->
<link rel="stylesheet" href="{{ asset('assets/css/aos-3.0.0.css') }}">

<!--------------- additional-css ---------------->
<link rel="stylesheet" href="{{ asset('assets/css/shop.css') }}">


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    .cart-icon {
        position: relative;
    }

    .wishlist-button i.wishlist-added {
    color: red;
}
.wishlist-button {
    font-size: 20px;
    color: #fff;
}

.wishlist-button i {
    color: #fff;
}

.wishlist-button.wishlisted i {
    color: red;
}
.cartcount{
    position: relative;
    left: 40px;
    top: -10px;
    background-color: red;
    color: white !important;
    border-radius: 50%;
    padding:1px 6px;
    font-size: 10px;  
}
.wishlist-count {
    position: relative;
    left: 40px;
    top: -10px;
    background-color: red;
    color: white !important;
    border-radius: 50%;
    padding:1px 6px;
    font-size: 10px;
}
    
.loginclr{
         color:#808080 !important;
        }
.header-user .dropdown {
    display: flex;
    align-items: center;
}

.header-user .dropdown span {
    display: flex;
    align-items: center;
    cursor: pointer;
}

.header-user .dropdown p {
    margin: 0;
    padding-left: 5px;
}

.header-user .dropdown-menu {
    left: auto;
    right: 0;
}

        </style>
</head>

<body>


    <!--------------- header-section --------------->
   @include('header')
    <!--------------- header-section-end --------------->

    <!--------------- products-sidebar-section--------------->
    <section class="product product-sidebar footer-padding">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-3">
                    <div class="sidebar" data-aos="fade-right">
                        <div class="sidebar-section">
                        <div class="sidebar-wrapper">
    <h5 class="wrapper-heading">Product Categories</h5>
    <div class="sidebar-item">
        <ul class="sidebar-list">
            @foreach ($categories as $category)
                <li>
                    <input type="checkbox" class="category-checkbox" id="{{ $category->category }}" name="category" value="{{ $category->category }}">
                    <label for="{{ $category->category }}">{{ $category->category }}</label>
                </li>
            @endforeach
        </ul>
    </div>
</div>
                            <hr>
                            <div class="sidebar-wrapper sidebar-range">
                                <h5 class="wrapper-heading">Price Range</h5>
                                <div class="price-slide range-slider">
                                    <div class="price">
                                        <div class="range-slider style-1">
                                            <div id="slider-tooltips" class="slider-range mb-3"></div>
                                            <span class="example-val" id="slider-margin-value-min"></span>
                                            <span>-</span>
                                            <span class="example-val" id="slider-margin-value-max"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <hr>
                            <div class="sidebar-wrapper">
    <h5 class="wrapper-heading">Color</h5>
    <div class="sidebar-item">
        <ul class="sidebar-list">
            @foreach($colors as $color)
                <li>
                    <input type="checkbox" id="{{ $color }}" name="color" value="{{ $color }}">
                    <label for="{{ $color }}">{{ ucfirst($color) }}</label>
                </li>
            @endforeach
        </ul>
    </div>
</div>
                            <hr>
                        </div>
                        <div class="sidebar-shop-section">
                            <span class="wrapper-subtitle">TRENDY</span>
                            <h5 class="wrapper-heading">Best wireless Shoes</h5>
                            <a href="seller-sidebar.html" class="shop-btn deal-btn">Shop Now </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                <div class="product-sidebar-section" data-aos="fade-up">
    <div class="row g-5" id="product-list">
        @foreach ($products as $product)
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mt-4 product-card" data-category="{{ $product->category }}">
                <div class="card product">
                    <div class="card-body">
                        <img src="{{ asset('storage/uploads/' . $product->title . '_0.jpg') }}" alt="" class="pdt-img">
                        <div class="card-hover">
                            <div class="hover-icons text-center">
                                <a href="#"><i class="bi bi-arrows-fullscreen"></i></a>
                                <button class="wishlist-button {{ in_array($product->id, $wishlistProductIds) ? 'wishlisted' : '' }}" data-product-id="{{ $product->id }}">
                                    <i class="bi bi-heart{{ in_array($product->id, $wishlistProductIds) ? '-fill' : '' }}"></i>
                                </button>
                                <a href="#"><i class="bi bi-arrow-repeat"></i></a>
                            </div>
                        </div>
                        <div class="container">
                            <div class="pdt-title">
                                <h6>{{ $product->title }}</h6>
                            </div>
                            <div class="pdt-price">
                                <h6>{{ $product->price }}</h6>
                            </div>
                            <div class="pdt-rating mt-4">
                                <p>
                                    @php
                                        $averageRating = $product->averageRating();
                                        $totalReviews = $product->totalReviews();
                                    @endphp
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($i < floor($averageRating))
                                            <i class="bi bi-star-fill"></i>
                                        @elseif ($i < ceil($averageRating))
                                            <i class="bi bi-star-half"></i>
                                        @else
                                            <i class="bi bi-star"></i>
                                        @endif
                                    @endfor
                                    <span>({{ $totalReviews }} reviews)</span>
                                </p>
                            </div>
                            <div class="pdt-shop text-center mt-5">
                                <div class="row">
                                    <div class="col-9">
                                        <a href="{{ url('shop/' . Str::slug($product->title, '-')) }}">
                                            <button class="cart-btn">Buy Now <i class="bi bi-bag-heart-fill"></i></button>
                                        </a>
                                    </div>
                                    <div class="col-3">
                                        <button class="cart-btn" data-id="{{ $product->id }}">
                                            <i class="bi bi-cart-check-fill"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

</div>

                            
                            <div class="col-lg-12 mt-5">
                                <div class="product-deal-section" data-aos="fade-up">
                                    <h5 class="wrapper-heading">Get the best deal for Headphones</h5>
                                    <a href="seller-sidebar.html" class="shop-btn">Shop Now</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--------------- products-sidebar-section-end--------------->

    <!--------------- footer-section--------------->
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
    <!--------------- footer-section-end--------------->



    <!--------------- jQuery ---------------->
    
    <script src="{{ asset('assets/js/jquery_3.7.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/js/aos-3.0.0.js') }}"></script>
    <script src="{{ asset('assets/js/swiper10-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/shopus.js') }}"></script>
    

    







</body>

</html>