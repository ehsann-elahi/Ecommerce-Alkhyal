<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<title>User Panel </title>

<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
<link href="{{asset('assets/admin/css/themes/lite-purple.min.css')}}" rel="stylesheet" />
<link href="{{asset('assets/admin/css/plugins/perfect-scrollbar.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('assets/admin/css/plugins/datatables.min.css')}}" />
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<link href="{{asset('assets/front/img/favicon.png')}}" rel="icon">
<script src="https://use.fontawesome.com/042dcdb009.js"></script>
<link href="{{asset('assets/admin/css/piechart.css')}}" rel="stylesheet" />
 <!-- select2 -->
 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

<!-- select2-bootstrap4-theme -->
<link href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css" rel="stylesheet"> <!-- for live demo page -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>


    @yield('styles')

@stack('user_header')  