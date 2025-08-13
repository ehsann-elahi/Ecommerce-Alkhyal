@extends('layouts.app')
@section('title','Curtain Cart - Buy Online curtain in Dubai & Abu Dhabi')
@section('description','We made curtain buying online process in Dubai & Abu Dhabi quite easy and simple, We bring the whole curtain shop at your doorstep. We are dedicated team of curtain professionals who can visit your place to give you initial estimate, free of cost.')
@section('og:description','We made curtain buying online process in Dubai & Abu Dhabi quite easy and simple, We bring the whole curtain shop at your doorstep. We are dedicated team of curtain professionals who can visit your place to give you initial estimate, free of cost.')
@section('og:title','Curtain Cart - Buy Online curtain in Dubai & Abu Dhabi')
@section('og:url', 'https://alkhyalcurtain.ae/wishlist')
@section('canonical', url()->current())
@section('content')

<div id="product-category" class="container">
    <ul class="breadcrumb">
        <li>
            <a href="{{route('index')}}">
                <i class="fas fa-home"></i>
            </a>
        </li>
        <li>
            <a href="">
                Wishlist
            </a>
        </li>
    </ul>
    <div class="row">
        <div id="content" class="col">
            <h1 class="page_title">
                My Wishlist
            </h1>
            <div class="cat_info">
                <div id="display-control" class="row justify-content-end">
                    <div class="col-lg-6 col-12 cat-pagination-right">
                        <div class="clearfix w-100">
                            <div class="d-flex justify-content-lg-end">
                                <div class="cat-sort clearfix">
                                    <div class="text-right show-text clearfix">
                                        <label for="input-sort" class="text_sort">Sort By</label>
                                    </div>
                                    <div class="text-right show-select clearfix">
                                        <select id="input-sort" class="form-select">
                                            <option value="default" selected>Default</option>
                                            <option value="name_asc">Name (A - Z)</option>
                                            <option value="name_desc">Name (Z - A)</option>
                                            <option value="price_low_high">Price (Low &gt; High)</option>
                                            <option value="price_high_low">Price (High &gt; Low)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="cat-show clearfix">
                                    <div class="text-right show-text clearfix">
                                        <label for="input-limit" class="text_limit">Show</label>
                                    </div>
                                    <div class="text-right show-select clearfix">
                                        <select id="input-limit" class="form-select">
                                            <option value="9" selected>9</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="75">75</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="product-list" class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4">
                @if($products->isEmpty())
                <p>Your wishlist is empty.</p>
                @else
                @foreach ($products as $product)
                <div class="col">
                    <form class="clearfix" method="post">
                        <div class="product-thumb clearfix transition">
                            <div class="image">
                                <a href="{{ route('product-detail', $product->id) }}">
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
                                        <span class="price-new">{{ $product->price }}</span>
                                    </div>
                                    <button type="submit" class="addcart" title="Add to Cart">Add to Cart</button>
                                    <div class="button-group">
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
                @endif
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

        </div>
    </div>
</div>
@endsection