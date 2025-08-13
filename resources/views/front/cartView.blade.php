@extends('layouts.app')
@section('title','Curtain Cart - Buy Online curtain in Dubai & Abu Dhabi')
@section('description','We made curtain buying online process in Dubai & Abu Dhabi quite easy and simple, We bring the whole curtain shop at your doorstep. We are dedicated team of curtain professionals who can visit your place to give you initial estimate, free of cost.')
@section('og:description','We made curtain buying online process in Dubai & Abu Dhabi quite easy and simple, We bring the whole curtain shop at your doorstep. We are dedicated team of curtain professionals who can visit your place to give you initial estimate, free of cost.')
@section('og:title','Curtain Cart - Buy Online curtain in Dubai & Abu Dhabi')
@section('styles')
<style>
    #checkout-cart .img-thumbnail {
        height: 80px;
    }
</style>
@endsection
@section('content')
<div id="product-category" class="container">
    <ul class="breadcrumb">
        <li>
            <a href="{{route('index')}}">
                <i class="fas fa-home"></i>
            </a>
        </li>
        <li>
            <a href="">Shopping Cart </a>
        </li>
    </ul>
    <div id="checkout-cart" class="container">
        <div class="row">
            <aside id="column-left" class="col-12 col-lg-3 d-none d-md-block">
                <div class="sidebar">
                    <div class="box-content">
                        <h3 class="box-content toggled">Information</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="{{route('about')}}">About Us</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </aside>
            <div id="content" class="col">
                <div id="shopping-cart">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td class="text-center">Image</td>
                                    <td class="text-start">Product Name</td>
                                    <td class="text-start">Model</td>
                                    <td class="text-start">Quantity</td>
                                    <td class="text-end">Unit Price</td>
                                    <td class="text-end">Total</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $id => $product)
                                <tr>
                                    <td class="text-center">
                                        <a href="#"><img loading="lazy" src="{{ asset('/assets/upload/prod/' . $product['image']) }}" alt="" title="" class="img-thumbnail"></a>
                                    </td>
                                    <td class="text-start text-wrap"><a href="{{ route('product-detail', $id) }}">{{ $product['name'] }}</a></td>
                                    <td class="text-start">Product {{ $id }}</td>
                                    <td class="text-start">
                                        <form action="{{ route('cart.update') }}" method="POST">
                                            @csrf
                                            <div class="input-group">
                                                <input type="hidden" name="product_id" value="{{ $id }}">
                                                <input type="number" name="quantity" value="{{ $product['quantity'] }}" min="1" class="form-control">
                                                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-rotate"></i></button>
                                                <button class="btn btn-danger remove-from-cart" data-id="{{ $id }}"><i class="fa-solid fa-circle-xmark"></i></button>
                                            </div>
                                        </form>
                                    </td>
                                    <td class="text-end">{{ number_format($product['price'], 2) }} AED</td>
                                    <td class="text-end">{{ number_format($product['price'] * $product['quantity'], 2) }} AED</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot id="checkout-total">
                                <tr>
                                    <td colspan="5" class="text-end"><strong>Sub-Total</strong></td>
                                    <td class="text-end">{{ number_format(collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']), 2) }} AED</td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-end"><strong>Total</strong></td>
                                    <td class="text-end">{{ number_format(collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']), 2) }} AED</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col"><a href="{{route('index')}}" class="btn btn-primary">Continue Shopping</a></div>
                    <div class="col text-end"><a href="{{route('checkout')}}" class="btn btn-primary">Checkout</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection