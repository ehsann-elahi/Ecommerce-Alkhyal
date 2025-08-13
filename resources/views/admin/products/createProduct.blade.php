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
            <h1 class="mr-2">ADD Product</h1>
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
                    <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data" id="form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3 px-0">
                                    <label>Category</label>
                                    <select class="form-control form-control-rounded" name="category_id" required>
                                        <option value="">Choose</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option> <!-- Assuming 'name' is the category field -->
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Name</label>
                                    <input class="form-control" type="text" name="name" placeholder="Enter Product Name">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Meta Title</label>
                                    <input class="form-control" type="text" name="title" placeholder="Enter Meta Title">
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label for="meta_description">Meta Description <small>(Max: 150 characters)</small></label>
                                    <textarea
                                        class="form-control"
                                        name="meta_description"
                                        id="meta_description"
                                        placeholder="Enter Meta Description"
                                        maxlength="150"
                                        rows="3">{{ old('meta_description', $product->meta_description ?? '') }}</textarea>
                                    <small id="charCount" class="form-text text-muted">0 / 150 characters</small>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Slug Product</label>
                                    <input class="form-control" type="text" name="slug" placeholder="Enter Meta Title">
                                </div>

                                <div class="form-group mb-3 px-0">
                                    <label>Price</label>
                                    <input class="form-control" type="number" name="price" placeholder="Enter Price">
                                </div>
                                <div class="form-group mb-3 px-0">
                                    <label>Stock</label>
                                    <input class="form-control" type="number" name="stock" placeholder="Enter Stock">
                                </div>
                                <div class="form-group mb-3 px-0">
                                    <label>Type</label>
                                    <select class="form-control form-control-rounded" name="type">
                                        <option value="">Default</option>
                                        <option value="Featured">Featured</option>
                                        <option value="Latest">Latest</option>
                                        <option value="Special">Special</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label class="control-label" for="current_photo">Current
                                                Icon</label>
                                            <div class="col-md-8 text-center">
                                                <img id="adminimg3" src="{{asset('assets/admin/images/noimage.png')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-8 p-0">
                                                <input type="file" id="uploadFile3" class="hidden" name="img" value="" required style="display: none!important;">
                                                <button type="button" id="uploadTrigger3" onclick="uploadclick3()" class="form-control"><i
                                                        class="fa fa-download"></i> Choose
                                                    Image</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="control-label col" for="profile_photo">Product Gallery Images *<span></span></label>
                                            <div class="col">
                                                <input style="display: none;" type="file" accept="image/*" id="uploadgallery" name="gallery[]" multiple />
                                                <div class="margin-top">
                                                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal1"><i class="fa fa-plus"></i> Set Gallery</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group mb-3">
                                    <label>Description</label>
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="col-3 ml-3 btn btn-primary btn-block btn-rounded mt-3" style="float: inline-end;">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallry Modal1 -->
    <div id="myModal1" class="modal fade gallery" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center">Image Gallery</h4>
                </div>
                <div class="modal-body">
                    <div class="gallery-btn-area text-center">
                        <a style="cursor: pointer;color:#fff" class="btn btn-info gallery-btn mr-5" id="prod_gallery"><i class="fa fa-download"></i> Upload Images</a>
                        <a style="cursor: pointer; background: #009432;color:#fff" class="btn btn-info gallery-btn mr-5" data-dismiss="modal"><i class="fa fa-check"></i> Done</a>
                        <p style="font-size: 11px;">You can upload multiple images.</p>
                    </div>

                    <div class="gallery-wrap" id="gallery-wrap1">
                        <div class="row">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endsection
    @section('scripts')
    <script>
        CKEDITOR.replace('description', {
            fullPage: true
        });

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

        $(document).on('click', '#prod_gallery', function() {
            $('#uploadgallery').click();
            $('#gallery-wrap1 .row').html('');
            $('#form').find('.removegal1').val(0);
        });
        $("#uploadgallery").change(function() {
            var total_file = document.getElementById("uploadgallery").files.length;
            for (var i = 0; i < total_file; i++) {
                $('#gallery-wrap1 .row').append('<div class="col-sm-4">' +
                    '<div class="gallery__img">' +
                    '<img src="' + URL.createObjectURL(event.target.files[i]) + '" alt="gallery image">' +
                    '<div class="gallery-close close1">' +
                    '<input type="hidden" value="' + i + '">' +
                    '<i class="fa fa-close"></i>' +
                    '</div>' +
                    '</div>' +
                    '</div>');
                $('#form').append('<input type="hidden" name="galval[]" id="galval1' + i + '" class="removegal1" value="' + i + '">')
            }

        });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const textarea = document.getElementById('meta_description');
        const counter = document.getElementById('charCount');

        if (textarea) {
            const updateCount = () => {
                const length = textarea.value.length;
                counter.textContent = `${length} / 150 characters`;
            };

            textarea.addEventListener('input', updateCount);
            updateCount(); // Initial update
        }
    });
</script>

    @endsection