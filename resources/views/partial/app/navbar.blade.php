<nav class="navbar navbar-info  navbar-absolute">

    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            @if(Auth::user()->admin == 1)
                <a class="navbar-brand"
                   href="{{ url('/admin/dashboard') }}"> @lang('general/message.go_admin_panel') </a>
            @endif
            @if(Auth::user()->admin == 2)
                <a class="navbar-brand" href=""> @lang('general/message.go_admin_panel') </a>
            @endif

            @if(Auth::user()->admin == 3)
                <a class="navbar-brand" href=""> @lang('general/message.go_admin_panel') </a>
            @endif
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{route('home')}}"><i class="material-icons">home</i>@lang('general/message.home')</a>
                </li>
                {{--<li>--}}
                    {{--<a href="{{ route('supports') }}"><i class="material-icons">comment</i>@lang('general/message.faq')--}}
                    {{--</a>--}}
                {{--</li>--}}
                <li>
                    <div class="dropdown">
                        <a href="#" class="btn btn-user dropdown-toggle" data-toggle="dropdown">
                            {{ Auth::user()->name }}
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{route('profile')}}">
                                    <i class="material-icons">explicit</i> @lang('general/message.edit_profile')
                                </a>
                            </li>
                            <li>
                                <a onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i class="material-icons">https</i>
                                    @lang('general/message.log_out')
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
@if( Request::is('dashboard'))
<div class="infobar">
        @lang('general/message.deposit'):
        <span style="color:#5cb85c"><strong>USD $ 0.000</strong></span>&nbsp;&nbsp;&nbsp;
        <span style="color:#5cb85c"><strong>EUR € 0.000</strong></span>&nbsp;&nbsp;|&nbsp;&nbsp;
        @lang('general/message.coin'):
        <span style="color:#5cb85c"><strong>ICR ♛ 0.000</strong></span>&nbsp;&nbsp;&nbsp;
        <span style="color:#5cb85c"><strong>BTC ♛ 0.000</strong></span>
</div>
@endif


