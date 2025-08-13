@php
    use Illuminate\Support\Str;

    $cleanMeta = strip_tags($product->meta_description);
    $cleanMeta = preg_replace('/\s+/', ' ', $cleanMeta);
    $cleanMeta = trim($cleanMeta);
    $cleanMeta = Str::limit($cleanMeta, 150); // LIMIT TO 150 CHARACTERS
@endphp



@extends('layouts.app')
@section('title',$product->title)
@section('description', $cleanMeta)
@section('og:description', $cleanMeta)
@section('og:title',$product->title)
@section('og:url', url('product-detail/' . $product->slug))
@section('canonical', url()->current())
@section('content')

<div class="breadcrumb-back">
    <div class="breadcrumb-inner container clearfix">
        <div class="breadcrumb-row">
            <h1 class="page_title">{{$product->name}}</h1>
            <ul class="breadcrumb">
                <li class=""><a href="{{route('index')}}"><i class="fas fa-home"></i></a></li>
                @php
                $formattedName = strtolower(str_replace([' ', '+'], '-', $product->category->name));
                @endphp
                <li class=""><a href="{{ route('catProduct', ['name' => $formattedName]) }}">{{$product->category->name}}</a></li>
                <li class=""><a href="">{{$product->name}}</a></li>
            </ul>
        </div>
    </div>
</div>
<div id="product-info" class="container">
    <div id="content" class="col">
        <div class="row">
            <div class="row mb-3">
                <div class="col-sm product-img">
                    <div class="thumbnails">
                        <div class="pro-image">
                            <a href="{{ asset('/assets/upload/prod/' . $product->img) }}" class="thumbnail ">
                                <img loading="lazy" src="{{ asset('/assets/upload/prod/' . $product->img) }}" title="{{$product->name}}" alt="{{$product->name}}" id="mainImage" data-zoom-image="{{ asset('/assets/upload/prod/' . $product->img) }}">
                            </a>
                        </div>
                        <div class="product-additional image">
                            <div id="additional-carousel" class="slick-carousel clearfix slick-initialized slick-slider">
                                <div class="slick-list draggable">
                                    <div class="slick-track" style="opacity: 1; width: 297px; transform: translate3d(0px, 0px, 0px);">
                                        @foreach($product->galleries as $gallery)
                                        <div class="image-additional slick-slide slick-current slick-active" style="width: 99px;" data-slick-index="0" aria-hidden="false">
                                            <a href="javascript:void(0);" title="{{$product->name}}" class="gallery-thumb" data-image="{{ asset('/assets/upload/gallery/' . $gallery->photo) }}">
                                                <img loading="lazy" src="{{ asset('/assets/upload/gallery/' . $gallery->photo) }}" title="{{$product->name}}" alt="{{$product->name}}" width="100" height="100" class="img-thumbnail">
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm right_info">
                    <h1>{{$product->name}}</h1>
                    <div class="rating clearfix">
                        <div class="product-rating">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <=round($averageRating))
                                <span class="fa-stack"><i class="fa-solid fa-star fa-stack-1x text-warning"></i></span>
                                @else
                                <span class="fa-stack"><i class="fa-regular fa-star fa-stack-1x"></i></span>
                                @endif
                                @endfor
                        </div>

                        <span class="align-middle">
                            <a href="#" class="review-link">{{$reviewCount}} reviews</a> |
                            <a href="#" class="review-link">Write a review</a>
                        </span>
                    </div>
                    <hr>
                    <ul class="list-unstyled">
                        <li><span class="disc">Brand:</span> <a href="{{ route('catProduct', ['name' => $formattedName]) }}" class="disc1">{{$product->category->name}}</a></li>
                        <li><span class="disc">Product Code:</span> <span class="disc1">Product {{$product->id}}</span></li>
                        <li><span class="disc">Availability:</span> <span class="disc1">{{$product->stock > 0 ? 'In Stock' : 'Out of Stock'}} ({{$product->stock}})</span></li>
                    </ul>
                    <hr>
                    <ul class="list-unstyled">
                        <li>
                            <h2><span class="price-new">{{$product->price}} AED / Meter</span></h2>
                        </li>
                    </ul>
                    <div id="product">
                        <form id="form-product">
                            <div class="clearfix mb-3">
                                <label for="input-quantity1" class="form-label control-label qty">Qty</label>
                                <div class="product-btn-quantity">
                                    <div class="minus-plus">
                                        <button type="button" class="minus1"><i class="fa fa-minus"></i></button>
                                        <input type="text" name="quantity" value="1" size="2" id="input-quantity1" class="form-control">
                                        <button type="button" class="plus1"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <div id="error-quantity" class="form-text"></div>
                            </div>
                            <div class="clearfix mb-3">
                                <button type="submit" id="button-cart" class="btn btn-primary btn-lg btn-block addcart">Add to Cart</button>

                                <div class="btn-group">
                                    <button type="button" title="Add to Wish List" class="wishlist-button" data-id="{{ $product->id }}">
                                        <i class="icon-heart"></i>
                                    </button>
                                    <button type="submit" data-bs-toggle="tooltip" class="btn btn-light" title="Compare this Product"><i class="icon-change"></i></button>
                                </div>
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="propage-tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation"><a href="#tab-description" data-bs-toggle="tab" class="nav-link active" aria-selected="true" role="tab">Description</a></li>
                    <li class="nav-item" role="presentation"><a href="#tab-review" data-bs-toggle="tab" class="nav-link" aria-selected="false" tabindex="-1" role="tab">Reviews ({{$reviewCount}})</a></li>
                </ul>
                <div class="tab-content">
                    <div id="tab-description" class="tab-pane fade show active mb-4" role="tabpanel">
                        <p>{!!$product->description!!}</p>
                    </div>
                    <div id="tab-review" class="tab-pane fade mb-4" role="tabpanel">
                        <form id="form-review">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div id="review">
                                <p class="text-center">There are {{$reviewCount}} reviews for this product.</p>
                            </div>
                            <h2>Write a review</h2>
                            <div class="mb-3 required">
                                <label for="input-name" class="form-label">Your Name</label>
                                <input type="text" name="name" id="input-name" class="form-control">
                                <div id="error-name" class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3 required">
                                <label for="input-text" class="form-label">Your Review</label>
                                <textarea name="review" rows="5" id="input-text" class="form-control"></textarea>
                                <div id="error-text" class="invalid-feedback"></div>
                                <div class="invalid-feedback"><span class="text-danger">Note:</span> HTML is not translated!</div>
                            </div>
                            <div class="row mb-3 required">
                                <label class="form-label">Rating</label>
                                <div id="input-rating">
                                    Bad&nbsp;
                                    <input type="radio" name="rating" value="1" class="form-check-input">
                                    &nbsp;
                                    <input type="radio" name="rating" value="2" class="form-check-input">
                                    &nbsp;
                                    <input type="radio" name="rating" value="3" class="form-check-input">
                                    &nbsp;
                                    <input type="radio" name="rating" value="4" class="form-check-input">
                                    &nbsp;
                                    <input type="radio" name="rating" value="5" class="form-check-input">
                                    &nbsp;Good
                                </div>
                                <div id="error-rating" class="invalid-feedback"></div>
                            </div>

                            <button type="submit" id="button-review" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="related-products-block box">
            <div class="box-content">
                <div class="page-title">
                    <h3>Related Products</h3>
                </div>
                <div class="block_box row category-row">
                    <div id="related-carousel" class="box-product row product-carousel clearfix slick-theme slick-initialized slick-slider" data-items="4"><button type="button" class="slick-prev slick-arrow slick-disabled" aria-disabled="true" style=""><i class="fa fa-angle-left"></i></button>
                        <div class="slick-list draggable">
                            <div class="slick-track" style="opacity: 1; width: 2744px; transform: translate3d(0px, 0px, 0px);">
                                @foreach($relatedProducts as $index => $related)
                                <div class="col col-12 slick-slide slick-current slick-active" style="width: 343px;" data-slick-index="{{$index}}" aria-hidden="false" tabindex="{{$index}}">
                                    <div class="product-layout">
                                        <form class="clearfix" method="post">
                                            <div class="product-thumb clearfix transition">
                                                <div class="image">
                                                   
                                                    <a href="{{ route('product-detail', $product->id) }}" tabindex="{{$index}}">
                                                        <img loading="lazy" src="{{ asset('/assets/upload/prod/' . $related->img) }}" alt="{{ $related->name }}" title="{{ $related->name }}" class="img-fluid">
                                                        <img class="img-fluid hover-img" src="{{ asset('/assets/upload/prod/' . $related->img) }}" title="{{ $related->name }}" alt="{{ $related->name }}">
                                                    </a>
                                                    <button type="submit" class="addcart" title="Add to Cart">Add to Cart</button>
                                                </div>
                                                <div class="content thumb-description clearfix">
                                                    <div class="caption">
                                                        <h4 class="product-title"><a href="{{ route('product-detail', $formattedName) }}" tabindex="{{$index}}">{{ $related->name }}</a></h4>
                                                        <div class="price">
                                                            <span class="price-new">{{ $related->price }} AED / Meter</span>
                                                        </div>
                                                        <p class="description">{{ Str::limit($related->description, 100) }}</p>
                                                        <div class="button-group">
                                                            <button type="button" title="Add to Wish List" class="wishlist-button" data-id="{{ $related->id }}">
                                                                <i class="icon-heart"></i>
                                                            </button>
                                                            <button type="button" title="Quickview" class="quickview-button" data-id="{{ $related->id }}"><i class="icon-eye"></i></button>
                                                            <button type="button" title="Compare this Product" class="compare-button" data-id="{{ $related->id }}">
                                                                <i class="icon-change"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="product_id" value="{{ $related->id }}" tabindex="{{$index}}">
                                                <input type="hidden" name="quantity" value="1" tabindex="{{$index}}">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div><button type="button" class="slick-next slick-arrow" aria-disabled="false"><i class="fa fa-angle-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    $(document).ready(function() {
        $(".gallery-thumb").click(function() {
            var mainImage = $("#mainImage");
            var clickedImage = $(this).find("img");

            // Swap images
            var mainSrc = mainImage.attr("src");
            mainImage.attr("src", $(this).data("image"));
            clickedImage.attr("src", mainSrc);
        });
    });
    $(document).ready(function() {
        $(".review-link").click(function(e) {
            e.preventDefault();

            // Tab open karein
            $('a[href="#tab-review"]').tab('show');

            // Smooth scroll karein review section tak
            $('html, body').animate({
                scrollTop: $("#tab-review").offset().top - 100 // 100px space rakhen header ke liye
            }, 800);
        });
    });

    $(document).ready(function() {
        $('#form-review').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('submit.review') }}",
                type: "POST",
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(response) {
                    alert(response.success);
                    $('#form-review')[0].reset();
                },
                error: function(xhr) {
                    alert("Error! Please fill all fields correctly.");
                }
            });
        });
    });
    $(document).ready(function() {
        $(".minus1").click(function() {
            let input = $("#input-quantity1");
            let value = parseInt(input.val());

            if (value > 1) {
                input.val(value - 1).change(); // Value update karna + trigger change event
            }
        });

        $(".plus1").click(function() {
            let input = $("#input-quantity1");
            let value = parseInt(input.val());

            input.val(value + 1).change(); // Value update karna + trigger change event
        });

        // Ensure input value updates properly
        $("#input-quantity1").on("change", function() {
            $(this).attr("value", $(this).val()); // Input ki actual value update karna
        });
    });
    $(document).ready(function() {
        // Initialize Magnifier on Main Image
        function initializeZoom() {
            $("#mainImage").elevateZoom({
                zoomType: "lens",
                lensShape: "round",
                lensSize: 200,
                scrollZoom: true
            });
        }

        initializeZoom(); // Run on page load

        // Change Main Image on Thumbnail Click
        $(".gallery-thumb").on("click", function() {
            let newImage = $(this).attr("data-image"); // Get new image path

            // Remove Previous Zoom Instance
            $('.zoomContainer').remove(); // Remove zoom container
            $("#mainImage").removeData('elevateZoom').removeData('zoomImage'); // Clear zoom data

            // Update Main Image
            $("#mainImage").attr("src", newImage).attr("data-zoom-image", newImage);

            // Reinitialize Elevate Zoom with new image
            initializeZoom();
        });
    });
</script>
@endsection
