<!DOCTYPE html>
<html lang="en">


<!-- molla/index-13.html  22 Nov 2019 09:59:06 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>NovaTuri</title>
    <meta name="keywords" content="">
    <meta name="description" content="NovaTuri">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('front/assets/images/icons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('front/assets/images/icons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('front/assets/images/icons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('front/assets/images/icons/site.html')}}">
    <link rel="mask-icon" href="{{asset('front/assets/images/icons/safari-pinned-tab.svg')}}" color="#666666">
    <link rel="shortcut icon" href="{{asset('front/assets/images/icons/favicon.ico')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <meta name="apple-mobile-web-app-title" content="">
    <meta name="application-name" content="">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{asset('front/assets/images/icons/browserconfig.xml')}}">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{asset('front/assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css')}}">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('front/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/plugins/magnific-popup/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/plugins/jquery.countdown.css')}}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('front/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/skins/skin-demo-13.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/demos/demo-13.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<!--<link href="https://fonts.googleapis.com/css2?family=Kosugi&display=swap" rel="stylesheet">-->
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

</head>

<body>
    <div class="page-wrapper">

        @include('frontlayout.frontheader')
        <!-- End .header -->
        @yield('content')
        
        @include('frontlayout.footer')
        <!-- End .footer -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->


    <!-- Sign in / Register Modal -->
   

    
    <!-- Plugins JS File -->
    <script src="{{asset('front/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('front/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('front/assets/js/jquery.hoverIntent.min.js')}}"></script>
    <script src="{{asset('front/assets/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('front/assets/js/superfish.min.js')}}"></script>
    <script src="{{asset('front/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('front/assets/js/bootstrap-input-spinner.js')}}"></script>
    <script src="{{asset('front/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('front/assets/js/jquery.plugin.min.js')}}"></script>
    <script src="{{asset('front/assets/js/jquery.countdown.min.js')}}"></script>
    
    <!-- Main JS File -->
    <script src="{{asset('front/assets/js/main.js')}}"></script>
    <script src="{{asset('front/assets/js/demos/demo-13.js')}}"></script>
</body>


<!-- molla/index-13.html  22 Nov 2019 09:59:31 GMT -->
</html>










