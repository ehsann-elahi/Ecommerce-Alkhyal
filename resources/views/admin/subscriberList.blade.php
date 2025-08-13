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
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($subscribers as $subscriber)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$subscriber->email}}</td>
                                            <td>
                                                <a class="text-danger mr-2" href="#"><i class="nav-icon i-Close-Window font-weight-bold" data-toggle="modal" data-target=".bd-example-modal-lg1{{$subscriber->id}}" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                                            </td>
                                        </tr>
                                        <div class="modal fade bd-example-modal-lg1{{$subscriber->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <form method="POST" action="{{route('subscriber.destroy',$subscriber->id)}}">
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