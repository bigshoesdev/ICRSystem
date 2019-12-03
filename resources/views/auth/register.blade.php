@extends('layout.auth')

@section('title')
    @lang('general/message.signup')
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="card card-signup">
                    <div class="header header-info text-center login-header-info">
                        <h4 class="card-title login-title">@lang('auth/message.sign_up_full_features')</h4>
                        @include('partial.auth.social')
                    </div>
                    <div class="row">
                        <div class="card-content">
                            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}
                                <div class="card-content">
                                    <div class="input-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <span class="input-group-addon">
                                            <i class="material-icons">face</i>
                                        </span>
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="name">
                                                @lang('auth/message.full_name')
                                            </label>
                                            <input id="name" type="text" class="form-control" name="name"
                                                   value="{{ old('name') }}" required autofocus>
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <span class="input-group-addon">
                                            <i class="material-icons">email</i>
                                        </span>
                                        <div class="form-group label-floating">
                                            <label class="control-label"
                                                   for="email">@lang('auth/message.email_address')</label>
                                            <input id="email" type="email" class="form-control" name="email"
                                                   value="{{ old('email') }}" required>
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
                                            <label class="control-label"
                                                   for="password">@lang('auth/message.password')</label>
                                            <input id="password" type="password" class="form-control" name="password"
                                                   required>
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">lock_outline</i>
											</span>
                                        <div class="form-group label-floating">
                                            <label class="control-label"
                                                   for="password-confirm">@lang('auth/message.password_confirmation')</label>
                                            <input id="password-confirm" type="password" class="form-control"
                                                   name="password_confirmation" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group col-md-3 col-md-offset-2">
                                    {{--{!! Recaptcha::render() !!}--}}
                                </div>
                                <div class="footer text-center">
                                    <button type="submit" class="btn btn-warning btn-login">
                                        <i class="material-icons">input</i> @lang('auth/message.register_now')
                                    </button>
                                    <a class="btn btn-primary btn-forgot-password" href="{{ route('login') }}">
                                        <i class="material-icons">warning</i> @lang('auth/message.already_account')
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
