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
            <h1 class="mr-2">Orders</h1>

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
                                <a href="#"><button class="btn bg-gray-100"></button></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display table table-hover table-bordered" id="zero_configuration_table1" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Order Number</th>
                                            <th>Customer Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Total Price</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->order_number }}</td>
                                            <!-- Check if the order has a registered user or a guest -->
                                            <td>{{ $order->user ? $order->user->name : ($order->guest_name ?? 'Guest') }}</td>
                                            <td>{{ $order->user ? $order->user->email : ($order->guest_email ?? 'N/A') }}</td>
                                            <td>{{ $order->user ? $order->user->mobile_number : ($order->guest_phone ?? 'N/A') }}</td>
                                            <td>{{ $order->user ? $order->user->address : ($order->guest_address ?? 'N/A') }}</td>


                                            <td>{{ number_format($order->total_price, 2) }} AED</td>
                                            <td>
                                                <span class="dropdown">
                                                    <button class="btn btn-{{ $order->status == '1' ? 'success' : ($order->status == '2' ? 'danger' : ($order->status == '3' ? 'info' : 'warning')) }} product-btn dropdown-toggle btn-xs"
                                                        type="button" data-toggle="dropdown" style="font-size: 11px; padding-top: 3px; padding-bottom: 3px; margin-bottom: -10px;">
                                                        {{ $order->status == '1' ? "Approved" : ($order->status == '2' ? "Rejected" : ($order->status == '3' ? "Released" : "Waiting")) }}
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="{{ route('order-st', ['id1' => $order->id, 'id2' => '0']) }}">Waiting</a></li>
                                                        <li><a class="dropdown-item" href="{{ route('order-st', ['id1' => $order->id, 'id2' => '1']) }}">Approved</a></li>
                                                        <li><a class="dropdown-item" href="{{ route('order-st', ['id1' => $order->id, 'id2' => '2']) }}">Rejected</a></li>
                                                        <li><a class="dropdown-item" href="{{ route('order-st', ['id1' => $order->id, 'id2' => '3']) }}">Released</a></li>
                                                    </ul>
                                                </span>
                                            </td>

                                            <td>{{ $order->created_at->format('d M Y') }}</td>
                                            <td>
                                                <a class="text-danger mr-2" href="#"><i class="nav-icon i-Close-Window font-weight-bold" data-toggle="modal" data-target=".bd-example-modal-lg1{{$order->id}}" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                                            </td>
                                        </tr>
                                        <div class="modal fade bd-example-modal-lg1{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <form method="POST" action="{{route('order.destroy',$order->id)}}">
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