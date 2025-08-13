<!DOCTYPE html>
<html lang="en">

<head>
   @include('layouts.admin_header_scripts')
</head>

<body>

    <!-- Preloader start -->
    <!-- <div id="preloader"></div> -->

    <!-- Header Start -->
   @include('layouts.admin_header')
 
    <!-- Hero Start -->

    <!-- Team Two Start -->
    @yield('content')

    <!-- Footer Start -->
   @include('layouts.admin_footer')

   @include('layouts.admin_footer_scripts')
   
</body>
</html>