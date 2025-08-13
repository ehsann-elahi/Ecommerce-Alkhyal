@push('admin_footer')
    @if (session('message'))
        <script>
            setTimeout(function(){
                let msg = document.getElementById('msg');
                msg.style.display = 'none';
            }, 9000);
        </script>
    @endif

@endpush
@extends('layouts.admin_app')

@section('content')

       
    @include('layouts.admin_sidebar')
        <!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1 class="mr-2">Profile</h1>
                    
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="p-4">
                            @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                        @endif
                        
                        </div>
                            <h1 class="mb-3 text-18">Change Password</h1>
                            <form method="post" action="{{ route('adminupdatepassword') }}">
                                @csrf
                               
                                <div class="form-group">
                                    <label for="password">Old Password</label>
                                    <input class="form-control form-control-rounded" id="password" type="password" required name="old_password">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="repassword">New Password</label>
                                    <input class="form-control form-control-rounded" id="repassword" type="password"  required name="new_password">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="repassword">Confirm Password</label>
                                    <input class="form-control form-control-rounded" id="repassword" type="password"  required name="new_password_confirmation">
                                    
                                </div>
                                <button type="submit" class="btn btn-primary btn-block btn-rounded mt-3">Update</button>
                            </form>
                        </div>
                    </div>

                    
                </div>
            
@endsection