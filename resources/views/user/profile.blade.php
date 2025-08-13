@push('user_footer')
@if (session('message'))
<script>
    setTimeout(function() {
        let msg = document.getElementById('msg');
        msg.style.display = 'none';
    }, 9000);
</script>
@endif

@endpush
@extends('layouts.user_app')

@section('content')


@include('layouts.user_sidebar')
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
                    <div id="msg">
                        @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                        @endif
                    </div>
                    <h1 class="mb-3 text-18">Profile Setting</h1>
                    @if(!$profile)
                    <form method="post" action="{{ route('user-profile') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="username">Name</label>
                            <input class="form-control form-control-rounded" id="username" type="text" placeholder="Enter your Name" required name="name">
                        </div>
                        <div class="form-group ">
                            <label for="lastName1">Mobile Number</label>

                            <input class="form-control" id="txtPhone" type="text" placeholder="Enter your Mobile Number" name="mobile_number" onkeypress="return isNumberKey(event)" maxlength="11">
                        </div>
                        <div class="form-group">
                            <label for="lastName1">Address</label>
                            <input class="form-control" id="lastName1" type="text" placeholder="Enter your Address" name="address">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input class="form-control form-control-rounded" id="email" type="email" placeholder="Enter your Email" required name="email">
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12" for="current_photo">Current
                                Image</label>
                            <div class="col-md-6" style="margin: auto;">
                                <img id="adminimg3" src="{{asset('assets/admin/images/noimage.png')}}" alt="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 p-0">
                                <input type="file" id="uploadFile3" class="hidden" required name="image" value="" style="display: none!important;">
                                <button type="button" id="uploadTrigger3" onclick="uploadclick3()" class="form-control"><i class="fa fa-download"></i> Choose
                                    Image</button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-rounded mt-3">Save</button>
                    </form>
                    @else
                    <form method="post" action="{{ route('userprofileupdate') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="username">Name</label>
                            <input class="form-control form-control-rounded" value="{{$profile->name}}" id="username" type="text" placeholder="Enter your Name" name="name">
                        </div>
                        <div class="form-group ">
                            <label for="lastName1">Mobile Number</label>

                            <input class="form-control" id="txtPhone" type="text" value="{{$profile->mobile_number}}" placeholder="Enter your Mobile Number" name="mobile_number" onkeypress="return isNumberKey(event)" maxlength="11">
                        </div>
                        <div class="form-group">
                            <label for="lastName1">Address</label>
                            <input class="form-control" id="lastName1" type="text" placeholder="Enter your Address" value="{{$profile->address}}" name="address">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input class="form-control form-control-rounded" id="email" type="email" value="{{$profile->email}}" placeholder="Enter your Email" name="email">
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12" for="current_photo">Current
                                Image</label>
                            <div class="col-md-6" style="margin: auto;">
                                @if ($profile->image)
                                <img id="adminimg3" src="{{ asset('assets/upload/profile/' . $profile->image) }}" alt="">
                                @else
                                <img id="adminimg3" src="{{ asset('assets/admin/images/noimage.png') }}" alt="">
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 p-0">
                                <input type="file" id="uploadFile3" class="hidden"  name="image" value="" style="display: none!important;">
                                <button type="button" id="uploadTrigger3" onclick="uploadclick3()" class="form-control"><i class="fa fa-download"></i> Choose
                                    Image</button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-rounded mt-3">Update</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>

        <script>
            function readURL3(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#adminimg3').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            function uploadclick3() {
                $("#uploadFile3").click();
                $("#uploadFile3").change(function(event) {
                    const fi = document.getElementById('uploadFile3');
                    // Check if any file is selected.
                    if (fi.files.length > 0) {
                        for (const i = 0; i <= fi.files.length - 1; i++) {

                            const fsize = fi.files.item(i).size;
                            const file = Math.round((fsize / 1024));
                            // The size of the file.
                            if (file > 9000) {
                                alert(
                                    "File too Big, please select a file less than 9mb");
                            } else {
                                readURL3(this);
                                $("#uploadTrigger3").html($("#uploadFile3").val());
                            }
                        }
                    }

                });
            }
        </script>
        @endsection