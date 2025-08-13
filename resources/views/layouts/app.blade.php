<!DOCTYPE html>
<html lang="en">

<head>
   @include('layouts.header_scripts')
    @yield('structured-data')
</head>

<body class="common-home">

    <!-- Preloader start -->
    <!-- <div id="preloader"></div> -->

    <!-- Header Start -->
   @include('layouts.header')
 
    <!-- Hero Start -->

    <!-- Team Two Start -->
    @yield('content')

    <!-- Footer Start -->
   @include('layouts.footer')

   @include('layouts.footer_scripts')
   
</body>
</html>