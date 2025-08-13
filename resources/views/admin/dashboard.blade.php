@push('admin_footer')
@if (session('message'))
<script>
    setTimeout(function() {
        let msg = document.getElementById('msg');
        msg.style.display = 'none';
    }, 9000);
</script>
@endif
@endpush
@extends('layouts.admin_app')
@section('styles')
<style>
    .flip-card {
        background-color: transparent;
        width: 100%;
        height: 80%;
        perspective: 1000px;
    }

    .flip-card-inner {
        position: relative;
        width: 100%;
        height: 100%;
        text-align: center;
        transition: transform 0.6s;
        transform-style: preserve-3d;
    }

    .flip-card:hover .flip-card-inner {
        transform: rotateY(180deg);
    }

    .flip-card-front,
    .flip-card-back {
        position: absolute;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
        border-radius: 0.25rem;

    }

    .flip-card-front {
        background-color: inherit;
        /* Maintain the original background color */
    }

    .flip-card-back {
        background-color: inherit;
        /* Maintain the original background color */
        transform: rotateY(180deg);
    }

    @media screen and (max-width:991px) {

        .flip-card {
            height: 120px;
            /* Adjust height for mobile */
        }

        .flip-card-inner {
            transition: transform 0.8s;
        }

        */ .flip-card-front,
        .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            padding: 10px;
            font-size: 14px;
            /* Smaller text for mobile */
        }
    }
</style>
@endsection
@section('content')
@include('layouts.admin_sidebar')
<!-- =============== Left side End ================-->
<div class="main-content-wrap sidenav-open d-flex flex-column">
    <!-- ============ Body content start ============= -->
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Dashboard</h1>

        </div>
        <div id="msg">
            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="row">
            <!-- ICON BG-->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                    <a href="{{route('product.index')}}">
                        <div class="card-body text-center">
                            <i class="i-Split-Horizontal-2-Window"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0">Total Product</p>
                                <p class="text-primary text-24 line-height-1 mb-2">{{$product}}</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                    <a href="{{route('order.index')}}">
                        <div class="card-body text-center">
                            <i class="i-Checkout-Basket"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0">Total Order</p>
                                <p class="text-primary text-24 line-height-1 mb-2">{{$order}}</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="flip-card card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                    <div class="flip-card-inner">
                        <div class="flip-card-front card-icon-bg card-icon-bg-primary">
                            <div class="card-body text-center">
                                <i class="i-Money-2"></i>
                                <div class="content">
                                    <p class="text-muted mt-2 mb-0">Sales</p>
                                    <p class="text-primary text-24 line-height-1 mb-2">AED</p>
                                </div>
                            </div>
                        </div>
                        <div class="flip-card-back card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                            <a href="">
                                <div class="card-body text-center">
                                    <i class="i-Money-2"></i>
                                    <div class="content">
                                        <p class="text-muted mt-2 mb-0">Sales</p>
                                        <p class="text-primary text-24 line-height-1 mb-2">{{$sales}} AED</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection