<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="csrf-token" content="{!! csrf_token() !!}"/>
    <meta name="root-path" content="{{ asset('/') }}"/>
    <title>@lang('general/message.icrexchange') | @yield('title')</title>
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/layout/app/font.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/layout/app/font-awesome.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/layout/app/material-kit.min3f71.css')}}"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/atom-one-dark.min.css" />
</head>
@yield('content')

<script src="{{asset('assets/vendors/jquery/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
<script src="{{asset('assets/vendors/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/jquery/jquery.select-bootstrap.js')}}"></script>
<script src="{{asset('assets/vendors/atv-img-animation/atv-img-animation.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/layout/app/material.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/layout/app/material-kit.min3f71.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/sweetalert/sweetalert2.js')}}"></script>
<script src="{{asset('assets/vendors/jquery-confirm/js/jquery-confirm.min.js')}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>

{{--<script src="{{asset('js/nouislider.min.js')}}" type="text/javascript"></script>--}}
<script>hljs.initHighlightingOnLoad();</script>
</html>

