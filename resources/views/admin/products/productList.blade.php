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
@section('styles')
<style>
    @media print {
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td,
        th {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: center;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
    }
</style>

@endsection
@section('content')
@include('layouts.admin_sidebar')
<!-- =============== Left side End ================-->
<div class="main-content-wrap sidenav-open d-flex flex-column">
    <!-- ============ Body content start ============= -->
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Products</h1>

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
                                <a href="{{ route('product.create') }}"><button class="btn bg-gray-100"><i class="nav-icon i-Add"></i>Add new Product</button></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display table table-hover table-bordered" id="zero_configuration_table1" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>SR#</th>
                                            <th>Category</th>
                                            <th>Name</th>
                                            <th>PriceList</th>
                                            <th>Type</th>
                                            <th>Image</th>
                                            <th>Gallery</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$product->category->name}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>
                                                @if(isset($product->type))
                                                {{$product->type}}
                                                @else
                                                Default
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($product->img)
                                                <img loading="lazy" src="{{ asset('assets/upload/prod/' . $product->img) }}" alt="{{ $product->name }}" width="100">
                                                @else
                                                <span>No Image</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($product->galleries->isNotEmpty())
                                                @foreach($product->galleries as $gallery)
                                                <img loading="lazy" src="{{ asset('assets/upload/gallery/' . $gallery->photo) }}" alt="Gallery Image" width="50">
                                                @endforeach
                                                @else
                                                <span>No Galleries Image</span>
                                                @endif
                                            </td>
                                            <td>{!!$product->description!!}</td>
                                            <td>
                                                <a class="text-success mr-2" href="{{route('product.edit',$product->id)}}"><i class="nav-icon i-Pen-2 font-weight-bold" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                                                <a class="text-danger mr-2" href="#"><i class="nav-icon i-Close-Window font-weight-bold" data-toggle="modal" data-target=".bd-example-modal-lg1{{$product->id}}" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                                            </td>
                                        </tr>
                                        <div class="modal fade bd-example-modal-lg1{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <form method="POST" action="{{route('product.destroy',$product->id)}}">
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