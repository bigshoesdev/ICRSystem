@extends('layout.auth')

@section('title')
    @lang('general/message.login')
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="card card-signup">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="header header-info text-center login-header-info">
                            <h4 class="card-title login-title">@lang('auth/message.log_in')</h4>
                            @include('partial.auth.social')
                        </div>
                        <div class="card-content">
                            <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                </span>
                                <div class="form-group label-floating">
                                    <label class="control-label" for="email">@lang('auth/message.email_address')</label>
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="input-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                <div class="form-group label-floating">
                                    <label class="control-label" for="password">@lang('auth/message.password')</label>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    @lang('auth/message.remember_me')
                                </label>
                            </div>
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-warning btn-login">@lang('general/message.login')</button>
                            <a class="btn btn-primary btn-forgot-password" href="{{ route('password.request') }}">
                                @lang('auth/message.forgot_password')
                            </a>
                        </div>
                        <br/>
                    </form>
                </div>
            </div>
            <br>
            @if (session()->has('message'))
                <div class="col-md-6 col-md-offset-3">
                    <div class="alert alert-danger alert-with-icon" data-notify="container">
                        <i class="material-icons" data-notify="icon">@lang('auth/message.notification')</i>
                        <span data-notify="message">{!! session()->get('message')  !!}</span>
                    </div>
                </div>
            @endif
        </div>
    </div>
@stop
