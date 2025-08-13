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
                        <div id="msg" >
                            @if (session('message'))
                        <div class="alert alert-success" >
                            {{ session('message') }}
                        </div>  
                        @endif
                        </div>
                            <h1 class="mb-3 text-18">Profile Setting</h1>
                            @if(!$profile)
                            <form method="post" action="{{ route('profile') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="username">First Name</label>
                                    <input class="form-control form-control-rounded" id="username" type="text" required name="first_name">
                                </div>
                                <div class="form-group">
                                    <label for="username">Last Name</label>
                                    <input class="form-control form-control-rounded" id="username" type="text" required name="last_name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input class="form-control form-control-rounded" id="email" type="email" required name="email">
                                    
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input class="custom-file-input" id="inputGroupFile02" type="file" required name="img"/>
                                            <label class="custom-file-label" for="inputGroupFile02" name="image" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                        </div>
                                        <div class="input-group-append"><span class="input-group-text" id="inputGroupFileAddon02">Upload</span></div>
                                    </div>
                                  </div>
                                <button type="submit" class="btn btn-primary btn-block btn-rounded mt-3">Save</button>
                            </form>
                            @else
                            <form method="post" action="{{ route('profileupdate') }}"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="username">First Name</label>
                                    <input class="form-control form-control-rounded" value="{{$profile->first_name}}" id="username" type="text" required name="first_name">
                                </div>
                                <div class="form-group">
                                    <label for="username">Last Name</label>
                                    <input class="form-control form-control-rounded" value="{{$profile->last_name}}" id="username" type="text" required name="last_name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input class="form-control form-control-rounded" value="{{$profile->email}}" id="email" type="email" required name="email">
                                    
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input class="custom-file-input" id="inputGroupFile02" type="file" required name="img"/>
                                            <label class="custom-file-label file-upload-info" for="inputGroupFile02" name="image" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                        </div>
                                        <div class="input-group-append"><span class="input-group-text" id="inputGroupFileAddon02">Upload</span></div>
                                    </div>
                                  </div>
                                <button type="submit" class="btn btn-primary btn-block btn-rounded mt-3">Update</button>
                            </form>
                            @endif
                        </div>
                    </div>

                  
                </div>
            
@endsection