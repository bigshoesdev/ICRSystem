@extends('layout.admin')
@section('title')
    @lang('general/message.edit_mem_prof')
@stop
@section('header_styles')
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">perm_identity</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">@lang('general/message.edit_mem_prof') -
                        <small class="category">@lang('general/message.com_mem_prof')</small>
                    </h4>
                    <form action="{{route('admin.user.update',['id'=>$user->id])}}" method="post"
                          enctype="multipart/form-data">
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
                            <div class="col-md-6 col-md-offset-3 text-center">
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="{{asset($user->profile->avatar)}}" alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div>
                                        <span class="btn btn-rose btn-round btn-file">
                                            <span class="fileinput-new">@lang('general/message.sel_image')</span>
                                            <span class="fileinput-exists">@lang('general/message.change')</span>
                                            <input type="file" name="avatar"/>
                                        </span>
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
                                    <select class="selectpicker" name="admin" data-style="btn btn-warning btn-round"
                                            title="Single Select" data-size="7">
                                        <option value="0"
                                                @if($user->admin == 0)selected @endif > @lang('general/message.general_mem')</option>
                                        <option value="2"
                                                @if($user->admin == 2)selected @endif > @lang('general/message.news_mam')</option>
                                        <option value="3"
                                                @if($user->admin == 3)selected @endif > @lang('general/message.sup_man')</option>
                                        <option value="1"
                                                @if($user->admin == 1)selected @endif > @lang('general/message.sup_admin')</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <select class="selectpicker" name="active" data-style="btn btn-warning btn-round"
                                            title="Single Select" data-size="7">
                                        <option value="0"
                                                @if($user->active == 0)selected @endif > @lang('general/message.not_active')</option>
                                        <option value="1"
                                                @if($user->active == 1)selected @endif > @lang('general/message.active')</option>
                                    </select>
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
                                    <input id="email" name="email" value="{{$user->email}}"
                                           type="text" class="form-control">
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
                                    <input id="mobile" name="mobile" type="text"
                                           value="{{$user->profile->mobile}}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label"
                                           for="main_balance">@lang('general/message.main_bal')</label>
                                    <input id="main_balance" name="main_balance"
                                           value="{{$user->profile->main_balance}}" type="number"
                                           step="0.00000001" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="address">@lang('general/message.address_line')
                                        1</label>
                                    <input id="address" name="address"
                                           value="{{$user->profile->address}}" type="text"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="address2">@lang('general/message.address_line')
                                        2</label>
                                    <input id="address2" name="address2"
                                           value="{{$user->profile->address2}}" type="text"
                                           class="form-control">
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
                        <a href="{{route('admin.user.index')}}"
                           class="btn btn-rose">@lang('general/message.cancel_edit')</a>
                        <button type="submit"
                                class="btn btn-success pull-right">@lang('general/message.update_profile')</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-content">
                <div class="card-content">
                    <div class="alert alert-primary">
                        <h4 class="card-title text-center"><span>@lang('general/message.spe_action')</span>
                        </h4>
                    </div>
                    <br/>
                    <div class="text-center">
                        <a href="{{route('admin.user.delete', $user->id)}}"
                           class="btn btn-warning member-delete">@lang('general/message.del_memeber')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
    <script type="text/javascript">

        $(".member-delete").on('click', function(e) {
            e.preventDefault();

            var theHREF = $(this).attr("href");

            $.confirm({
                title: "@lang('general/message.del_confirm')",
                content: "@lang('general/message.sure_to_delete_memeber')",
                buttons: {
                    Confirm: {
                        btnClass: 'btn-warning',
                        action: function () {
                            window.location.href = theHREF;
                        }
                    },
                    Cancel: {
                        btnClass: 'btn-blue',
                    }
                }
            });
        });
    </script>
@stop