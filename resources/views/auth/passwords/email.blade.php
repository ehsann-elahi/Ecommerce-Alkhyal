@extends('layouts.app')
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
                    <div class="col-6 mx-auto mb-3">
                        <div class="border rounded p-3 d-flex flex-column h-100">
                            <form method="post" action="{{ route('password.email') }}">
                                @csrf
                                <h2>Reset Password</h2>
                                <div class="mb-3">
                                    <label for="input-email" class="col-form-label">E-Mail Address</label>
                                    <input type="email" id="email" name="email" value="" placeholder="E-Mail Address" id="input-email" class="form-control">
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection