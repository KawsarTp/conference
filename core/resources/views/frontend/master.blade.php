<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="stylesheet" href="{{asset('asset/frontend/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">


    <link rel="stylesheet" href="{{asset('asset/frontend/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('asset/frontend/css/lightcase.css')}}">
    <link rel="stylesheet" href="{{asset('asset/frontend/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('asset/frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/frontend/css/owl.theme.default.min.css')}}">
    
    <link rel="shortcut icon" href="{{asset('asset/frontend/images/favicon.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('asset/frontend/css/style.css')}}">

    <title>{{config('app.name')}}</title>

</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-wrapper"></div>
    </div>
    <!-- Preloader -->
    <div class="overlay"></div>
    <!-- Header Section Stars Here -->
    <a href="#" class="scrollToTop"><i class="fas fa-angle-up"></i></a>
    <!-- Fixed Sidebar Section Ends Here -->

    @yield('content')
    

    <!-- JavaScript File Links -->
    <script src="{{asset('asset/frontend/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('asset/frontend/js/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('asset/frontend/js/plugins.js')}}"></script>
    <script src="{{asset('asset/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('asset/frontend/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('asset/frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('asset/frontend/js/waypoint.js')}}"></script>
    <script src="{{asset('asset/frontend/js/counterup.min.js')}}"></script>
    <script src="{{asset('asset/frontend/js/countdown.min.js')}}"></script>
    <script src="{{asset('asset/frontend/js/lightcase.js')}}"></script>
    <script src="{{asset('asset/frontend/js/wow.min.js')}}"></script>
    <script src="{{asset('asset/frontend/js/parallax.js')}}"></script>
    <script src="{{asset('asset/frontend/js/tweenmax.min.js')}}"></script>
 
    <script src="{{asset('asset/frontend/js/map.js')}}"></script>
    <script src="{{asset('asset/frontend/js/main.js')}}"></script>



</body>

</html>