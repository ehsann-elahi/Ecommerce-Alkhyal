<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link href="{{asset('assets/admin/css/themes/lite-purple.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/admin/images/favicon/2.png')}}" rel="icon">

</head>

<div class="auth-layout-wrap" style="background-image: url(../assets/admin/images/photo-wide-4.jpg)">
    <div class="auth-content">
        <div class="card o-hidden">
            <div class="row">
                <div class="col-md-12">
                    <div class="p-4">
                       
                        <p class="mb-3 text-18">Welcome To Admin Panel </p>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form method="post" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input class="form-control form-control-rounded" id="email" type="email" required name="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control form-control-rounded" id="password" type="password" required name="password">
                            </div>
                            <button type="submit" class="btn btn-rounded btn-primary btn-block mt-3 mb-3">Sign In</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>