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
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Left side: Inputs -->
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="cate_name">Category Name</label>
                                    <input class="form-control" type="text" name="name" placeholder="Enter Category name" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="cate_description">Description</label>
                                    <input class="form-control" type="text" name="description" placeholder="Enter Category description">
                                </div>
                            </div>

                            <!-- Right side: Image preview and upload -->
                            <div class="col-md-6 text-center">
                                <div class="form-group mb-3">
                                    <label for="current_photo">Current Icon</label>
                                    <div class="mb-3">
                                        <img id="adminimg3" src="{{ asset('assets/admin/images/noimage.png') }}" alt="Preview Image" class="img-fluid" style="max-height: 200px;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="file" id="uploadFile3" name="img" style="display:none;" required>
                                    <button type="button" id="uploadTrigger3" onclick="uploadclick3()" class="btn btn-outline-primary">
                                        <i class="fa fa-download"></i> Choose Image
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 justify-content-end">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary btn-block btn-rounded">Create</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ============ Body content start ============= -->
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Category</h1>
            <div id="msg">
                @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
                @if (session('message1'))
                <div class="alert alert-danger">
                    {{ session('message1') }}
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="card o-hidden mb-4">
                        <div class="card-header d-flex align-items-center border-0">
                            <h3 class="w-50 float-left card-title m-0"></h3>
                            <div class="dropdown dropleft text-right w-50 float-right">
                                <a href=""><button class="btn bg-gray-100"></button></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display table table-hover table-bordered" id="zero_configuration_table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cat as $category)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->description}}</td>
                                            <td class="text-center">
                                                @if($category->img)
                                                <img loading="lazy" src="{{ asset('assets/upload/cate/' . $category->img) }}" alt="{{ $category->name }}" width="100">
                                                @else
                                                <span>No Image</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a class="text-success mr-2" href="{{route('category.edit',$category->id)}}"><i class="nav-icon i-Pen-2 font-weight-bold" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                                                <a class="text-danger mr-2" href="#"><i class="nav-icon i-Close-Window font-weight-bold" data-toggle="modal" data-target=".bd-example-modal-lg1{{$category->id}}" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                                            </td>
                                        </tr>
                                        <div class="modal fade bd-example-modal-lg1{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <form method="POST" action="{{route('category.destroy',$category->id)}}">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content p-3">
                                                        <div class="card-title" id="todo-list-validate">Confirm</div>
                                                        <div>
                                                            <h1>Delete</h1>
                                                            <p>Are you sure you want to delete your data?</p>
                                                            <button class="btn btn-danger" type="submit">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
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