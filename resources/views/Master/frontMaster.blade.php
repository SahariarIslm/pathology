<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name') }} || @yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/public')}}/Master/img/logo/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/public') }}/FrontEnd/fonts/icomoon/style.css">
    <link rel="stylesheet" href="{{ asset('/public') }}/FrontEnd/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/public') }}/FrontEnd/css/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('/public') }}/FrontEnd/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('/public') }}/FrontEnd/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('/public') }}/FrontEnd/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('/public') }}/FrontEnd/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="{{ asset('/public') }}/FrontEnd/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{ asset('/public') }}/FrontEnd/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="{{ asset('/public') }}/FrontEnd/css/aos.css">
    <link rel="stylesheet" href="{{ asset('/public') }}/FrontEnd/css/style.css">
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
   
  {{-- Body Start --}}
  @yield('content')
  {{-- Body End --}}

  <script src="{{ asset('/public') }}/FrontEnd/js/jquery-3.3.1.min.js"></script>
  <script src="{{ asset('/public') }}/FrontEnd/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="{{ asset('/public') }}/FrontEnd/js/jquery-ui.js"></script>
  <script src="{{ asset('/public') }}/FrontEnd/js/popper.min.js"></script>
  <script src="{{ asset('/public') }}/FrontEnd/js/bootstrap.min.js"></script>
  <script src="{{ asset('/public') }}/FrontEnd/js/owl.carousel.min.js"></script>
  <script src="{{ asset('/public') }}/FrontEnd/js/jquery.stellar.min.js"></script>
  <script src="{{ asset('/public') }}/FrontEnd/js/jquery.countdown.min.js"></script>
  <script src="{{ asset('/public') }}/FrontEnd/js/bootstrap-datepicker.min.js"></script>
  <script src="{{ asset('/public') }}/FrontEnd/js/jquery.easing.1.3.js"></script>
  <script src="{{ asset('/public') }}/FrontEnd/js/aos.js"></script>
  <script src="{{ asset('/public') }}/FrontEnd/js/jquery.fancybox.min.js"></script>
  <script src="{{ asset('/public') }}/FrontEnd/js/jquery.sticky.js"></script>
  <script src="{{ asset('/public') }}/FrontEnd/js/typed.js"></script>
        <script>
            var typed = new Typed('.typed-words', {
            strings: ["Web Apps"," WordPress"," Mobile Apps"],
            typeSpeed: 80,
            backSpeed: 80,
            backDelay: 4000,
            startDelay: 1000,
            loop: true,
            showCursor: true
            });
        </script>
  <script src="{{ asset('/public') }}/FrontEnd/js/main.js"></script>
  </body>
</html>