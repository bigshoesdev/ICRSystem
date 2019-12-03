<div class="sidebar" data-active-color="rose" data-background-color="black" data-image="{{asset('assets/img/dashboard/sidebar-1.jpg')}}">
    <div class="logo">
        <a href="{{route('admin.index')}}" class="simple-text">
            {{config('app.name')}}
        </a>
    </div>
    <div class="logo logo-mini"><a href="#" class="simple-text">TPA</a></div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo"><img src="{{asset(Auth::user()->profile->avatar)}}" alt="User Photo" class="img"></div>
            <div class="info"><a data-toggle="collapse" href="" class="collapsed">{{ Auth::user()->name }}</a></div>
        </div>
        <ul class="nav">
            @if(Auth::user()->admin == 1)
                <li class="{{ Request::is('admin/dashboard') ? "active" :"" }}">
                    <a href="{{route('admin.index')}}">
                        <i class="material-icons">dashboard</i>
                        <p>@lang('general/message.dashboard')</p>
                    </a>
                </li>
                <li class="{{ Request::is('admin/user*') ? "active" :"" }}">
                    <a data-toggle="collapse" href="#UserMember">
                        <i class="material-icons">face</i>
                        <p>@lang('general/message.member')<b class="caret"></b></p>
                    </a>
                    <div class="{{ Request::is('admin/user*') ? "" : "collapse" }}" id="UserMember">
                        <ul class="nav">
                            <li class="{{ Request::is('admin/user') ? "active" : "" }}">
                                <a href="{{route('admin.user.index')}}">@lang('general/message.all_member')</a>
                            </li>
                            <li class="{{ Request::is('admin/user/create') ? "active" : "" }}">
                                <a href="{{route('admin.user.create')}}">@lang('general/message.create_member')</a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif
            {{--@if(Auth::user()->admin == 1 || Auth::user()->admin == 2)--}}
                {{--<li class="{{ Request::is('admin/news*') ? "active" :"" }}">--}}
                    {{--<a data-toggle="collapse" href="#BlogArea">--}}
                        {{--<i class="material-icons">announcement</i>--}}
                        {{--<p>@lang('general/message.news_section')<b class="caret"></b></p>--}}
                    {{--</a>--}}
                    {{--<div class="{{ Request::is('admin/news*') ? "" :"collapse" }}" id="BlogArea">--}}
                        {{--<ul class="nav">--}}
                            {{--<li>--}}
                                {{--<a data-toggle="collapse" href="#BlogPosts"--}}
                                   {{--class="{{ Request::is('admin/news*') ? "active" :"" }}">--}}
                                    {{--<i class="material-icons">surround_sound</i>--}}
                                    {{--<p>@lang('general/message.news')<b class="caret"></b></p>--}}
                                {{--</a>--}}
                                {{--<div class="{{ Request::is('admin/news') || Request::is('admin/news/create') ? "" :"collapse" }}"--}}
                                     {{--id="BlogPosts">--}}
                                    {{--<ul class="nav" style="padding-left: 60px">--}}
                                        {{--<li class="{{ Request::is('admin/news') ? "active" :"" }}">--}}
                                            {{--<a href="{{route('admin.post.index')}}">@lang('general/message.all_news')</a>--}}
                                        {{--</li>--}}
                                        {{--<li class="{{ Request::is('admin/news/create') ? "active" :"" }}">--}}
                                            {{--<a href="{{route('admin.post.create')}}">@lang('general/message.create_news')</a>--}}
                                        {{--</li>--}}

                                    {{--</ul>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li class="{{ Request::is('admin/categories*') ? "active" :"" }}">--}}
                                {{--<a href="{{route('admin.category.index')}}">--}}
                                    {{--<i class="material-icons">build</i>--}}
                                    {{--<p>@lang('general/message.categories')</p>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="{{ Request::is('admin/tags*') ? "active" :"" }}">--}}
                                {{--<a href="{{route('admin.tag.index')}}"><i class="material-icons">perm_media</i>--}}
                                    {{--<p>@lang('general/message.tags')</p>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</li>--}}
            {{--@endif--}}
            {{--@if(Auth::user()->admin == 1 || Auth::user()->admin == 3)--}}
                {{--<li class="{{ Request::is('admin/support*') ? "active" :"" }}">--}}
                    {{--<a data-toggle="collapse" href="#SupportArea">--}}
                        {{--<i class="material-icons">live_help</i>--}}
                        {{--<p>@lang('general/message.support_area')<b class="caret"></b></p>--}}
                    {{--</a>--}}
                    {{--<div class="{{ Request::is('admin/support*') ? '' : 'collapse' }}" id="SupportArea">--}}
                        {{--<ul class="nav">--}}
                            {{--<li class="{{ Request::is('admin/support')? "active" :"" }}">--}}
                                {{--<a href="{{route('admin.support.open')}}">@lang('general/message.all_open_ticket')</a>--}}
                            {{--</li>--}}
                            {{--<li class="{{ Request::is('admin/support/closed') ? "active" :"" }}">--}}
                                {{--<a href="{{route('admin.support.closed')}}">@lang('general/message.all_close_ticket')</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</li>--}}
            {{--@endif--}}
            @if(Auth::user()->admin == 1)
                <li class="{{ Request::is('admin/kyc/*') ? "active" :"" }}">
                    <a data-toggle="collapse" href="#KycArea">
                        <i class="material-icons">supervisor_account</i>
                        <p>@lang('general/message.kyc_area')<b class="caret"></b></p>
                    </a>
                    <div class="{{ Request::is('admin/kyc/*') ? "" : "collapse" }}" id="KycArea">
                        <ul class="nav">
                            <li class="{{ Request::is('admin/kyc/identity') ? "active" :"" }}">
                                <a href="{{route('admin.kyc')}}">@lang('general/message.identity_request')</a>
                            </li>
                            <li class="{{ Request::is('admin/kyc/address') ? "active" :"" }}">
                                <a href="{{route('admin.kyc2')}}">@lang('general/message.address_request')</a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{--<li>--}}
                    {{--<a href="">--}}
                        {{--<i class="material-icons">settings</i>--}}
                        {{--<p>@lang('general/message.settings')</p>--}}
                    {{--</a>--}}
                {{--</li>--}}
            @endif
        </ul>
    </div>
</div>