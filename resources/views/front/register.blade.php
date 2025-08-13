@extends('layouts.app')
@section('title','Curtain Cart - Buy Online curtain in Dubai & Abu Dhabi')
@section('description','We made curtain buying online process in Dubai & Abu Dhabi quite easy and simple, We bring the whole curtain shop at your doorstep. We are dedicated team of curtain professionals who can visit your place to give you initial estimate, free of cost.')
@section('og:description','We made curtain buying online process in Dubai & Abu Dhabi quite easy and simple, We bring the whole curtain shop at your doorstep. We are dedicated team of curtain professionals who can visit your place to give you initial estimate, free of cost.')
@section('og:title','Curtain Cart - Buy Online curtain in Dubai & Abu Dhabi')
@section('og:url', 'https://alkhyalcurtain.ae/register')
@section('canonical', 'url()->current()')
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
                <a href="{{route('register_user')}}"> Register </a>
            </li>
        </ul>
        <div class="row">
            <div id="content" class="col-6 mx-auto">
                <p>If you already have an account with us, please login at the <a href="{{route('login')}}">login page</a>.</p>
                <form id="form-register" action="{{ route('user.register') }}" method="post">
                    @csrf
                    <fieldset id="account">
                        <legend>Your Personal Details</legend>
                        <div class="row mb-3 required">
                            <label for="input-name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" value="" placeholder="Name" id="input-name" class="form-control">
                                <div id="error-name" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row mb-3 required">
                            <label for="input-email" class="col-sm-2 col-form-label">E-Mail</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" value="" placeholder="E-Mail" id="input-email" class="form-control">
                                <div id="error-email" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row mb-3 required">
                            <label for="input-mobile_number" class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-sm-10">
                                <input type="text" name="mobile_number" value="" placeholder="Phone Number" id="input-mobile_number" class="form-control">
                                <div id="error-mobile_number" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row mb-3 required">
                            <label for="input-address" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input type="text" name="address" value="" placeholder="Address" id="input-address" class="form-control">
                                <div id="error-address" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Your Password</legend>
                        <div class="row mb-3 required">
                            <label for="input-password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control">
                                <div id="error-password" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Continue</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection