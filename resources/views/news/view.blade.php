@extends('layout.public')
@section('title' )
    {{$post->title}}
@stop

@section('content')
    <body class="section-white">
    <div class="cd-section" id="headers">
        <div class="header-1">
            <nav class="navbar navbar-info navbar-transparent navbar-fixed-top navbar-color-on-scroll">
                @include('partial.public.navbar')
            </nav>
            <div class="page-header header-filter"
                 style="background-image: url('{{asset('assets/img/public/bg12.jpg')}}');">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            @lang('general/message.news_blog_text')
                            <br/>
                            @if (Auth::check())
                                <a href="#" target="_blank" class="btn btn-success btn-lg">
                                    <i class="fa fa-ticket"></i> @lang('general/message.view_ads_now')
                                </a>
                            @else
                                <a href="{{url('/register')}}" target="_self" class="btn btn-primary btn-lg">
                                    <i class="fa fa-ticket"></i> @lang('general/message.join_now')
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="section section-text">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h3 class="title">{{$post->title}}</h3>
                        <p>@lang('general/message.published') {{$post->created_at->diffForHumans()}}</p>
                        <br>
                        <div class="card card-profile card-atv">
                            <div class="card-image">
                                <a href="{{$post->featured}}">
                                    <div class="atvImg"><img class="img" src="{{$post->featured}}"/></div>
                                </a>
                            </div>
                        </div>
                        <div>{!! $post->content !!}</div>
                    </div>
                </div>
            </div>
            <div class="section section-blog-info">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="blog-tags">@lang('general/message.category'):
                                    <span class="label label-primary">{{$post->category->name}}</span>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="card card-profile card-plain">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="card-avatar">
                                        <a href="#">
                                            <img class="img" src="{{$user->profile->avatar}}"></a>
                                        <div class="ripple-container"></div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h4 class="card-title">{{$user->name}}</h4>
                                    <p class="description">{{$user->profile->about}}</p>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-primary pull-right btn-round">
                                        @if($user->admin == 1)
                                            @lang('general/message.admin')
                                        @else
                                            @lang('general/message.user')
                                        @endif
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        @include('partial.public.footer')
    </footer>
    </body>
@endsection