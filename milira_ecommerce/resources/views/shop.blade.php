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

    <!---------------------- Scroll ------------------->
    <link rel="stylesheet" href="{{ asset('assets/css/aos-3.0.0.css') }}">

    <!--------------- additional-css ---------------->
    <link rel="stylesheet" href="{{ asset('assets/css/shop.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">

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
        .cartcount {
            position: relative;
            left: 40px;
            top: -10px;
            background-color: red;
            color: white !important;
            border-radius: 50%;
            padding: 1px 6px;
            font-size: 10px;
        }
        .wishlist-count {
            position: relative;
            left: 40px;
            top: -10px;
            background-color: red;
            color: white !important;
            border-radius: 50%;
            padding: 1px 6px;
            font-size: 10px;
        }
        .loginclr {
            color: #808080 !important;
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
    @include('header')

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
                            <div class="sidebar-wrapper">
                                <h5 class="wrapper-heading">Collections</h5>
                                <div class="sidebar-item">
                                <ul class="sidebar-list">
            @foreach ($collections as $collection)
                <li>
                    <input type="checkbox" class="collection-checkbox" id="{{ $collection->collection }}" name="collection" value="{{ $collection->collection }}">
                    <label for="{{ $collection->collection }}">{{ $collection->collection }}</label>
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
                            <a href="seller-sidebar.html" class="shop-btn deal-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="mobile-sidebar">
    <button class="shop-side-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#shopSidebarMenu" aria-controls="shopSidebarMenu">
        <i class="bi bi-funnel-fill"></i>
    </button>

    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="shopSidebarMenu" aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
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
                    <div class="sidebar-wrapper">
                        <h5 class="wrapper-heading">Collections</h5>
                        <div class="sidebar-item">
                            <ul class="sidebar-list">
                                @foreach ($collections as $collection)
                                    <li>
                                        <input type="checkbox" class="collection-checkbox" id="{{ $collection->collection }}" name="collection" value="{{ $collection->collection }}">
                                        <label for="{{ $collection->collection }}">{{ $collection->collection }}</label>
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
                                <input type="range" class="form-range" id="priceRange" min="0" max="1000" step="10">
                                <span class="example-val" id="slider-margin-value-min">0</span>
                                <span>-</span>
                                <span class="example-val" id="slider-margin-value-max">1000</span>
                            </div>
                        </div>
                    </div>
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
                    <a href="seller-sidebar.html" class="shop-btn deal-btn">Shop Now</a>
                </div>
            </div>
        </div>
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
                                                            <button class="buy-now-btn" data-url="{{ url('shop/' . Str::slug($product->title, '-')) }}">View Product <i class="bi bi-bag-heart-fill"></i></button>
                                                        </div>
                                                        <div class="col-3">
                                                            <button class="add-to-cart-btn" data-id="{{ $product->id }}">
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
                    <div class="col-lg-12 mt-5">
                        <div class="product-deal-section" data-aos="fade-up">
                            <h5 class="wrapper-heading">Get the best deal for Headphones</h5>
                            <a href="seller-sidebar.html" class="shop-btn">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/js/aos-3.0.0.js') }}"></script>
    <script src="{{ asset('assets/js/swiper10-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/shopus.js') }}"></script>
<script>
    $(document).ready(function () {
    function updateCart(cartCount, cart, subtotal) {
        $('#cart-item-count').text(cartCount);
        $('#cart-subtotal').text('₹' + subtotal);
        var cartHtml = '';
        for (const [productId, item] of Object.entries(cart)) {
            cartHtml += `
                <div class="wrapper" data-id="${productId}">
                    <div class="wrapper-item">
                        <div class="wrapper-img">
                            <img src="/storage/uploads/${item.name}_0.jpg" alt="img">
                        </div>
                        <div class="wrapper-content">
                            <h5 class="wrapper-title">${item.name}</h5>
                            <div class="price">
                                <p class="new-price">₹${item.price}</p>
                            </div>
                            <div class="quantity">
                                Qty: ${item.quantity}
                            </div>
                        </div>
                        
                        <span class="close-btn" data-id="${productId}">
                            <svg viewBox="0 0 10 10" fill="none" class="fill-current" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.7 0.3C9.3 -0.1 8.7 -0.1 8.3 0.3L5 3.6L1.7 0.3C1.3 -0.1 0.7 -0.1 0.3 0.3C-0.1 0.7 -0.1 1.3 0.3 1.7L3.6 5L0.3 8.3C-0.1 8.7 -0.1 9.3 0.3 9.7C0.7 10.1 1.3 10.1 1.7 9.7L5 6.4L8.3 9.7C8.7 10.1 9.3 10.1 9.7 9.7C10.1 9.3 10.1 8.7 9.7 8.3L6.4 5L9.7 1.7C10.1 1.3 10.1 0.7 9.7 0.3Z"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            `;
        }
        $('#cart-wrapper-item').html(cartHtml);
        rebindCloseButtons();
    }

    $('.add-to-cart-btn').off('click').on('click', function () {
        var productId = $(this).data('id');
        var quantity = parseInt($('#productQuantity').val(), 10) || 1;

        $.ajax({
            url: '{{ route("cart.add") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                product_id: productId,
                quantity: quantity
            },
            success: function (response) {
                updateCart(response.cartCount, response.cart, response.subtotal);
            },
            error: function (response) {
                if (response.status === 401) {
                    window.location.href = '{{ route("login") }}';
                } 
            }
        });
    });

    $('.buy-now-btn').on('click', function () {
        var url = $(this).data('url');
        window.location.href = url;
    });

    function rebindCloseButtons() {
        $('.close-btn').off('click').on('click', function () {
            var productId = $(this).data('id');

            $.ajax({
                url: '{{ route("cart.remove") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId
                },
                success: function (response) {
                    updateCart(response.cartCount, response.cart, response.subtotal);
                },
                error: function (response) {
                    if (response.status === 401) {
                        window.location.href = '{{ route("login") }}';
                    }
                }
            });
        });
    }

    function filterProducts() {
        let selectedCategories = [];
        $('.category-checkbox:checked').each(function () {
            selectedCategories.push($(this).val());
        });

        let selectedCollections = [];
        $('.collection-checkbox:checked').each(function () {
            selectedCollections.push($(this).val());
        });

        $.ajax({
            url: '{{ route('shop.filterByCategory') }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                categories: selectedCategories,
                collections: selectedCollections // Send collections to the backend
            },
            success: function (response) {
                $('#product-list').empty();
                response.products.forEach(product => {
                    $('#product-list').append(`
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mt-4 product-card" data-category="${product.category}">
                            <div class="card product">
                                <div class="card-body">
                                    <img src="/storage/uploads/${product.title}_0.jpg" alt="" class="pdt-img">
                                    <div class="card-hover">
                                        <div class="hover-icons text-center">
                                            <a href="#"><i class="bi bi-arrows-fullscreen"></i></a>
                                            <button class="wishlist-button ${product.in_wishlist ? 'wishlisted' : ''}" data-product-id="${product.id}">
                                                <i class="bi bi-heart${product.in_wishlist ? '-fill' : ''}"></i>
                                            </button>
                                            <a href="#"><i class="bi bi-arrow-repeat"></i></a>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="pdt-title">
                                            <h6>${product.title}</h6>
                                        </div>
                                        <div class="pdt-price">
                                            <h6>${product.price}</h6>
                                        </div>
                                        <div class="pdt-rating mt-4">
                                            <p>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-half"></i>
                                                <span>(${product.reviews} reviews)</span>
                                            </p>
                                        </div>
                                        <div class="pdt-shop text-center mt-5">
                                            <div class="row">
                                                <div class="col-9">
                                                    <button class="buy-now-btn" data-url="/shop/${product.title.replace(/\s+/g, '-')}">Buy Now <i class="bi bi-bag-heart-fill"></i></button>
                                                </div>
                                                <div class="col-3">
                                                    <button class="add-to-cart-btn" data-id="${product.id}"><i class="bi bi-cart-check-fill"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);
                });

                rebindEventHandlers();
            }
        });
    }

    function rebindEventHandlers() {
        $('.add-to-cart-btn').off('click').on('click', function () {
            var productId = $(this).data('id');
            var quantity = parseInt($('#productQuantity').val(), 10) || 1;

            $.ajax({
                url: '{{ route("cart.add") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    quantity: quantity
                },
                success: function (response) {
                    updateCart(response.cartCount, response.cart, response.subtotal);
                },
                error: function (response) {
                    if (response.status === 401) {
                        window.location.href = '{{ route("login") }}';
                    } 
                }
            });
        });

        $('.wishlist-button').off('click').on('click', function () {
            const productId = $(this).data('product-id');
            const isWishlisted = $(this).hasClass('wishlisted');

            fetch(`/wishlist/toggle/${productId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ productId })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        if (isWishlisted) {
                            $(this).removeClass('wishlisted');
                            $(this).find('i').removeClass('bi-heart-fill').addClass('bi-heart');
                        } else {
                            $(this).addClass('wishlisted');
                            $(this).find('i').removeClass('bi-heart').addClass('bi-heart-fill');
                        }
                        $('#wishlist-item-count').text(data.wishlistCount);
                        $('#wishlist-circle').css('fill', data.wishlistCount > 0 ? 'red' : '#000');
                    }
                });
        });

        $('.close-btn').off('click').on('click', function () {
            var productId = $(this).data('id');

            $.ajax({
                url: '{{ route("cart.remove") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId
                },
                success: function (response) {
                    updateCart(response.cartCount, response.cart, response.subtotal);
                },
                error: function (response) {
                    if (response.status === 401) {
                        window.location.href = '{{ route("login") }}';
                    }
                }
            });
        });
    }

    $('.category-checkbox').change(filterProducts);
    $('.collection-checkbox').change(filterProducts);
    
    rebindCloseButtons();
    rebindEventHandlers();
});

        </script>
</body>

</html>
