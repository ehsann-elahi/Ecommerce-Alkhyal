@extends('layouts.app')
@section('title','Buy window curtain online in Dubai & Abu Dhabi')
@section('description','Buy window curtain online in Dubai & Abu Dhabi for your luxury home, schedule now free consultation visit. We made it quite simple and hassle-free, we bring the curtains sample at your doorstep.')
@section('og:description','Buy window curtain online in Dubai & Abu Dhabi for your luxury home, schedule now free consultation visit. We made it quite simple and hassle-free, we bring the curtains sample at your doorstep.')
@section('og:title','Buy window curtain online in Dubai & Abu Dhabi')
@section('og:url', 'https://alkhyalcurtain.ae/')
@section('canonical', url()->current())

@section('styles')
<style>
    .all-price-new {
        font-size: 25px;
    }

    .banner-thumb img {
        height: 350px;
        /* Set your desired fixed height */
        width: 100%;
        /* Full width of the container */
        object-fit: cover;
        /* Crop and fill without distortion */
        display: block;
        /* Remove inline gap */
        border-radius: 4px;
        /* Optional: rounded corners */
    }

    /* Text management */
    .promo-title {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 100%;
        margin-bottom: 15px;
        font-weight: bold;
    }

    /* Card styling */
    .banner-layout {
        margin-bottom: 20px;
    }

    .banners {
        position: relative;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .banners:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .inner1 img {
        width: 100%;
        height: 320px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .banners:hover .inner1 img {
        transform: scale(1.1);
    }

    .inner2 {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .promo-text-box {
        background-color: rgba(255, 255, 255, 0.95);
        padding: 20px;
        border-radius: 8px;
        text-align: center;
        max-width: 80%;
        transition: all 0.3s ease;
        backdrop-filter: blur(5px);
    }

    .banners:hover .promo-text-box {
        background-color: rgba(255, 255, 255, 1);
        transform: scale(1.05);
    }

    .promo-btn {
        background-color: #17a2b8;
        color: white;
        border: none;
        padding: 8px 20px;
        border-radius: 4px;
        transition: all 0.3s ease;
        display: inline-block;
        text-transform: uppercase;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    .promo-btn:hover {
        background-color: #138496;
        transform: translateY(-2px);
    }

    /* Slick slider customization */
    .slick-prev,
    .slick-next {
        width: 40px;
        height: 40px;
        background-color: white;
        border-radius: 50%;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        z-index: 10;
        transition: all 0.3s ease;
    }

    .slick-prev:hover,
    .slick-next:hover {
        background-color: white;
        transform: scale(1.1);
    }

    .slick-prev {
        left: -20px;
    }

    .slick-next {
        right: -20px;
    }

    .slick-prev:before,
    .slick-next:before {
        display: none;
    }

    .slick-prev i,
    .slick-next i {
        color: #333;
        font-size: 16px;
    }

    @media (max-width: 768px) {
        .slick-prev {
            left: -10px;
        }

        .slick-next {
            right: -10px;
        }

        .inner1 img {
            height: 280px;
        }
    }


    /* Partner section */
    .partners-static-wrapper {
        background-color: #f9f9f9;
        padding: 20px 0;
        text-align: center;
        border-top: 1px solid #e5e5e5;
        border-bottom: 1px solid #e5e5e5;
    }

    .partners-static-track {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        gap: 30px;
        max-width: 1200px;
        margin: auto;
    }

    .partner-logo {
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        height: 100px;
        width: 180px;
        transition: transform 0.3s ease;
    }

    .partner-logo:hover {
        transform: scale(1.05);
    }

    .partner-logo img {
        max-height: 80px;
        max-width: 100%;
        object-fit: contain;
    }

    /* Curtain Laundry Custom Logo */
    .custom-logo {
        text-decoration: none;
        flex-direction: row;
        gap: 10px;
        text-align: left;
    }

    .custom-logo:hover {
        text-decoration: none;
    }

    .custom-logo:hover {
        text-decoration: none;
    }

    .logo-text {
        line-height: 1.2;
        font-weight: bold;
    }

    .logo-text .green {
        color: #54B963;
        font-size: 20px;
    }

    .logo-text .black {
        color: #000;
        font-size: 20px;
    }

    .logo-icon i.green-icon {
        color: #54B963;
        font-size: 40px;
    }

    /* Responsive: Tablets and below */
    @media (max-width: 768px) {
        .partner-logo {
            width: 150px;
            height: 90px;
        }

        .logo-text .green,
        .logo-text .black {
            font-size: 18px;
        }

        .logo-icon i.green-icon {
            font-size: 36px;
        }
    }

    /* Responsive: Mobile screens */
    @media (max-width: 480px) {
        .partner-logo {
            width: 120px;
            height: 80px;
            flex-direction: column;
        }

        .custom-logo {
            flex-direction: column;
            text-align: center;
        }

        .logo-icon i.green-icon {
            margin-top: 5px;
        }

        .logo-text .green,
        .logo-text .black {
            font-size: 16px;
        }

        .logo-icon i.green-icon {
            font-size: 32px;
        }
    }

    /* ===== Hero Layout ===== */
    .hero {
        --hero-h: clamp(420px, 72vh, 820px);
        position: relative;
        width: 100%;
    }

    .hero .swiper,
    .hero .swiper-wrapper,
    .hero .swiper-slide,
    .hero .hero-slide {
        height: var(--hero-h);
    }

    .hero-slide {
        position: relative;
        overflow: hidden;
    }

    /* Background image */
    .hero-img {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transform: scale(1.02);
        /* subtle polish */
        will-change: transform;
    }

    /* Readability overlay */
    .hero-slide::after {
        content: "";
        position: absolute;
        inset: 0;
        background:
            linear-gradient(180deg, rgba(0, 0, 0, .45), rgba(0, 0, 0, .35) 35%, rgba(0, 0, 0, .25));
        pointer-events: none;
    }

    /* Centered content */
    .hero-content {
        position: absolute;
        inset: 0;
        display: grid;
        place-items: center;
        padding: clamp(12px, 3vw, 28px);
        text-align: center;
        z-index: 2;
    }

    /* Glass card for crisp contrast */
    .hero-content-inner {
        display: inline-block;
        padding: clamp(14px, 2.6vw, 28px) clamp(18px, 3.2vw, 36px);
        background: rgba(0, 0, 0, .25);
        backdrop-filter: blur(4px);
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, .25);
        animation: riseIn .8s ease both;
    }

    .hero h1,
    .hero h3 {
        color: #fff;
        font-weight: 800;
        line-height: 1.15;
        margin: 0 0 .4em;
        font-size: clamp(1.8rem, 5vw, 3rem);
        text-wrap: balance;
    }

    .hero p {
        color: #f2f2f2;
        font-size: clamp(1rem, 2.4vw, 1.15rem);
        margin: 0 0 1rem;
    }

    /* CTA button */
    .visitBtn {
        background: #138496;
        color: #fff;
        padding: 12px 28px;
        font-weight: 700;
        border-radius: 50px;
        text-decoration: none;
        display: inline-block;
        transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
        box-shadow: 0 6px 16px rgba(89, 143, 156, 0.35);
    }

    .visitBtn:hover {
        background: #15292cff;
        color: white;
        transform: translateY(-2px);
    }

    .visitBtn:active {
        transform: translateY(0);
    }

    /* Swiper controls */
    .swiper-button-next,
    .swiper-button-prev {
        color: #fff;
        width: 46px;
        height: 46px;
        border-radius: 50%;
        background: rgba(0, 0, 0, .35);
        backdrop-filter: blur(2px);
    }

    .swiper-button-next::after,
    .swiper-button-prev::after {
        font-size: 20px;
    }

    .swiper-pagination-bullet {
        background: #fff;
        opacity: .6;
    }

    .swiper-pagination-bullet-active {
        opacity: 1;
    }

    /* Motion reduce */
    @media (prefers-reduced-motion: reduce) {

        .visitBtn,
        .hero-content-inner {
            transition: none;
            animation: none;
        }
    }

    /* Entrance */
    @keyframes riseIn {
        from {
            opacity: 0;
            transform: translateY(10px) scale(.98);
        }

        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* Small devices fine-tuning */
    @media (max-width: 575.98px) {
        .hero-content-inner {
            background: rgba(0, 0, 0, .35);
            padding: 14px 16px;
            border-radius: 14px;
        }
    }
</style>
@endsection
@section('content')
<div id="common-home">

    <section class="hero">
        <div class="swiper hero-swiper">
            <div class="swiper-wrapper">

             <div class="swiper-slide">
                    <div class="hero-slide">
                        <img src="{{ asset('/assets/front/image/cache/catalog/banners/main-banner2-1920x800.png') }}"
                            alt="mainbanner2" loading="lazy" class="hero-img">
                        <div class="hero-content">
                            <div class="hero-content-inner">
                                <h3>Buy Window Curtain & Blinds Online</h3>
                                <p>Discover a premium selection of window blinds and curtains in Dubai and Abu Dhabi</p>
                                <a href="/bookingForm" class="btn visitBtn">BOOK A FREE VISIT</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 1 -->
                <div class="swiper-slide">
                    <div class="hero-slide">
                        <img src="{{ asset('/assets/front/image/cache/catalog/banners/main-banner1-1920x800.png') }}"
                            alt="mainbanner1" loading="lazy" class="hero-img">
                        <div class="hero-content">
                            <div class="hero-content-inner">
                                <h1>Elevate your space with windows curtains</h1>
                                <p>Looking to enhance your home decor? Shop from a wide collection of window blinds</p>
                                <a href="/bookingForm" class="btn visitBtn">BOOK A FREE VISIT</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
               

            </div>

            <!-- Controls -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-pagination"></div>
        </div>
    </section>


    <div class="featured-block mt-80">
        <div class="container">
            <div class="row">
                <div class="featured-container box-module">
                    <div class="page-title">
                        <h2>Our Curtain & Blind Gallery</h2>
                        <h3 class="text-center">Explore Our Collection</h3>
                        <p class="text-center">Your perfect curtain is just a click away. Explore a premium collection of luxury curtains online featuring stylish designs</p>
                    </div>
                    <div class="block-content">
                        <div id="categoryCarousel-0" class="box-category row category-carousel clearfix slick-theme">
                            @foreach ($products as $product)
                            @if ($product->stock > 0)
                            <div class="col col-12">
                                <div class="product-layout">
                                    <form class="clearfix" method="post">
                                        <div class="product-thumb clearfix transition">
                                            <div class="image">

                                                <a href="{{ route('product-detail', $product->id) }}">
                                                    <img loading="lazy" src="{{ asset('/assets/upload/prod/' . $product->img) }}"
                                                        alt="{{ $product->name }}" title="{{ $product->name }}"
                                                        class="img-fluid" />
                                                </a>
                                                <button type="submit" class="addcart" title="Add to Cart">Add to Cart</button>
                                            </div>
                                            <div class="content thumb-description clearfix">
                                                <div class="caption">
                                                    <h4 class="product-title">
                                                        <a href="#">{{ $product->name }}</a>
                                                    </h4>
                                                    <div class="price">
                                                        <span class="price-new">{{ $product->price }} AED / Meter</span>
                                                    </div>
                                                    <p class="description">{{ Str::limit($product->description, 100) }}</p>
                                                    <div class="button-group">
                                                        <button type="button" title="Add to Wish List" class="wishlist-button" data-id="{{ $product->id }}">
                                                            <i class="icon-heart"></i>
                                                        </button>
                                                        <button type="button" title="Quickview" class="quickview-button" data-id="{{ $product->id }}"><i class="icon-eye"></i></button>
                                                        <button type="button" title="Compare this Product" class="compare-button" data-id="{{ $product->id }}">
                                                            <i class="icon-change"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                            <input type="hidden" name="quantity" value="1" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="banner-outer html1 mt-80 mt-banner">
        <div class="container">
            <div class="row">
                <div class="page-title toggled">
                    <h2>Pick Your Perfect Piece</h2>
                    <h3 class="text-center">Shop by Category</h3>
                    <p class="text-center">Explore every corner of your style with categories that bring you the best in home fashion from ready-made curtains to hand selected pieces</p>
                </div>
                <div id="categoryCarousel-1" class="box-category row category-carousel clearfix slick-theme">
                    @foreach ($categories as $index => $category)
                    @php
                    $formattedName = strtolower(str_replace([' ', '+'], '-', $category->name));
                    // Truncate long category names
                    // $displayName = strlen($category->name) > 15 ? substr($category->name, 0, 15) . '...' : $category->name;
                    @endphp
                    <div class="banner-layout px-2">
                        <div class="banner-thumb">
                            <div class="banners">
                                <div class="inner1">
                                    <a href="{{ route('catProduct', ['name' => $formattedName]) }}">
                                        <img alt="{{ $category->name }}" class="img-fluid" src="{{ asset('assets/upload/cate/' . $category->img) }}" />
                                    </a>
                                </div>
                                <div class="inner2">
                                    <div class="promo-text-box">
                                        <h3 class="promo-title mb-2" title="{{ $category->name }}">{{ $category->name }}</h3>
                                        <a class="btn button promo-btn" href="{{ route('catProduct', ['name' => $formattedName]) }}">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <section class="py-5" style="background-color: #229ac8; color: #fff;">
        <div class="container-lg">
            <div class="row align-items-center py-3">
                <div class="col-md-6">
                    <h2 style="color: rgb(60, 55, 55); font-weight: 600;">Why we need curtains</h2>
                    <p style="font-size: 1.1rem; line-height: 1.8;">
                        Curtains do more than just add a decorative touch to a room they create comfort protect your privacy and help control the light that enters your space. Curtains are one of those small home details that quietly make a big difference. They help soften natural light reduce glare. Every room feels more finished with the right pair of curtains.
                    </p>
                </div>
                <div class="col-md-6 text-center">
                    <img loading="lazy" src="{{ asset('assets\upload\gallery\1739188511_9-360x360.jpg') }}" alt="Blackout Curtain Example" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <div class="service-box mt-80">
        <div class="container">
            <div class="page-title toggled">
                <h2>Why Choose Alkhyal Curtains</h2>
                <h3 class="text-center">Trusted Service, Every Time</h3>
                <p class="text-center">We believe that great interiors start with the right details. Every window tells a story.We help you dress yours with thoughtful designs reliable service.</p>
            </div>
            <div class="promo-item row row-cols-lg-4 row-cols-2">
                <div class="service-item">
                    <div class="service">
                        <div class="service-icon"><i class="icon-plane1"></i></div>
                        <div class="service-content">
                            <h4 class="promo-title">Free Worldwide Shipping</h4>
                            <div class="promo-desc">On order over 150 AED</div>
                        </div>
                    </div>
                </div>
                <div class="service-item">
                    <div class="service">
                        <div class="service-icon"><i class="icon-wallet"></i></div>
                        <div class="service-content">
                            <h4 class="promo-title">Money Back Guarantee</h4>
                            <div class="promo-desc">Cash On Delivery</div>
                        </div>
                    </div>
                </div>
                <div class="service-item">
                    <div class="service">
                        <div class="service-icon"><i class="icon-gift"></i></div>
                        <div class="service-content">
                            <h4 class="promo-title">Special Gift Card</h4>
                            <div class="promo-desc">Offer special bonuses with gift</div>
                        </div>
                    </div>
                </div>
                <div class="service-item">
                    <div class="service">
                        <div class="service-icon"><i class="icon-support"></i></div>
                        <div class="service-content">
                            <h4 class="promo-title">Best Online Support</h4>
                            <div class="promo-desc">
                                Call us 24/7 at <a href="tel:+971547165924">+971547165924</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="product-tab-block mt-80 box">
        <div class="container">
            <div class="main-tab">
                <div class="product-tabs box-content clearfix">
                    <div class="page-title toggled">
                        <a href="https://alkhyalcurtain.ae/ourProduct">
                            <h2> TRENDING PRODUCTS </h2>
                        </a>
                        <h3 class="text-center">Best Sellers You Can't Miss</h3>
                        <p class="text-center">Discover what’s trending and find your next favorite item today.</p>
                    </div>
                    <div id="tabs-14" class="mahardhi-tabs section">
                        <ul class="nav nav-tabs">
                            @foreach ($productTypes as $type)
                            <li>
                                <a href="#tab-{{ strtolower($type) }}-14" data-toggle="tab" class="{{ $loop->first ? 'selected' : '' }}">
                                    <span>{{ $type }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="all-content">
                        <div class="tab-content block_box">
                            @foreach ($productTypes as $type)
                            <div id="tab-{{ strtolower($type) }}-14" class="tab-pane {{ $loop->first ? 'active' : '' }}">
                                <div class="box-product row product-carousel clearfix">
                                    @foreach ($productsByType[$type] as $product)
                                    @php
                                    $formattedName = strtolower(str_replace([' ', '+'], '-', $product->name));
                                    @endphp
                                    <div class="col col-12">
                                        <div class="product-layout">
                                            <form class="clearfix" method="post">
                                                <div class="product-thumb clearfix transition">
                                                    <div class="image">
                                                        <a href="{{ route('product-detail', $formattedName) }}">
                                                            <img loading="lazy" src="{{ asset('/assets/upload/prod/' . $product->img) }}"
                                                                alt="{{ $product->name }}" title="{{ $product->name }}"
                                                                class="img-fluid" />
                                                        </a>
                                                        <button type="submit" class="addcart" title="Add to Cart">Add to Cart</button>
                                                    </div>
                                                    <div class="content thumb-description clearfix">
                                                        <div class="caption">
                                                            <h4 class="product-title">
                                                                <a href="#">{{ $product->name }}</a>
                                                            </h4>
                                                            <div class="price">
                                                                <span class="price-new">{{ $product->price }} AED / Meter</span>
                                                            </div>
                                                            <p class="description">{{ Str::limit($product->description, 100) }}</p>
                                                            <div class="button-group">
                                                                <button type="button" title="Add to Wish List" class="wishlist-button" data-id="{{ $product->id }}">
                                                                    <i class="icon-heart"></i>
                                                                </button>
                                                                <button type="button" title="Quickview" class="quickview-button" data-id="{{ $product->id }}"><i class="icon-eye"></i></button>
                                                                <button type="button" title="Compare this Product" class="compare-button" data-id="{{ $product->id }}">
                                                                    <i class="icon-change"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                                    <input type="hidden" name="quantity" value="1" />
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="testimonial-block mt-80">
        <div class="container">
            <div class="testimonial-container box-module">
                <div class="page-title">
                    <h2>Know us from Our Customers</h2>
                </div>
                <div class="block-content">
                    <div id="testimonialCarousel-0" class="slideTestimonial testimonial-carousel clearfix" data-items="1" data-row="1">
                        <div class="row-items clearfix col-xs-12">
                            <div class="testimonial-item">
                                <div class="testimonial-left">
                                    <i class="icon-squarequote"></i>
                                    <div class="testimonial-images">
                                        <img loading="lazy" src="{{ asset('/assets/front/image/cache/catalog/testimonials/1-282x282.jpg') }}"
                                            alt="John Deo" class="m-image-auto m-auto rounded-circle">
                                    </div>
                                    <div class="testimonial-content">
                                        <div class="testimonial-author">John Deo</div>
                                        <div class="testimonial-customer">Customer</div>
                                    </div>
                                </div>
                                <div class="testimonial-right">
                                    <div class="testimonial-text">
                                        <p style="font-size: 22px">"I recently got custom blackout curtains installed in my bedroom from Al Khyal Curtain, and I couldn't be happier. The fabric quality is excellent, and the team handled the installation perfectly. Highly recommended for anyone looking for professional curtain services in Dubai."</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row-items clearfix col-xs-12">
                            <div class="testimonial-item">
                                <div class="testimonial-left">
                                    <i class="icon-squarequote"></i>
                                    <div class="testimonial-images">
                                        <img loading="lazy" src="{{ asset('/assets/front/image/cache/catalog/testimonials/2-282x282.jpg') }}"
                                            alt="Luies Charies" class="m-image-auto m-auto rounded-circle">
                                    </div>
                                    <div class="testimonial-content">
                                        <div class="testimonial-author">Luies Charies</div>
                                        <div class="testimonial-customer">Customer</div>
                                    </div>
                                </div>
                                <div class="testimonial-right">
                                    <div class="testimonial-text">
                                        <p>"From consultation to installation, the process was seamless. The team at Al Khyal Curtain helped me choose the perfect sheer curtains for my living room. The final look completely transformed the space. Excellent service and very responsive staff!"</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row-items clearfix col-xs-12">
                            <div class="testimonial-item">
                                <div class="testimonial-left">
                                    <i class="icon-squarequote"></i>
                                    <div class="testimonial-images">
                                        <img loading="lazy" src="{{ asset('/assets/front/image/cache/catalog/testimonials/3-282x282.jpg') }}"
                                            alt="Michael Jack" class="m-image-auto m-auto rounded-circle">
                                    </div>
                                    <div class="testimonial-content">
                                        <div class="testimonial-author">Michael Jack</div>
                                        <div class="testimonial-customer">Customer</div>
                                    </div>
                                </div>
                                <div class="testimonial-right">
                                    <div class="testimonial-text">
                                        <p>"I contacted Al Khyal Curtain for a motorized curtain solution for my office. Their team explained all the options clearly, and the result exceeded my expectations. Top-notch service, timely delivery, and professional installation — 10/10!"</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- End testimonial carousel -->
                </div>
            </div>
        </div>
    </div>




    <section class="partners-static-wrapper">
        <div class="page-title section mt-3 mb-3">
            <h2 style="font-size: 38px">BRANDS WE PROUDLY WORK WITH</h2>

            <p class="text-center"> We proudly collaborate with trusted partners across the UAE who share our commitment to excellence in cleaning and customer satisfaction.</p>
        </div>
        <div class="partners-static-track mt-2">
            <a href="https://curtaincleaning.ae" target="_blank" class="partner-logo">
                <img loading="lazy" src="https://laundryservice.ae/assets/images/icon.png" alt="curtaincleaning">
            </a>
            <a href="https://carpetwashing.ae" target="_blank" class="partner-logo">
                <img src="https://carpetwashing.ae/assets/frontened/images/lgo.png" alt="Partner 2">
            </a>
            <a href="https://www.laundryservice.ae" target="_blank" class="partner-logo">
                <img src="https://www.laundryservice.ae/assets/images/logo.png" alt="Partner 3">
            </a>
            <a href="https://curtainlaundry.com" class="partner-logo custom-logo">
                <div class="logo-text">
                    <div><span class="green">C</span><span class="black">urtain</span></div>
                    <div><span class="green">L</span><span class="black">aundry</span></div>
                </div>
                <div class="logo-icon">
                    <i class="fas fa-hands-wash green-icon"></i>
                </div>
            </a>
        </div>
    </section>


    <div class="box mblog section mt-80">
        <div class="container">
            <div class="box-content">
                <div class="page-title section">
                    <h2>Latest Blog News</h2>
                    <h3 class="text-center">Do not Miss our Latest Thoughts</h3>
                    <p class="text-center">Explore expert insights design trends and thoughtful commentary tailored for style conscious homeowners. Our latest articles are here to guide and inspire your next interior upgrade.</p>
                </div>
                <div class="row">
                    <div class="block_box">
                        <div id="blogCarousel-0" class="blogs-block  blog-carousel  clearfix" data-items="2"
                            data-row="1">
                            <div class="product-block blog-block clearfix  col-xs-12 px-lg-3 px-1">
                                <div class="item clearfix">
                                    <div class="blog-info">
                                        <div class="image">
                                            <a href=""><img
                                                    src="{{ asset('/assets/front/image/cache/catalog/blogs/blog1-1140x760.jpg') }}"
                                                    alt="The Standard Lorem Ipsum"
                                                    title="The Standard Lorem Ipsum" class="img-fluid" /></a>
                                            <div class="zoom-post">
                                                <a class="hover-zoom"
                                                    href="{{ asset('/assets/front/image/cache/catalog/blogs/blog1-1140x760.jpg') }}"
                                                    data-lightbox="example-set"
                                                    title="The Standard Lorem Ipsum"></a>
                                                <a class="hover-post" href=""></a>
                                            </div>
                                            <div class="btn-date">
                                                <span class="block-day">02</span>
                                                <span class="block-month">October</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="caption blog-description">
                                        <div class="link_info">
                                            <h4 class="blog-title"><a href="">The
                                                    Standard Lorem Ipsum</a></h4>
                                            <div class="blog-text d-none"><span>Lorem Ipsum is simply dummy text
                                                    of the printing and
                                                    typesetting industry. Lorem Ipsum has been the industry's
                                                    standard dummy text ever since the
                                                    1500...</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-block blog-block clearfix  col-xs-12 px-lg-3 px-1">
                                <div class="item clearfix">
                                    <div class="blog-info">
                                        <div class="image">
                                            <a href=""><img
                                                    src="{{ asset('/assets/front/image/cache/catalog/blogs/blog2-1140x760.jpg') }}"
                                                    alt="Lorem Ipsum is simply dummy text of the printing"
                                                    title="Lorem Ipsum is simply dummy text of the printing"
                                                    class="img-fluid" /></a>
                                            <div class="zoom-post">
                                                <a class="hover-zoom"
                                                    href="{{ asset('/assets/front/image/cache/catalog/blogs/blog2-1140x760.jpg') }}"
                                                    data-lightbox="example-set"
                                                    title="Lorem Ipsum is simply dummy text of the printing"></a>
                                                <a class="hover-post" href=""></a>
                                            </div>
                                            <div class="btn-date">
                                                <span class="block-day">02</span>
                                                <span class="block-month">October</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="caption blog-description">
                                        <div class="link_info">
                                            <h4 class="blog-title"><a href="">Lorem
                                                    Ipsum is simply dummy text of the printing</a></h4>
                                            <div class="blog-text d-none"><span>Lorem Ipsum is simply dummy text
                                                    of the printing and
                                                    typesetting industry. Lorem Ipsum has been the industry's
                                                    standard dummy text ever since the
                                                    1500...</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-block blog-block clearfix  col-xs-12 px-lg-3 px-1">
                                <div class="item clearfix">
                                    <div class="blog-info">
                                        <div class="image">
                                            <a href=""><img
                                                    src="{{ asset('/assets/front/image/cache/catalog/blogs/blog3-1140x760.jpg') }}"
                                                    alt="Lorem Ipsum has been the industrys standard dummy"
                                                    title="Lorem Ipsum has been the industrys standard dummy"
                                                    class="img-fluid" /></a>
                                            <div class="zoom-post">
                                                <a class="hover-zoom"
                                                    href="{{ asset('/assets/front/image/cache/catalog/blogs/blog3-1140x760.jpg') }}"
                                                    data-lightbox="example-set"
                                                    title="Lorem Ipsum has been the industrys standard dummy"></a>
                                                <a class="hover-post" href=""></a>
                                            </div>
                                            <div class="btn-date">
                                                <span class="block-day">02</span>
                                                <span class="block-month">October</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="caption blog-description">
                                        <div class="link_info">
                                            <h4 class="blog-title"><a href="">Lorem
                                                    Ipsum has been the industrys standard dummy</a></h4>
                                            <div class="blog-text d-none"><span>Lorem Ipsum is simply dummy text
                                                    of the printing and
                                                    typesetting industry. Lorem Ipsum has been the industry's
                                                    standard dummy text ever since the
                                                    1500...</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-block blog-block clearfix  col-xs-12 px-lg-3 px-1">
                                <div class="item clearfix">
                                    <div class="blog-info">
                                        <div class="image">
                                            <a href=""><img
                                                    src="{{ asset('/assets/front/image/cache/catalog/blogs/blog4-1140x760.jpg') }}"
                                                    alt="Lorem Ipsum Dolor Sit Amet"
                                                    title="Lorem Ipsum Dolor Sit Amet" class="img-fluid" /></a>
                                            <div class="zoom-post">
                                                <a class="hover-zoom"
                                                    href="{{ asset('/assets/front/image/cache/catalog/blogs/blog4-1140x760.jpg') }}"
                                                    data-lightbox="example-set"
                                                    title="Lorem Ipsum Dolor Sit Amet"></a>
                                                <a class="hover-post" href=""></a>
                                            </div>
                                            <div class="btn-date">
                                                <span class="block-day">02</span>
                                                <span class="block-month">October</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="caption blog-description">
                                        <div class="link_info">
                                            <h4 class="blog-title"><a href="">Lorem
                                                    Ipsum Dolor Sit Amet</a></h4>
                                            <div class="blog-text d-none"><span>Lorem Ipsum is simply dummy text
                                                    of the printing and
                                                    typesetting industry. Lorem Ipsum has been the industry's
                                                    standard dummy text ever since the
                                                    1500...</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-block blog-block clearfix  col-xs-12 px-lg-3 px-1">
                                <div class="item clearfix">
                                    <div class="blog-info">
                                        <div class="image">
                                            <a href=""><img
                                                    src="{{ asset('/assets/front/image/cache/catalog/blogs/blog5-1140x760.jpg') }}"
                                                    alt="Lorem Ipsum Dolor" title="Lorem Ipsum Dolor"
                                                    class="img-fluid" /></a>
                                            <div class="zoom-post">
                                                <a class="hover-zoom"
                                                    href="{{ asset('/assets/front/image/cache/catalog/blogs/blog5-1140x760.jpg') }}"
                                                    data-lightbox="example-set" title="Lorem Ipsum Dolor"></a>
                                                <a class="hover-post" href=""></a>
                                            </div>
                                            <div class="btn-date">
                                                <span class="block-day">02</span>
                                                <span class="block-month">October</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="caption blog-description">
                                        <div class="link_info">
                                            <h4 class="blog-title"><a href="">Lorem
                                                    Ipsum Dolor</a></h4>
                                            <div class="blog-text d-none"><span>Lorem Ipsum is simply dummy text
                                                    of the printing and
                                                    typesetting industry. Lorem Ipsum has been the industry's
                                                    standard dummy text ever since the
                                                    1500...</span></div>
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

    <div class="container">
        <div class="row">
            <div id="content" class="col-sm-12">
                <div class="modal fade newsletter-popup" id="newsletter-popup-0">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="newsletter-wrap clearfix">
                                    <div class="newsletter-content">
                                        <div class="newsletter-content-innner">
                                            <h3>Subscribe our Newsletter</h3>
                                            <p>To Get 20% Off</p>
                                            <form class="frmnewsletterpopup" id="frmnewsletter-0" onsubmit=""
                                                method="post">
                                                <input type="email" class="newsletter_usr_popup_email"
                                                    name="newsletter_usr_email" id="newsletter_usr_popup_email"
                                                    placeholder="Enter e-mail here..." required>
                                                <button class="btn btn-default subscribe-btn"
                                                    type="submit">Subscribe</button>
                                            </form>
                                            <div class="newsletter-popup-message msg-0"></div>
                                            <div class="newsletter-content-bottom">
                                                <input type="checkbox" id="popup_dont_show_again" />
                                                <label for="popup_dont_show_again">Don't show this popup
                                                    again!</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn px-1 newsletter-btn-close close"
                                        data-bs-dismiss="modal" aria-label="Close"><i
                                            class="icon-close"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Swiper('.hero-swiper', {
            // step-by-step horizontal slide (right ➜ left)
            loop: true,
            speed: 800,
            autoplay: {
                delay: 4500,
                disableOnInteraction: false,
                pauseOnMouseEnter: true
            },
            grabCursor: true,
            keyboard: {
                enabled: true
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
            // keep one full slide at a time
            slidesPerView: 1,
            effect: 'slide'
        });
    });
</script>
@endsection
@endsection
