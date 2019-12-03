@extends('layout.auth')

@section('title')
    @lang('auth/message.password_reset')
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="card card-signup">
                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}
                        <div class="header header-info text-center login-header-info">
                            <h4 class="card-title login-title"> @lang('auth/message.reset_password')</h4>
                            @include('partial.auth.social')
                        </div>
                        <p class="description text-center">@lang('auth/message.be_classical')</p>
                        <div class="card-content">
                            <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                </span>
                                <div class="form-group label-floating">
                                    <label class="control-label" for="email">@lang('auth/message.email_address')</label>
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-warning btn-login">@lang('auth/message.send_password_reset_link')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
