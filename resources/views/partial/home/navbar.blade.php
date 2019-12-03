<div class="navbar-wrapper">
    <div class="container">
        <ul class="nav nav-pills pull-right nav-landing">
            {{--<li>--}}
                {{--<a href="#" class="active languageLink">--}}
                    {{--<img src="{{asset('assets/img/flags/en.png')}}"--}}
                         {{--class="languageFlag">@lang('language/message.en')--}}
                {{--</a>--}}
                {{--<ul class="dropdownLinks drowdownLocales menuLinks " style="display:none;">--}}
                    {{--<li class="accountItem">--}}
                        {{--<a class="menuLink languageLink" href="#">--}}
                            {{--<img src="{{asset('assets/img/flags/ja.png')}}"--}}
                                 {{--class="languageFlag">@lang('language/message.ja')--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="accountItem">--}}
                        {{--<a class="menuLink languageLink" href="#">--}}
                            {{--<img src="{{asset('assets/img/flags/ko.png')}}"--}}
                                 {{--class="languageFlag">@lang('language/message.ko')--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="accountItem">--}}
                        {{--<a class="menuLink languageLink" href="#">--}}
                            {{--<img src="{{asset('assets/img/flags/cn.png')}}"--}}
                                 {{--class="languageFlag">@lang('language/message.cn')--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            <li>
                <a href="{{route('dashboard')}}">
                    <span style="font-weight:400;">@lang('general/message.dashboard')</span>
                </a>
            </li>
            <li><a href="#"><span style="font-weight:400;">@lang('general/message.news')</span></a></li>
            <li><a href="#"><span style="font-weight:400;">@lang('general/message.faq')</span></a>
            </li>
            @if (Auth::guest())
                <li>
                    <a href="{{ route('login') }}" class="nav-auth nav-auth-login animated-all">
                        @lang('general/message.login')
                    </a>
                </li>
                <li>
                    <a href="{{route('register')}}" class="nav-auth nav-auth-signup animated-all">
                        @lang('general/message.signup')
                    </a>
                </li>
            @else
                <li>
                    <a href="#"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-auth nav-auth-signup animated-all">
                        <span style="font-weight:400;">@lang('general/message.log_out')</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            @endif
        </ul>
        <a href="/" class="logo">
            <img src="{{asset('assets/img/home/logo.png')}}" alt="@lang('general/message.icrexchange')">
        </a>
    </div>
</div>
