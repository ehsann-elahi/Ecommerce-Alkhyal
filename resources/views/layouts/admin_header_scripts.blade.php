<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<title>Admin Panel </title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
<link href="{{asset('assets/admin/css/themes/lite-purple.min.css')}}" rel="stylesheet" />
<link href="{{asset('assets/admin/css/plugins/perfect-scrollbar.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('assets/admin/css/plugins/datatables.min.css')}}" />
<link href="{{asset('assets/admin/images/favicon/2.png')}}" rel="icon">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<link rel="stylesheet" href="https://gull.getstocky.com/assets/styles/vendor/smart.wizard/smart_wizard.min.css">


@yield('styles')

@stack('admin_header')