<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords"
        content="ShopUS, bootstrap-5, bootstrap, sass, css, HTML Template, HTML,html, bootstrap template, free template, figma, web design, web development,front end, bootstrap datepicker, bootstrap timepicker, javascript, ecommerce template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ URL::asset('build/images/favicon-32x32.png') }}" type="image/png">
    <title>Milira-Product</title>
    <link rel="stylesheet" href="{{ asset('assets/css/swiper10-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-5.3.2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aos-3.0.0.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shop-inner.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
    
</head>

<body>
<!--------------- header-section --------------->
@include('header')
    <!--------------- header-section-end --------------->
    <section class="product product-info">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="{{ url('/') }}">Home</a></span>
                <span class="devider">/</span>
                <span><a href="{{ url('/product-sidebar') }}">Shop</a></span>
                <span class="devider">/</span>
                <span><a href="#">Product Details</a></span>
            </div>
            <div class="product-info-section">
                <div class="row ">
                    <div class="col-md-6">
                        <div class="product-info-img" data-aos="fade-right">
                            <div class="swiper product-top">
                                <div class="product-discount-content">
                                    <h4>-50%</h4>
                                </div>
                                <div class="swiper-wrapper">
                                    @foreach($product->images as $image)
                                    <div class="swiper-slide slider-top-img">
                                        <img src="{{ asset('storage/' . $image) }}" alt="img">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="swiper product-bottom">
                                <div class="swiper-wrapper">
                                    @foreach($product->images as $image)
                                    <div class="swiper-slide slider-bottom-img">
                                        <img src="{{ asset('storage/' . $image) }}" alt="img" loading="lazy">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-info-content" data-aos="fade-left">
                            <h5>{{ $product->title }}</h5>
                            <div class="ratings">
                                <span>
                                    <svg width="75" height="15" viewBox="0 0 75 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.5 0L9.18386 5.18237H14.6329L10.2245 8.38525L11.9084 13.5676L7.5 10.3647L3.09161 13.5676L4.77547 8.38525L0.367076 5.18237H5.81614L7.5 0Z"
                                            fill="#FFA800" />
                                        <path
                                            d="M22.5 0L24.1839 5.18237H29.6329L25.2245 8.38525L26.9084 13.5676L22.5 10.3647L18.0916 13.5676L19.7755 8.38525L15.3671 5.18237H20.8161L22.5 0Z"
                                            fill="#FFA800" />
                                        <path
                                            d="M37.5 0L39.1839 5.18237H44.6329L40.2245 8.38525L41.9084 13.5676L37.5 10.3647L33.0916 13.5676L34.7755 8.38525L30.3671 5.18237H35.8161L37.5 0Z"
                                            fill="#FFA800" />
                                        <path
                                            d="M52.5 0L54.1839 5.18237H59.6329L55.2245 8.38525L56.9084 13.5676L52.5 10.3647L48.0916 13.5676L49.7755 8.38525L45.3671 5.18237H50.8161L52.5 0Z"
                                            fill="#FFA800" />
                                        <path
                                            d="M67.5 0L69.1839 5.18237H74.6329L70.2245 8.38525L71.9084 13.5676L67.5 10.3647L63.0916 13.5676L64.7755 8.38525L60.3671 5.18237H65.8161L67.5 0Z"
                                            fill="#FFA800" />
                                    </svg>
                                </span>
                                <span class="text">6 Reviews</span>
                            </div>
                            <div class="price">
    <span class="price-cut">₹{{ $product->price + 200 }}</span>
    <span class="new-price" id="productPrice">₹{{ $product->price }}</span>
</div>
                            <p class="content-paragraph">{{ $product->small_description }}</p>
                            <hr>
                            <div class="product-availability">
                                <span>Availability : </span>
                                <span class="inner-text">{{ $product->stocks }}</span>
                            </div>
                            <div class="product-quantity">
    <div class="quantity-wrapper">
        <div class="quantity">
            <span class="minus">-</span>
            <span class="number">1</span>
            <span class="plus">+</span>
        </div>
        <div class="wishlist">
            <span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17 1C14.9 1 13.1 2.1 12 3.7C10.9 2.1 9.1 1 7 1C3.7 1 1 3.7 1 7C1 13 12 22 12 22C12 22 23 13 23 7C23 3.7 20.3 1 17 1Z" stroke="#797979" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" />
                </svg>
            </span>
        </div>
    </div>
</div>
<div style="display: flex; gap: 10px;">
    @auth
        <form id="buyNowForm" action="{{ route('cart.buyNow') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="quantity" id="productQuantity" value="1">
            <button type="submit" class="product-buy-btn">Buy Now <i class="bi bi-bag-fill px-3 fs-3"></i></button>
        </form>
    @else
        <a href="{{ route('login') }}">
            <button class="product-buy-btn">Buy Now <i class="bi bi-bag-fill px-3 fs-3"></i></button>
        </a>
    @endauth

    <button class="product-buy-btn add-to-cart-btn" data-id="{{ $product->id }}">Add to Cart <i class="bi bi-cart-plus-fill px-3 fs-3"></i></button>
</div>


                            <hr>
                            <div class="product-details">
                                <p class="category">Category : <span class="inner-text">{{ $product->category }}</span>
                                </p>
                                <p class="tags">Tags : <span class="inner-text">{{ $product->tags }}</span></p>
                                <p class="sku">SKU : <span class="inner-text">{{ $product->sku }}</span></p>
                            </div>
                            <hr>
                            <div class="product-report">
                                
                                <div class="modal-wrapper action">
                                    <div onclick="modalAction('.action')" class="anywhere-away"></div>
                                    <div class="login-section account-section modal-main">
                                        <div class="review-form">
                                            <div class="review-content">
                                                <h5 class="comment-title">Report Products</h5>
                                                <div class="close-btn">
                                                    <img src="../assets/images/homepage-one/close-btn.png"
                                                        onclick="modalAction('.action')" alt="close-btn">
                                                </div>
                                            </div>
                                            <div class="review-form-name address-form">
                                                <label for="reporttitle" class="form-label">Enter Report Title*</label>
                                                <input type="text" id="reporttitle" class="form-control"
                                                    placeholder="Reports Headline here">
                                            </div>
                                            <div class="review-form-name address-form">
                                                <label for="reportnote" class="form-label">Enter Report Note*</label>
                                                <textarea name="ticketmassage" id="reportnote" cols="40" rows="3"
                                                    class="form-control" placeholder="Type Here"></textarea>
                                            </div>
                                            <div class="login-btn text-center">
                                                <a href="#" onclick="modalAction('.action')" class="shop-btn">Submit
                                                    Report</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-share">
                                <p>Share This:</p>
                                <div class="social-icons">
                                    <a href="#">
                                        <span class="facebook">
                                            <svg width="10" height="16" viewBox="0 0 10 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M3 16V9H0V6H3V4C3 1.3 4.7 0 7.1 0C8.3 0 9.2 0.1 9.5 0.1V2.9H7.8C6.5 2.9 6.2 3.5 6.2 4.4V6H10L9 9H6.3V16H3Z"
                                                    fill="#3E75B2" />
                                            </svg>
                                        </span>
                                    </a>
                                    <a href="#">
                                        <span class="pinterest">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8 0C3.6 0 0 3.6 0 8C0 11.4 2.1 14.3 5.1 15.4C5 14.8 5 13.8 5.1 13.1C5.2 12.5 6 9.1 6 9.1C6 9.1 5.8 8.7 5.8 8C5.8 6.9 6.5 6 7.3 6C8 6 8.3 6.5 8.3 7.1C8.3 7.8 7.9 8.8 7.6 9.8C7.4 10.6 8 11.2 8.8 11.2C10.2 11.2 11.3 9.7 11.3 7.5C11.3 5.6 9.9 4.2 8 4.2C5.7 4.2 4.4 5.9 4.4 7.7C4.4 8.4 4.7 9.1 5 9.5C5 9.7 5 9.8 5 9.9C4.9 10.2 4.8 10.7 4.8 10.8C4.8 10.9 4.7 11 4.5 10.9C3.5 10.4 2.9 9 2.9 7.8C2.9 5.3 4.7 3 8.2 3C11 3 13.1 5 13.1 7.6C13.1 10.4 11.4 12.6 8.9 12.6C8.1 12.6 7.3 12.2 7.1 11.7C7.1 11.7 6.7 13.2 6.6 13.6C6.4 14.3 5.9 15.2 5.6 15.7C6.4 15.9 7.2 16 8 16C12.4 16 16 12.4 16 8C16 3.6 12.4 0 8 0Z"
                                                    fill="#E12828" />
                                            </svg>
                                        </span>
                                    </a>
                                    <a href="#">
                                        <span class="twitter">
                                            <svg width="18" height="14" viewBox="0 0 18 14" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.0722 1.60052C16.432 1.88505 15.7562 2.06289 15.0448 2.16959C15.7562 1.74278 16.3253 1.06701 16.5742 0.248969C15.8985 0.640206 15.1515 0.924742 14.3335 1.10258C13.6933 0.426804 12.7686 0 11.7727 0C9.85206 0 8.28711 1.56495 8.28711 3.48557C8.28711 3.7701 8.32268 4.01907 8.39382 4.26804C5.51289 4.12577 2.9165 2.73866 1.17371 0.604639C0.889175 1.13814 0.71134 1.70722 0.71134 2.34742C0.71134 3.5567 1.31598 4.62371 2.27629 5.26392C1.70722 5.22835 1.17371 5.08608 0.675773 4.83711V4.87268C0.675773 6.5799 1.88505 8.00258 3.48557 8.32268C3.20103 8.39382 2.88093 8.42938 2.56082 8.42938C2.34742 8.42938 2.09845 8.39382 1.88505 8.35825C2.34742 9.74536 3.62784 10.7768 5.15722 10.7768C3.94794 11.7015 2.45412 12.2706 0.818041 12.2706C0.533505 12.2706 0.248969 12.2706 0 12.2351C1.56495 13.2309 3.37887 13.8 5.37062 13.8C11.8082 13.8 15.3294 8.46495 15.3294 3.84124C15.3294 3.69897 15.3294 3.52113 15.3294 3.37887C16.0052 2.9165 16.6098 2.31186 17.0722 1.60052Z"
                                                    fill="#3FD1FF" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
    <div class="review-title">
        <h1>Reviews</h1>
    </div>
    <div class="post-review">
        <form action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class="give-rate">
                <h6>Rate the Product</h6>
                <i class="bi bi-star" data-rating="1"></i>
                <i class="bi bi-star" data-rating="2"></i>
                <i class="bi bi-star" data-rating="3"></i>
                <i class="bi bi-star" data-rating="4"></i>
                <i class="bi bi-star" data-rating="5"></i>
                <input type="hidden" name="rating" id="rating">
            </div>
            <div class="product-desc">
                <h6>Review Our Product</h6>
                <textarea name="description" id="pdtDescription" placeholder="Description"></textarea>
            </div>
            <div class="pdt-image">
                <div class="mb-3">
                    <h6>Upload your Product images</h6>
                    <input type="file" class="pdt-file mt-4" name="image" id="inputFile">
                </div>
            </div>
            <div class="submit-review text-end mt-4">
                <span>
                    <button type="submit" class="review-1"> Submit Feedback </button>
                </span>
                <span class="px-3">
                    <a href="" class="review-2"> Cancel </a>
                </span>
            </div>
        </form>
    </div>
    
    <div class="review-sections mt-5">
        @foreach($product->reviews as $review)
        <div class="row mt-4 py-4 border-bottom">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                <div class="user-profile d-flex mt-4">
                    <div class="user-name mx-4">
                        <h4>{{ $review->user->name }}</h4>
                        <div class="user-designation">
                            <p>Customer</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                <div class="pdt-rating">
                    @for ($i = 0; $i < $review->rating; $i++)
                        <i class="bi bi-star-fill"></i>
                    @endfor
                    @for ($i = $review->rating; $i < 5; $i++)
                        <i class="bi bi-star"></i>
                    @endfor
                </div>
                <div class="review-description mt-3">
                    <p>{{ $review->description }}</p>
                </div>
                @if ($review->image)
                <img src="{{ asset('storage/' . $review->image) }}" alt="Review Image" style="width: 100px; height: 100px;">
                @endif
            </div>
        </div>
        @endforeach

        <div class="text-center">
            <button class="shop-btn text-center">See More Reviews</button>
        </div>
    </div>
</div>


    <!--------------- products-Review-end--------------->

    <!--------------- weekly-section--------------->
    <section class="product weekly-sale product-weekly footer-padding">
        <div class="container">
            <div class="section-title">
                <h5>Best Sell in this Week</h5>
                <a href="#" class="view">View All</a>
            </div>
            <div class="weekly-sale-section">
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mt-4">
                        <div class="card product">
                            <div class="card-body">
                                <img src="../assets/images/product/product_1.png" alt="" class="pdt-img">
                                <div class="card-hover">
                                    <div class="hover-icons text-center">
                                        <a href="#"><i class="bi bi-arrows-fullscreen"></i></a>
                                        <a href="#"><i class="bi bi-heart"></i></a>
                                        <a href="#"><i class="bi bi-arrow-repeat"></i></a>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="pdt-title">
                                        <h6>Embellished Diamond and White Gold Necklace Set</h6>
                                    </div>
                                    <div class="pdt-price">
                                        <h6>₹20,000</h6>
                                    </div>
                                    <div class="pdt-rating mt-4">
                                        <p>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-half"></i>
                                            <span>(4.5 reviews)</span>
                                        </p>
                                    </div>
                                    <div class="pdt-shop text-center mt-5">
                                        <div class="row">
                                            <div class="col-9">
                                                <button class="cart-btn">Buy Now <i
                                                        class="bi bi-bag-heart-fill"></i></button>
                                            </div>
                                            <div class="col-3">
                                                <button class="cart-btn"><i class="bi bi-cart-check-fill"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mt-4">
                        <div class="card product">
                            <div class="card-body">
                                <img src="../assets/images/product/product_1.png" alt="" class="pdt-img">
                                <div class="card-hover">
                                    <div class="hover-icons text-center">
                                        <a href="#"><i class="bi bi-arrows-fullscreen"></i></a>
                                        <a href="#"><i class="bi bi-heart"></i></a>
                                        <a href="#"><i class="bi bi-arrow-repeat"></i></a>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="pdt-title">
                                        <h6>Embellished Diamond and White Gold Necklace Set</h6>
                                    </div>
                                    <div class="pdt-price">
                                        <h6>₹20,000</h6>
                                    </div>
                                    <div class="pdt-rating mt-4">
                                        <p>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-half"></i>
                                            <span>(4.5 reviews)</span>
                                        </p>
                                    </div>
                                    <div class="pdt-shop text-center mt-5">
                                        <div class="row">
                                            <div class="col-9">
                                                <button class="cart-btn">Buy Now <i
                                                        class="bi bi-bag-heart-fill"></i></button>
                                            </div>
                                            <div class="col-3">
                                                <button class="cart-btn"><i class="bi bi-cart-check-fill"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mt-4">
                        <div class="card product">
                            <div class="card-body">
                                <img src="../assets/images/product/product_1.png" alt="" class="pdt-img">
                                <div class="card-hover">
                                    <div class="hover-icons text-center">
                                        <a href="#"><i class="bi bi-arrows-fullscreen"></i></a>
                                        <a href="#"><i class="bi bi-heart"></i></a>
                                        <a href="#"><i class="bi bi-arrow-repeat"></i></a>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="pdt-title">
                                        <h6>Embellished Diamond and White Gold Necklace Set</h6>
                                    </div>
                                    <div class="pdt-price">
                                        <h6>₹20,000</h6>
                                    </div>
                                    <div class="pdt-rating mt-4">
                                        <p>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-half"></i>
                                            <span>(4.5 reviews)</span>
                                        </p>
                                    </div>
                                    <div class="pdt-shop text-center mt-5">
                                        <div class="row">
                                            <div class="col-9">
                                                <button class="cart-btn">Buy Now <i
                                                        class="bi bi-bag-heart-fill"></i></button>
                                            </div>
                                            <div class="col-3">
                                                <button class="cart-btn"><i class="bi bi-cart-check-fill"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mt-4">
                        <div class="card product">
                            <div class="card-body">
                                <img src="../assets/images/product/product_1.png" alt="" class="pdt-img">
                                <div class="card-hover">
                                    <div class="hover-icons text-center">
                                        <a href="#"><i class="bi bi-arrows-fullscreen"></i></a>
                                        <a href="#"><i class="bi bi-heart"></i></a>
                                        <a href="#"><i class="bi bi-arrow-repeat"></i></a>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="pdt-title">
                                        <h6>Embellished Diamond and White Gold Necklace Set</h6>
                                    </div>
                                    <div class="pdt-price">
                                        <h6>₹20,000</h6>
                                    </div>
                                    <div class="pdt-rating mt-4">
                                        <p>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-half"></i>
                                            <span>(4.5 reviews)</span>
                                        </p>
                                    </div>
                                    <div class="pdt-shop text-center mt-5">
                                        <div class="row">
                                            <div class="col-9">
                                                <button class="cart-btn">Buy Now <i
                                                        class="bi bi-bag-heart-fill"></i></button>
                                            </div>
                                            <div class="col-3">
                                                <button class="cart-btn"><i class="bi bi-cart-check-fill"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--------------- weekly-section-end--------------->

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
    <script src="{{ asset('assets/js/jquery_3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap_5.3.2.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/js/aos-3.0.0.js') }}"></script>
    <script src="{{ asset('assets/js/swiper10-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/shopus.js') }}"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        let quantity = 1;
        const quantityElement = document.querySelector('.quantity .number');
        const minusButton = document.querySelector('.quantity .minus');
        const plusButton = document.querySelector('.quantity .plus');
        const productQuantityInput = document.getElementById('productQuantity');
        const productPriceElement = document.querySelector('.price');
        const productPrice = {{ $product->price }};
        
        minusButton.addEventListener('click', function () {
            if (quantity > 1) {
                quantity--;
                updateQuantity();
            }
        });

        plusButton.addEventListener('click', function () {
            quantity++;
            updateQuantity();
        });

        function updateQuantity() {
            quantityElement.textContent = quantity;
            productQuantityInput.value = quantity;
            productPriceElement.textContent = '$' + (quantity * productPrice).toFixed(2);
        }
    });
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.give-rate .bi-star');
    const ratingInput = document.getElementById('rating');

    stars.forEach(star => {
        star.addEventListener('click', function () {
            const rating = this.getAttribute('data-rating');
            ratingInput.value = rating;

            stars.forEach(star => {
                if (star.getAttribute('data-rating') <= rating) {
                    star.classList.remove('bi-star');
                    star.classList.add('bi-star-fill');
                } else {
                    star.classList.remove('bi-star-fill');
                    star.classList.add('bi-star');
                }
            });
        });
    });
});
</script>

<script>
$(document).ready(function () {
    $('.add-to-cart-btn').on('click', function () {
        var productId = $(this).data('id');
        var quantity = $('#productQuantity').val();

        $.ajax({
            url: '{{ route("cart.add") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                product_id: productId,
                quantity: quantity
            },
            success: function (response) {
                alert(response.message);
                updateCart(response.cartCount, response.cart, response.subtotal);
            },
            error: function (response) {
                if (response.status === 401) {
                    alert('Please login to add products to cart');
                    window.location.href = '{{ route("login") }}';
                }
            }
        });
    });

    function updateCart(cartCount, cart, subtotal) {
        $('#cart-item-count').text(cartCount);
        $('#cart-subtotal').text('₹' + subtotal);
        var cartHtml = '';
        cart.forEach(item => {
            cartHtml += `
                <div class="wrapper-item">
                    <div class="wrapper-img">
                        <img src="/storage/uploads/${item.name}_0.jpg" alt="img">
                    </div>
                    <div class="wrapper-content">
                        <h5 class="wrapper-title">${item.name}</h5>
                        <div class="price">
                            <p class="new-price">₹${item.price}</p>
                            <p class="quantity">Qty: ${item.quantity}</p>
                        </div>
                    </div>
                    
                    <span class="close-btn" data-id="${item.product_id}">
                        <svg viewBox="0 0 10 10" fill="none" class="fill-current" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.7 0.3C9.3 -0.1 8.7 -0.1 8.3 0.3L5 3.6L1.7 0.3C1.3 -0.1 0.7 -0.1 0.3 0.3C-0.1 0.7 -0.1 1.3 0.3 1.7L3.6 5L0.3 8.3C-0.1 8.7 -0.1 9.3 0.3 9.7C0.7 10.1 1.3 10.1 1.7 9.7L5 6.4L8.3 9.7C8.7 10.1 9.3 10.1 9.7 9.7C10.1 9.3 10.1 8.7 9.7 8.3L6.4 5L9.7 1.7C10.1 1.3 10.1 0.7 9.7 0.3Z"></path>
                        </svg>
                    </span>
                </div>
            `;
        });
        $('#cart-wrapper-item').html(cartHtml);
        rebindCloseButtons();
    }

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
                    alert(response.message);
                    updateCart(response.cartCount, response.cart, response.subtotal);
                },
                error: function (response) {
                    if (response.status === 401) {
                        alert('Please login to remove products from cart');
                        window.location.href = '{{ route("login") }}';
                    } else {
                        alert('Failed to remove product from cart.');
                    }
                }
            });
        });
    }

    rebindCloseButtons();
});
</script>

</body>

</html>