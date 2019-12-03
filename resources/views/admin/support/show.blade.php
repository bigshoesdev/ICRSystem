@extends('layout.admin')

@section('title')
    @lang('general/message.support_show')
@stop

@section('content')
    <div class="row">
        <h4 class="title text-center text-primary">View <b>"{{$support->ticket}}"</b> - @lang('general/message.support_discussion')</h4>
        <h5 class="title text-center text-info">Subject : <b>"{{$support->subject}}"</b></h5>
        <div class="col-md-12">
            <div class="card card-plain">
                <div class="card-content">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-badge">
                                <div class="photo">
                                    <img src="{{$support->user->profile->avatar}}" class="img-circle" />
                                </div>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <span class="label label-info">{{$support->user->name}} | User</span>
                                </div>
                                <div class="timeline-body">
                                    <p>{!! Markdown::convertToHtml($support->message) !!}</p>
                                </div>
                                <h6>
                                    <i class="ti-time"></i> {{$support->created_at->diffForHumans()}}
                                </h6>
                            </div>
                        </li>
                        @foreach( $discussions as $discussion)
                            @if($discussion->type == 1)
                                <li class="timeline-inverted">
                                    <div class="timeline-badge">
                                        <div class="photo">
                                            <img src="{{$discussion->user->profile->avatar}}" class="img-circle" />
                                        </div>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <span class="label label-success">{{$discussion->user->name}} | Support Agent</span>
                                        </div>
                                        <div class="timeline-body">
                                            <p>{!! Markdown::convertToHtml($discussion->message) !!}</p>
                                        </div>
                                    </div>
                                </li>
                            @elseif($discussion->type == 0)
                                <li>
                                    <div class="timeline-badge">
                                        <div class="photo">
                                            <img src="{{$discussion->user->profile->avatar}}" class="img-circle" />
                                        </div>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <span class="label label-info">{{$discussion->user->name}} | User</span>
                                        </div>
                                        <div class="timeline-body">
                                            <p>{!! Markdown::convertToHtml($discussion->message) !!}</p>
                                        </div>
                                        <h6>
                                            <i class="ti-time"></i> {{$discussion->created_at->diffForHumans()}}
                                        </h6>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                        @if($support->status > 0)
                            <li  class="timeline-inverted">
                                <div class="timeline-badge">
                                    <div class="photo">
                                        <img src="{{$user->profile->avatar}}" class="img-circle" />
                                    </div>
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <span class="label label-success">@lang('general/message.submit_msg_support')</span>
                                    </div>
                                    <div class="timeline-body">
                                        <form action="{{route('admin.support.post', ['ticket'=>$support->ticket])}}" method="post">
                                            {{ csrf_field() }}
                                            <div class="form-group label-floating">
                                                <label for="message" class="control-label">@lang('general/message.message')</label>
                                                <textarea name="body" class="form-control" id="message" rows="10"></textarea>
                                            </div>
                                            <a href="{{route('admin.support.open')}}" class="btn btn-rose">@lang('general/message.cancel_msg')</a>
                                            <button type="submit" class="btn btn-success pull-right">@lang('general/message.submit_msg')</button>
                                            <div class="clearfix"></div>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @endif
                    </ul>
                    <a href="{{$support->status == 0 ? route('admin.support.closed') : route('admin.support.open')}}" class="btn btn-primary pull-right">
                        @lang('general/message.go_back_ticket')
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection