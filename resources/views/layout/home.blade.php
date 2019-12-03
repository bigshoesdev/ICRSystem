<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>@lang('general/message.icrexchange') | @yield('title')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="csrf-token" content="{!! csrf_token() !!}"/>
    <meta name="root-path" content="{{ asset('/') }}"/>
    <meta name="description" content="The best site for converting currency into BTC the fastest way">
    <meta name="keywords" content="exchange, usd, convert, swap, best rates, best price, btc, cryptocurrency">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/layout/app/font.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/layout/app/font-awesome.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/bootstrap/css/bootstrap.css')}}">
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
    @yield('header_styles')
</head>
<body>
@yield('content')

<script src="{{asset('assets/vendors/jquery/jquery.min.js')}}"></script>
@yield('footer_scripts')
</body>
</html>
