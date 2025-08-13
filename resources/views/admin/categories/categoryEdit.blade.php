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
            <h1 class="mr-2">Edit Category</h1>
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
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title mb-3">Update</div>
                    <form method="post" action="{{ route('category.update',$categories->id)}}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        {{csrf_field()}}
                        <div class="form-group mb-3">
                            <label for="lastName1">Name</label>
                            <input class="form-control" type="text" name="name" value="{{$categories->name}}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="lastName1">Description</label>
                            <input class="form-control" type="text" name="description" value="{{$categories->description}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="current_photo">Current Image</label>
                            <div class="col-md-8 text-center">
                                <img id="adminimg3" src="{{ asset('assets/upload/cate/' . $categories->img) }}" alt="Category Image" width="100">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 p-0">
                                <input type="file" id="uploadFile3" class="hidden" name="img" value="" style="display: none!important;">
                                <button type="button" id="uploadTrigger3" onclick="uploadclick3()" class="form-control">
                                    <i class="fa fa-download"></i> Choose Image
                                </button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-rounded mt-3">Update</button>
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
                // Check if any file is selected.
                if (fi.files.length > 0) {
                    for (const i = 0; i <= fi.files.length - 1; i++) {

                        const fsize = fi.files.item(i).size;
                        const file = Math.round((fsize / 1024));
                        // The size of the file.
                        if (file > 2000) {
                            alert(
                                "File too Big, please select a file less than 2mb");
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