@extends('layout.app')
@section('title')
    @lang('general/message.event_news')
@stop

@section('header_styles')
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-tabs" data-background-color="green">
                    <h4 class="card-title">
                        @lang('general/message.event_news')
                    </h4>
                </div>
                <br/>
                <br/>
                <div class="card-content">
                    @if(count($posts) > 0)
                        @foreach($posts as $post)
                            <div class="col-md-4">
                                <div class="card card-product">
                                    <div class="card-image" data-header-animation="false">
                                        <a href="#">
                                            <img class="img" src="{{$post->featured}}">
                                        </a>
                                    </div>
                                    <div class="card-content">
                                        <h4 class="card-title">
                                            <a href="{{route('news.view', ['slug'=>$post->slug])}}">
                                                {!! Markdown::convertToHtml(str_limit($post->title,'25')) !!}
                                            </a>
                                        </h4>
                                        <div class="card-description news-description">
                                            {!! Markdown::convertToHtml(str_limit($post->content,'150')) !!}
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="price">
                                            <a href="{{route('news.view', ['slug'=>$post->slug])}}" type="button" rel="tooltip" class="btn btn-primary btn-sm">
                                                <i class="material-icons">edit</i> @lang('general/message.read_more')
                                            </a>
                                        </div>
                                        <div class="stats pull-right">
                                            <p class="category">@lang('general/message.by_admin')</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h1 class="text-center">@lang('general/message.no_event_news')</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->links()}}
        </div>
    </div>
@endsection

@section('footer_scripts')
@stop


