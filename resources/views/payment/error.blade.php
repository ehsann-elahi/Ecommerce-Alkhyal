@extends('layouts.app')

@section('content')
<div class="container text-center py-5">
    <h1 class="text-danger display-4">
        ❌ Payment Failed
    </h1>

    <p class="text-muted">{{ $message ?? 'Something went wrong with your payment.' }}</p>

    @if(isset($payment['status']))
        <p><strong>Status:</strong> {{ strtoupper($payment['status']) }}</p>
    @endif

    @if(isset($payment['id']))
        <p><strong>Transaction ID:</strong> {{ $payment['id'] }}</p>
    @endif

    @if(isset($payment['response']['code']))
        <p><strong>Error Code:</strong> {{ $payment['response']['code'] }}</p>
    @endif

    <a href="{{ route('payment.pay') }}" class="btn btn-primary mt-4">🔁 Try Again</a>
</div>
@endsection
