<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="http://webthemez.com" />
    <!-- css -->
   @stack('prepend-style')
@include('includes.home.style')
@stack('addon-style')


    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body>


    <div id="wrapper">
<!-- ##### Preloader ##### -->
<div class="preloader d-flex align-items-center justify-content-center">
    <!-- <div class="circle-preloader">
        <img src="{{ url('assets/img/mata.gif')}}" alt="">
    </div> -->
</div>
        @include('includes.home.navbar')


        @yield('content')


@include('includes.home.footer')
</div>
    <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>


    @stack('prepend-script')
    @include('includes.home.script')
    @stack('addon-script')


</body>
</html>
