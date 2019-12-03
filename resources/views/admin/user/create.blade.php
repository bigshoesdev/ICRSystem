@extends('layout.admin')
@section('title')
    @lang('general/message.create_mem_prof')
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
                    <h4 class="card-title">@lang('general/message.create_mem_prof') -
                        <small class="category">@lang('general/message.com_mem_prof')</small>
                    </h4>
                    <form action="{{route('admin.user.store')}}" method="post">
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
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="name">@lang('general/message.full_name')</label>
                                    <input id="name" name="name" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="email">@lang('general/message.email_address')</label>
                                    <input id="email" name="email" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="password">@lang('general/message.new_password')</label>
                                    <input id="password" name="password" type="password" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="confirm-password">@lang('general/message.confirm_new_password')</label>
                                    <input id="confirm-password" name="confirm-password" type="password"
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                        <a href="{{route('admin.user.index')}}" class="btn btn-rose">@lang('general/message.cancel_create')</a>
                        <button type="submit" class="btn btn-success pull-right">@lang('general/message.create_prof')</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
@stop