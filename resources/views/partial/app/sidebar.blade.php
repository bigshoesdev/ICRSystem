<div class="logo">
    <a href="#" class="simple-text">
        @lang('general/message.member_panel')
    </a>
</div>
<div class="logo logo-mini">
    <a href="#" class="simple-text">
        {{config('app.name')}}
    </a>
</div>

<div class="sidebar-wrapper">
    <div class="user">
        <div class="photo">
            <img src="{{asset(Auth::user()->profile->avatar)}}"/>
        </div>
        <div class="info">
            <a data-toggle="collapse" href="#UserColl" class="collapsed">
                {{ Auth::user()->name }}
                <b class="caret"></b>
            </a>
            <div class="collapse" id="UserColl">
                <ul class="nav">
                    <li>
                        <a href="{{route('profile')}}">@lang('general/message.edit_profile')</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <ul class="nav">
        <li class="{{ Request::is('dashboard') ? "active" :"" }}">
            <a href="{{route('dashboard')}}">
                <i class="material-icons">dashboard</i>
                <p>@lang('general/message.dashboard')</p>
            </a>
        </li>
        <li class="{{ Request::is('deposit') ? "active" :"" }}">
            <a href="{{route('deposit')}}">
                <i class="material-icons">local_atm</i>
                <p>@lang('general/message.deposit')</p>
            </a>
        </li>
        <li class="{{ Request::is('exchange') ? "active" :"" }}">
            <a href="{{route('exchange')}}">
                <i class="material-icons">transfer_within_a_station</i>
                <p>@lang('general/message.exchange')</p>
            </a>
        </li>
        {{--<li class="{{ Request::is('news*') ? "active" :"" }}">--}}
            {{--<a href="{{route('news')}}">--}}
                {{--<i class="material-icons">announcement</i>--}}
                {{--<p>@lang('general/message.news')</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="{{ Request::is('supports*') ? "active" :"" }}">--}}
            {{--<a href="{{route('supports')}}">--}}
                {{--<i class="material-icons">live_help</i>--}}
                {{--<p>@lang('general/message.tickets')</p>--}}
            {{--</a>--}}
        {{--</li>--}}
    </ul>
</div>