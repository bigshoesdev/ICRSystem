<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@lang('general/message.icrexchange') | @lang('error/message.service_not_available')</title>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/layout/app/font.css')}}"/>
    <style>
        html, body {
            background-color: #fff;
            color: #c76800;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }
        .full-height {
            height: 100vh;
        }
        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }
        .position-ref {
            position: relative;
        }
        .content {
            text-align: center;
        }
        .title {
            color: #c70040;
            font-size: 36px;
            padding: 20px;
        }
        .description {
            color: #9900c7;
            font-size: 20px;
            padding: 20px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title">
            @lang('error/message.sys_under_maintenance')
        </div>
        <div class="description">
            <b>@lang('error/message.dear_visitor_reset_wait') </b>
        </div>
    </div>
</div>
</body>
</html>