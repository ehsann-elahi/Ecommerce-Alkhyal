<!DOCTYPE html>
<html lang="en">

<head>
   @include('layouts.user_header_scripts')
</head>

<body>

    <!-- Preloader start -->
    <!-- <div id="preloader"></div> -->

    <!-- Header Start -->
   @include('layouts.user_header')
 
    <!-- Hero Start -->

    <!-- Team Two Start -->
    @yield('content')

    <!-- Footer Start -->
   @include('layouts.user_footer')

   @include('layouts.user_footer_scripts')
   
</body>
</html>