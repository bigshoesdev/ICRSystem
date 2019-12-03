@extends('layout.app')
@section('title')
    @lang('general/message.edit_profile')
@stop

@section('header_styles')
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple"><i class="material-icons">perm_identity</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">
                        @lang('general/message.my_profile_edit')
                    </h4>
                    <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @if(count($errors) > 0)
                            <div class="alert alert-danger alert-with-icon" data-notify="container">
                                <i class="material-icons" data-notify="icon">notifications</i>
                                <span data-notify="message">
                                    @foreach($errors->all() as $error)
                                        <li><strong> {{$error}} </strong></li>
                                    @endforeach
                                </span>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="{{asset($user->profile->avatar)}}" alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div>
                                        <span class="btn btn-rose btn-round btn-file">
                                            <span class="fileinput-new">@lang('general/message.select_image')</span>
                                            <span class="fileinput-exists">@lang('general/message.change')</span>
                                            <input type="file" name="avatar"/></span>
                                        <a href="#" class="btn btn-danger btn-round fileinput-exists"
                                           data-dismiss="fileinput">
                                            <i class="fa fa-times"></i> Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="name">@lang('general/message.full_name')</label>
                                    <input id="name" name="name" type="text" value="{{$user->name}}"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label"
                                           for="email">@lang('general/message.email_address')</label>
                                    <input id="email" name="email" value="{{$user->email}}" type="text"
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label"
                                           for="occupation">@lang('general/message.occupation')</label>
                                    <input id="occupation" name="occupation" type="text"
                                           value="{{$user->profile->occupation}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label"
                                           for="mobile">@lang('general/message.mobile_number')</label>
                                    <input id="mobile" name="mobile" type="text" value="{{$user->profile->mobile}}"
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="address">@lang('general/message.address_line')
                                        1</label>
                                    <input id="address" name="address" value="{{$user->profile->address}}" type="text"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="address2">@lang('general/message.address_line')
                                        2</label>
                                    <input id="address2" name="address2" value="{{$user->profile->address2}}"
                                           type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="city">@lang('general/message.city')</label>
                                    <input id="city" name="city" type="text" value="{{$user->profile->city}}"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="state">@lang('general/message.state')</label>
                                    <input id="state" name="state" type="text" value="{{$user->profile->state}}"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label"
                                           for="postcode">@lang('general/message.postal_code')</label>
                                    <input id="postcode" name="postcode" type="text"
                                           value="{{$user->profile->postcode}}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label"
                                           for="country">@lang('general/message.member_country')</label>
                                    <input id="country" name="country" type="text"
                                           value="{{$user->profile->country}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group label-floating">
                                    <label class="control-label"
                                           for="facebookurl">@lang('general/message.fb_profile_url')</label>
                                    <input id="facebookurl" name="facebook" type="text"
                                           value="{{$user->profile->facebook}}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label"
                                           for="password">@lang('general/message.new_password')</label>
                                    <input id="password" name="password" type="password"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label"
                                           for="password-confirm">@lang('general/message.confirm_new_password')</label>
                                    <input id="password-confirm" name="password_confirmation"
                                           type="password" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <span class="text-warning">@lang('general/message.leave_blank_pass')</span>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="about">@lang('general/message.about')</label>
                                        <input id="about" name="about" type="text" value="{{$user->profile->about}}"
                                               class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label"
                                           for="current_password">@lang('general/message.current_pass')</label>
                                    <input id="current_password" name="current_password"
                                           type="password" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <span class="text-danger">@lang('general/message.type_current_pass')</span>
                            </div>
                        </div>
                        <br><a href="{{route('dashboard')}}"
                               class="btn btn-rose">@lang('general/message.cancel_edit')</a>
                        <button type="submit"
                                class="btn btn-success pull-right">@lang('general/message.update_profile')</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card card-content">
                    <div class="card-content">
                        <div class="alert alert-primary">
                            <h4 class="card-title text-center">
                                <span>@lang('general/message.kyc_verify_status')</span>
                            </h4>
                        </div>
                        <br>
                        @if(count($identity) == 0 and count($address) == 0)
                            <h5 class="card-title">
                                <span class="text-danger">@lang('general/message.identity_verify'):   </span>
                                <span class="btn btn-default btn-sm">@lang('general/message.not_verify')</span>
                            </h5>
                            <br>
                            <h5 class="card-title">
                                <span class="text-danger">@lang('general/message.address_verify'):    </span>
                                <span class="btn btn-default btn-sm">@lang('general/message.not_verify')</span>
                            </h5>
                            <br>
                            <a href="{{route('profile.kyc')}}"
                               class="btn btn-success center-block">@lang('general/message.submit_verification')</a>
                        @else
                            <h5 class="card-title">
                                <span class="text-danger">@lang('general/message.identity_verify'):   </span>
                                @if($result1)
                                    @if($result1->status == false)
                                        <span class="btn btn-warning btn-sm">@lang('general/message.under_review')</span>
                                    @else
                                        <span class="btn btn-success btn-sm">@lang('general/message.approved')</span>
                                    @endif
                                @else
                                    <span class="btn btn-default btn-sm">@lang('general/message.not_verify')</span>
                                @endif
                            </h5>
                            <br>
                            <h5 class="card-title">
                                <span class="text-danger">
                                    @lang('general/message.address_verify'):
                                </span>
                                @if($result2)
                                    @if($result2->status == false)
                                        <span class="btn btn-warning btn-sm">@lang('general/message.under_review')</span>
                                    @else
                                        <span class="btn btn-success btn-sm">@lang('general/message.approved')</span>
                                    @endif
                                @else
                                    <span class="btn btn-default btn-sm">@lang('general/message.not_verify')</span>
                                @endif
                            </h5>
                            <br>
                            @if(count($identity) == 0 or count($address) == 0)
                                <a href="{{route('profile.kyc')}}" class="btn btn-success center-block">
                                    @lang('general/message.submit_verification')
                                </a>
                            @elseif(count($identity) == 1 and count($address) == 1)
                            @endif
                        @endif
                    </div>
                </div>
                <div class="card card-content">
                    <div class="card-content">
                        <div class="alert alert-primary">
                            <h4 class="card-title text-center">
                                <span>@lang('general/message.google_auth')</span>
                            </h4>
                        </div>
                        <h5 class="card-title" style="border:1px solid; border-width:0px 0px 1px 0px">
                            <span class="text-danger">@lang('general/message.auth_status'):   </span>
                            @if(!$user->google2fa_enabled)
                                <span class="btn btn-default"
                                      style="cursor:default">@lang('general/message.disabled')</span>
                            @else
                                <span class="btn btn-info"
                                      style="cursor:default">@lang('general/message.enabled')</span>
                            @endif
                        </h5>
                        <br/>
                        <p>
                            <span>@lang('general/message.open_google_auth') -
                                <code id="secretKey">{{ $google2fa['secret'] }}</code>.</span>
                            <img alt="Image of QR barcode" src="{{ $google2fa['image'] }}"/></p>
                        <form id="renewForm" method="post" action="{{route('profile.renew2FASecretCode')}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="totp" class="code-2fa">
                        </form>
                        <form id="enableForm" method="post" action="{{route('profile.enableTwoFactor')}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="totp" class="code-2fa">
                        </form>
                        <form id="disableForm" method="post" action="{{route('profile.disableTwoFactor')}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="totp" class="code-2fa">
                        </form>
                        <p class="text-center">
                            <input class="form-control text-center" required maxlength="6"
                                   pattern="\d*" type="text" id="code_2fa_fake"
                                   placeholder="@lang('general/message.six_digit_code')">
                            @if(!$user->google2fa_enabled)
                                <a href="#" id="btnEnable"
                                   class="btn btn-success btn-2fa">@lang('general/message.enable_auth')</a>
                            @else
                                <a href="#" id="btnRenew"
                                   class="btn btn-success btn-2fa">@lang('general/message.renew_secret_code')</a>
                                <a href="#" id="btnDisable"
                                   class="btn btn-warning btn-2fa">@lang('general/message.disable_auth')</a>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
    <script type="text/javascript">
        $(function() {

            $("#btnRenew").on('click', function (e) {
                var code = $("#code_2fa_fake").val();
                $(".code-2fa").val(code);
                var form = $("#renewForm");
                form.submit();
            });

            $("#btnDisable").on('click', function (e) {
                var code = $("#code_2fa_fake").val();
                $(".code-2fa").val(code);
                var form = $("#disableForm");
                form.submit();
            });

            $("#btnEnable").on('click', function (e) {
                var code = $("#code_2fa_fake").val();
                $(".code-2fa").val(code);
                var form = $("#enableForm");
                form.submit();
            });
        })
    </script>
@stop


