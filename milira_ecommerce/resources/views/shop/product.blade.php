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
<div class="shop-inner-btn">
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
<p class="tags mt-5">Description : <span class="inner-text">{{ $product->	description }}</span></p>

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
                            <div class="shipment text-center mt-3">
                                <div class="ship-box py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                                    <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/>
                                    </svg>
                                    <h6 class="mt-3">Shipping</h6>
                                    <p class="mt-2">Powerful, extensible, and feature-packed frontend toolkit. Build and customize with Sass, utilize prebuilt grid system and components, and bring projects to life with powerful JavaScript plugins.</p>
                                </div>
                            </div>
                            <div class="shipment text-center mt-3">
                                <div class="ship-box py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                                    <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/>
                                    </svg>
                                    <h6 class="mt-3">Shipping</h6>
                                    <p class="mt-2">Powerful, extensible, and feature-packed frontend toolkit. Build and customize with Sass, utilize prebuilt grid system and components, and bring projects to life with powerful JavaScript plugins.</p>
                                </div>
                            </div>
                            <div class="shipment text-center mt-3">
                                <div class="ship-box py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                                    <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/>
                                    </svg>
                                    <h6 class="mt-3">Shipping</h6>
                                    <p class="mt-2">Powerful, extensible, and feature-packed frontend toolkit. Build and customize with Sass, utilize prebuilt grid system and components, and bring projects to life with powerful JavaScript plugins.</p>
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
        <div class="submit-review mt-4">
            <span>
                <button type="submit" class="review-1">Submit</button>
            </span>
            <span class="px-3">
                <button type="button" class="review-2"> Cancel </button>
            </span>
        </div>
    </form>
</div>

<div class="review-sections mt-5">
    @php
        $reviewCount = $product->reviews->count();
        $reviewsToShow = $product->reviews->take(3); // Limit to the first 3 reviews
    @endphp

    @foreach($reviewsToShow as $review)
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

    @if($reviewCount > 3)
    <div class="text-center">
        <button class="shop-btn text-center" id="seeMoreReviews">See More Reviews</button>
    </div>
    @endif

    <div id="allReviews" style="display: none;">
        @foreach($product->reviews->slice(3) as $review)
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
    </div>
</div>
</div>
    <!--------------- products-Review-end--------------->

    <!--------------- weekly-section--------------->
    <section class="product weekly-sale product-weekly footer-padding mt-5">
        <div class="container">
            <div class="section-title">
                <h5>Best Sell in this Week</h5>
                <a href="#" class="view">View All</a>
            </div>
            <div class="weekly-sale-section">
    <div class="row">
        @foreach ($randomProducts as $product)
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mt-4">
                <div class="card product">
                    <div class="card-body">
                    <img src="{{ asset('storage/uploads/' . $product->title . '_0.jpg') }}" alt="" class="pdt-img"> <!-- Adjust if images are stored differently -->
                    <div class="card-hover">
                                                <div class="hover-icons text-end">
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
                                <h6>₹{{ $product->price }}</h6>
                            </div>
                            <div class="pdt-rating mt-4">
                                <p>
                                    @for ($i = 0; $i < 5; $i++)
                                        <i class="bi bi-star{{ $i < $product->averageRating() ? '-fill' : '' }}"></i>
                                    @endfor
                                    <span>({{ $product->totalReviews() }} reviews)</span>
                                </p>
                            </div>
                            <div class="pdt-shop text-center mt-5">
                                <div class="row">
                                    <div class="col-9">
                                        <button class="cart-btn">Buy Now <i class="bi bi-bag-heart-fill"></i></button>
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
        @endforeach
    </div>
</div>
        </div>
    </section>
    <!--------------- weekly-section-end--------------->

    <!--------------- footer-section--------------->
    @include('footer')
    <!---------------End of footer-section--------------->

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
    const seeMoreBtn = document.getElementById('seeMoreReviews');
    const allReviews = document.getElementById('allReviews');

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

    if (seeMoreBtn) {
        seeMoreBtn.addEventListener('click', function () {
            allReviews.style.display = 'block';
            this.style.display = 'none';
        });
    }
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
<script>
    $(document).ready(function() {
        var slider = document.getElementById('priceRangeSlider');

        noUiSlider.create(slider, {
            start: [0, 1000],
            connect: true,
            range: {
                'min': 0,
                'max': 1000
            },
            tooltips: [true, true],
            format: {
                to: function (value) {
                    return Math.round(value);
                },
                from: function (value) {
                    return Number(value);
                }
            }
        });

        var minValueSpan = document.getElementById('slider-margin-value-min');
        var maxValueSpan = document.getElementById('slider-margin-value-max');

        slider.noUiSlider.on('update', function (values, handle) {
            if (handle === 0) {
                minValueSpan.innerHTML = values[handle];
            } else {
                maxValueSpan.innerHTML = values[handle];
            }
        });
    });
</script>
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
                                                    <button class="buy-now-btn" data-url="/shop/${product.title.replace(/\s+/g, '-').replace(/'/g, '')}">View Product <i class="bi bi-bag-heart-fill"></i></button>
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

                rebindEventHandlers(); // Reattach event handlers after the DOM update
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

        $('.buy-now-btn').off('click').on('click', function () {
            var url = $(this).data('url');
            window.location.href = url;
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
    
    rebindEventHandlers(); // Initial event handler binding
});

        </script>
</body>

</html>