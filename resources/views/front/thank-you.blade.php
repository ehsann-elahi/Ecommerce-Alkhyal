@extends('layouts.app')
@section('title','Curtain Cart - Buy Online curtain in Dubai & Abu Dhabi')
@section('description','We made curtain buying online process in Dubai & Abu Dhabi quite easy and simple, We bring the whole curtain shop at your doorstep. We are dedicated team of curtain professionals who can visit your place to give you initial estimate, free of cost.')
@section('og:description','We made curtain buying online process in Dubai & Abu Dhabi quite easy and simple, We bring the whole curtain shop at your doorstep. We are dedicated team of curtain professionals who can visit your place to give you initial estimate, free of cost.')
@section('og:title','Curtain Cart - Buy Online curtain in Dubai & Abu Dhabi')
@section('og:url', 'https://alkhyalcurtain.ae/thank-you')
@section('canonical', url()->current())
@section('content')
<div class="container text-center mt-5">
    <h1>Thank You for Your Order!</h1>
    <p>Your order has been placed successfully.</p>
    
    @if(session('order_number'))
        <p><strong>Order Number:</strong> {{ session('order_number') }}</p>
    @endif
    
    <a href="{{ route('index') }}" class="btn btn-primary">Go to Home</a>
</div>
@endsection
