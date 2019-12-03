<!DOCTYPE html>
<!--[if IE 8 ]>
<html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]>
<html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>@lang('general/message.icrexchange') | @lang('error/message.404_error')</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="{{asset('assets/css/error/base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/error/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/error/vendor.css')}}">
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
</head>
<body>
<main id="main-404-content" class="main-content-particle-js">

    <div class="content-wrap">
        <div class="shadow-overlay"></div>
        <div class="main-content">
            <div class="row">
                <div class="col-twelve">
                    <h1 class="kern-this">@lang('error/message.404_error')</h1>
                    <p>
                        @lang('error/message.404_oops')
                    </p>
                </div> <!-- /twelve -->
            </div> <!-- /row -->
        </div> <!-- /main-content -->
        <footer>
            <div class="row">
                <div class="col-seven tab-full social-links pull-right">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="col-five tab-full bottom-links">
                    <ul class="links">
                        <li><a href="{{ route('home') }}" title="">@lang('error/message.home')</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</main>

<!-- Java Script
================================================== -->
<script src="{{asset('assets/js/error/main.min.js')}}"></script>
<script src="{{asset('assets/js/error/main2.js')}}"></script>
<script src="{{asset('assets/js/error/main.js')}}"></script>
</body>

</html>