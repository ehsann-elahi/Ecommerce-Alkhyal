<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "ItemList",
    "itemListElement": [
        @foreach($products as $index => $product)
        {
            "@type": "ListItem",
            "position": {{ $index + 1 }},
            "url": "{{ route('product.show', $product->slug) }}"
        }@if(!$loop->last),@endif
        @endforeach
    ]
}
</script>


@extends('layouts.app')
@section('title','Buy high quality luxury curtain online in Dubai & Abu Dhabi')
@section('description','We sell high quality luxury curtain online in Dubai & Abu Dhabi. We provide all varities of curtains especially blackout curtain, shear curtain, net curtain, fancy curtain, pure cotton curtain. Our price and quality is unmatchable')
@section('og:description','We sell high quality luxury curtain online in Dubai & Abu Dhabi. We provide all varities of curtains especially blackout curtain, shear curtain, net curtain, fancy curtain, pure cotton curtain. Our price and quality is unmatchable')
@section('og:title','Buy high quality luxury curtain online in Dubai & Abu Dhabi')
@section('og:url', 'https://alkhyalcurtain.ae/ourProduct')
@section('canonical', url()->current())

@section('content')

@section('styles')
<style>
    body {
        margin: 0;
        font-family: 'Segoe UI', sans-serif;
        background-color: #fff;
        color: #333;
    }

    section.blind-section {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 80px 10%;
        gap: 60px;
        background-color: #f9f9f9;
        flex-wrap: wrap;
    }

    .blind-image img {
        width: 500px;
        max-width: 100%;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .blind-image img:hover {
        transform: scale(1.02);
    }

    .blind-content {
        max-width: 600px;
    }

    .blind-content h2 {
        font-size: 38px;
        margin-bottom: 20px;
        color: #444;
        font-weight: 600;
    }

    .blind-content p {
        font-size: 17px;
        line-height: 1.7;
        color: #555;
    }

    .blind-content p strong {
        font-weight: 700;
        color: #333;
    }

    .cta-button {
        display: inline-block;
        margin-top: 30px;
        padding: 12px 28px;
        background: #2e798c;
        color: white;
        border: none;
        border-radius: 30px;
        font-size: 16px;
        font-weight: 500;
        text-decoration: none;
        transition: background 0.3s ease, transform 0.2s ease;
    }

    .cta-button:hover {
        transform: translateY(-2px);
        background: white;
        color: #2e798c;
    }

    @media (max-width: 768px) {
        section.blind-section {
            flex-direction: column;
            text-align: center;
            padding: 60px 20px;
        }

        .blind-content h2 {
            font-size: 30px;
        }

        .blind-content p {
            font-size: 16px;
        }
    }
</style>
@endsection
<div id="product-category" class="container">
    <ul class="breadcrumb">
        <li>
            <a href="{{route('index')}}">
                <i class="fas fa-home"></i>
            </a>
        </li>
        <li>
            <a href="">
                @if(isset($category->name))
                {{$category->name}}
                @else
                Products
                @endif
            </a>
        </li>
    </ul>

    <div class="carousel-text">
        <h1 class="text-center mt-3">Most Popular Products</h1>
        <p class="text-center mb-4">We sell high quality luxury curtain online in Dubai & Abu Dhabi. We provide all varities of curtains especially blackout curtain, shear curtain, net curtain, fancy curtain, pure cotton curtain. Our price and quality is unmatchable</p>

    </div>
    <div class="row">
        <div id="content" class="col">
            <h3 class="page_title">
                @if(isset($category->name))
                {{$category->name}}
                @else
                Products
                @endif
            </h3>
            <div class="cat_info">
                <div id="display-control" class="row justify-content-end">
                    <div class="col-lg-8 col-12 cat-pagination-right">
                        <div class="clearfix w-100">
                            <div class="d-flex justify-content-lg-end flex-wrap gap-2">

                                <!-- Sort By Price -->
                                <div class="cat-sort clearfix">
                                    <div class="text-right show-text clearfix">
                                        <label for="input-sort" class="text_sort">Sort By</label>
                                    </div>
                                    <div class="text-right show-select clearfix">
                                        <select id="input-sort" class="form-select">
                                            <option value="default" {{ request('sort') == 'default' ? 'selected' : '' }}>Default</option>
                                            <option value="price_low_high" {{ request('sort') == 'price_low_high' ? 'selected' : '' }}>Price (Low > High)</option>
                                            <option value="price_high_low" {{ request('sort') == 'price_high_low' ? 'selected' : '' }}>Price (High > Low)</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Category Filter -->
                                @if($showFilter ?? false)
                                <div class="cat-sort clearfix">
                                    <div class="text-right show-text clearfix">
                                        <label for="input-category" class="text_sort">Category</label>
                                    </div>
                                    <div class="text-right show-select clearfix">
                                        <select id="input-category" class="form-select">
                                            <option value="all" {{ $categoryId === 'all' || !$categoryId ? 'selected' : '' }}>All</option>
                                            @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}" {{ $categoryId == $cat->id ? 'selected' : '' }}>
                                                {{ $cat->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif

                                <!-- Show Limit -->
                                <div class="cat-show clearfix">
                                    <div class="text-right show-text clearfix">
                                        <label for="input-limit" class="text_limit">Show</label>
                                    </div>
                                    <div class="text-right show-select clearfix">
                                        <select id="input-limit" class="form-select">
                                            <option value="9" {{ request('limit') == 9 ? 'selected' : '' }}>9</option>
                                            <option value="25" {{ request('limit') == 25 ? 'selected' : '' }}>25</option>
                                            <option value="50" {{ request('limit') == 50 ? 'selected' : '' }}>50</option>
                                            <option value="75" {{ request('limit') == 75 ? 'selected' : '' }}>75</option>
                                            <option value="100" {{ request('limit') == 100 ? 'selected' : '' }}>100</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="product-list" class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4">
                @foreach ($products as $product)
               
                <div class="col">
                    <form class="clearfix" method="post">
                        <div class="product-thumb clearfix transition">
                            <div class="image">
                                <a href="{{ route('product-detail', $product->slug) }}">
                                    <img loading="lazy" src="{{ asset('/assets/upload/prod/' . $product->img) }}" alt="{{ $product->name }}" title="{{ $product->name }}" class="img-fluid" id="imgFluid" />
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
                                    <button type="submit" class="addcart" title="Add to Cart">Add to Cart</button>
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
                @endforeach
            </div>
              <div class="pro_pagination">
                <div class="row">
                    <div class="col-sm-6 text-start">
                        Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} ({{ $products->lastPage() }} Pages)
                    </div>
                    <div class="col-sm-6 text-end">
                        <ul class="pagination">
                            @if ($products->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                            @else
                            <li class="page-item"><a href="{{ $products->previousPageUrl() }}" class="page-link">&laquo;</a></li>
                            @endif

                            @foreach ($products->links()->elements[0] as $page => $url)
                            @if ($page == $products->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                            @else
                            <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                            @endif
                            @endforeach

                            @if ($products->hasMorePages())
                            <li class="page-item"><a href="{{ $products->nextPageUrl() }}" class="page-link">&raquo;</a></li>
                            @else
                            <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>


            <section class="py-5" style="background-color: #229ac8; color: #fff;">
                <div class="container-lg">
                    <div class="row align-items-center py-3">
                        <div class="col-md-6">
                            <h2 style="color: rgb(60, 55, 55); font-weight: 600;">Blackout Curtains</h2>
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

           

            <section class="blind-section">
                <div class="row">
                    <div class="col-6">
                        <div class="blind-image">
                            <img loading="lazy" src="{{ asset('assets\upload\blind1.webp') }}" alt="Zebra Blinds">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="blind-content">
                            <h2>Zebra Blinds</h2>
                            <p><strong>A Zebra Blind</strong>, also known as a day and night blind or dual roller blind, is a modern window treatment that alternates between horizontal stripes of sheer and solid fabric. The unique design allows you to easily control the level of light and privacy by adjusting the alignment of the stripes. When the solid and sheer stripes overlap, the blind filters light, creating a soft glow, while fully overlapping the solid stripes blocks out light completely.</p>
                            <a href="{{route('register_user')}}" class="cta-button">Register</a>
                        </div>
                    </div>
                </div>


            </section>

           
        </div>
    </div>
</div>


@endsection