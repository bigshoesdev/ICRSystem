<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>@lang('general/message.icrexchange') | @yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/layout/app/font.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/layout/app/font-awesome.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/bootstrap/css/bootstrap.css')}}">
    <link href="{{asset('assets/css/layout/app/material-kit.min3f71.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/layout/app/material-dashboard.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/layout/app/app.css')}}" rel="stylesheet"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('header_styles')
</head>

<body>
<div class="bg-wrapper animated-all" style="height:auto;">
    <div class="header-bg">
        @include('partial.home.navbar')
        <div style="margin-top: 100px; height: 650px;">
            @yield('content')
        </div>
        @include('partial.home.footer')
    </div>
</div>

<script src="{{asset('assets/vendors/jquery/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
<script src="{{asset('assets/vendors/atv-img-animation/atv-img-animation.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/layout/app/material.min.js')}}"></script>
<script src="{{asset('assets/js/layout/app/material-kit.min3f71.js')}}" type="text/javascript"></script>
@yield('footer_scripts')
</body>

</html>