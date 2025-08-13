@extends('layouts.app')
@section('title','Curtain Cart - Buy Online curtain in Dubai & Abu Dhabi')
@section('description','We made curtain buying online process in Dubai & Abu Dhabi quite easy and simple, We bring the whole curtain shop at your doorstep. We are dedicated team of curtain professionals who can visit your place to give you initial estimate, free of cost.')
@section('og:description','We made curtain buying online process in Dubai & Abu Dhabi quite easy and simple, We bring the whole curtain shop at your doorstep. We are dedicated team of curtain professionals who can visit your place to give you initial estimate, free of cost.')
@section('og:title','Curtain Cart - Buy Online curtain in Dubai & Abu Dhabi')
@section('og:url', 'https://alkhyalcurtain.ae/login')
@section('canonical', url()->current())
@section('content')
<main>
    <div id="account-login" class="container">
        <ul class="breadcrumb">
            <li class="">
                <a href="{{route('index')}}">
                    <i class="fas fa-home"></i>
                </a>
            </li>
            <li class="">
                Account
            </li>
            <li class="">
                <a href="{{route('login')}}"> Login </a>
            </li>
        </ul>
        <div class="row">
            <div id="content" class="col">
                <div class="row">
                    <div class="col mb-3">
                        <div class="border rounded p-3 d-flex flex-column h-100">
                            <h2>New Customer</h2>
                            <p><strong>Register Account</strong></p>
                            <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                            <div class="text-end">
                                <a href="{{route('register_user')}}" class="btn btn-primary">Continue</a>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="border rounded p-3 d-flex flex-column h-100">
                            <form method="post" action="{{ route('user.login') }}">
                                @csrf
                                <h2>Returning Customer</h2>
                                <p><strong>I am a returning customer</strong></p>
                                <div class="mb-3">
                                    <label for="input-email" class="col-form-label">E-Mail Address</label>
                                    <input type="text" name="email" value="" placeholder="E-Mail Address" id="input-email" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="input-password" class="col-form-label">Password</label>
                                    <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control mb-1">
                                    <a href="{{ route('password.request') }}">Forgotten Password</a>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection