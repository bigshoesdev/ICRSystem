@extends('layout.app')
@section('title')
    @lang('general/message.support_create')
@stop

@section('header_styles')
@stop

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">live_help</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">@lang('general/message.ticket_write_new')</h4>
                    <br>
                    <form action="{{route('supports.post')}}" method="post">
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
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="subject">@lang('general/message.subject')</label>
                                    <input id="subject" name="subject" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="body">@lang('general/message.message')</label>
                                    <textarea name="body" class="form-control" id="body" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                        <br> <br>
                        <a href="{{route('supports')}}" class="btn btn-rose">@lang('general/message.cancel_create')</a>
                        <button type="submit" class="btn btn-success pull-right">@lang('general/message.create_ticket')</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
@stop


