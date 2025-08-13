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
@section('content')
@include('layouts.admin_sidebar')
<!-- =============== Left side End ================-->
<div class="main-content-wrap sidenav-open d-flex flex-column">
    <!-- ============ Body content start ============= -->
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">ADD Promotion Banner</h1>
            <div id="msg">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form method="post" action="{{ route('promotion.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Redirection Link</label>
                                    <input type="url" name="redirect_link" class="form-control"
                                        value="{{ old('redirect_link', $promotion->redirect_link ?? '') }}">
                                </div>
                                <div class="form-group p-3">
                                    <label class="switch">
                                        <input type="checkbox" name="is_active" data-toggle="toggle"
                                            {{ isset($promotion) && $promotion->is_active ? 'checked' : '' }}>
                                        <span class="slider round"></span>
                                    </label>
                                    Enable Popup
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" for="current_photo">Current
                                        Icon</label>
                                    <div class="col-md-4">
                                        <img id="adminimg3" src="{{ isset($promotion) && $promotion->image ? asset('storage/' . $promotion->image) : asset('assets/admin/images/noimage.png') }}" alt="Promotion Image" width="150px">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4 p-0">
                                        <input type="file" id="uploadFile3" class="hidden" name="image" value="" style="display: none!important;">
                                        <button type="button" id="uploadTrigger3" onclick="uploadclick3()" class="form-control"><i
                                                class="fa fa-download"></i> Choose
                                            Image</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Video Upload -->
                                <div class="form-group">
                                    <label>Promotion Video</label>
                                    <input type="file" name="video" class="form-control" accept="video/mp4">
                                    @if(isset($promotion->video_path))
                                    <video width="300" controls class="mt-2">
                                        <source src="{{ Storage::url($promotion->video_path) }}" type="video/mp4">
                                    </video>
                                    @endif

                                </div>


                                <button type="submit" class="btn btn-primary btn-block btn-rounded mt-3">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('scripts')
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

                if (fi.files.length > 0) {
                    for (const i = 0; i <= fi.files.length - 1; i++) {
                        const fsize = fi.files.item(i).size;
                        const file = Math.round((fsize / 1024));

                        if (file > 2000) {
                            alert("File too Big, please select a file less than 2MB");
                        } else {
                            readURL3(this);
                            $("#uploadTrigger3").html(fi.files.item(i).name); // Show file name
                        }
                    }
                }
            });
        }
    </script>

    @endsection