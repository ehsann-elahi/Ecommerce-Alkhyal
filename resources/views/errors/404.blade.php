@extends('layouts.app')

@section('title', 'Page Not Found | ' . config('app.name'))

@section('meta_description', 'The page you’re looking for doesn’t exist. Try our popular pages or search our site.')

@section('content')
<section class="py-5 text-center">
    <h1 class="display-5 fw-bold">404 – Page Not Found</h1>
    <p class="lead mb-4">Oops! We can’t find that page. Try these links or search below.</p>

    <div class="d-flex justify-content-center gap-2 mb-4">
        <a class="btn btn-outline-secondary" href="{{ url('/') }}">Home</a>
        <a class="btn btn-outline-secondary" href="{{ url('/ourProduct') }}">Services</a>
       
    </div>

   

    <p class="text-muted mt-4">If you typed the URL, please check the spelling.</p>
</section>

{{-- Optional: GA4 event for 404s --}}
@if(config('app.env') === 'production')
<script>
  if (window.gtag) {
    gtag('event', 'page_404', {
      page_location: window.location.href,
      page_referrer: document.referrer || 'Direct/None'
    });
  }
</script>
@endif
@endsection
