<div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="http://www.intercrone.com">
            <i class="material-icons">home</i> {{config('app.name')}}
        </a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
            @if (Auth::guest())
                <li>
                    <a href="{{ route('login') }}">
                        <i class="material-icons">fingerprint</i> @lang('general/message.login')
                    </a>
                </li>
                <li>
                    <a href="{{ route('register') }}">
                        <i class="material-icons">subscriptions</i> @lang('general/message.register')
                    </a>
                </li>
            @else
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="material-icons">dashboard</i> @lang('general/message.dashboard')
                    </a>
                </li>
                <li>
                    <div class="dropdown">
                        <a href="#" class="btn btn-success dropdown-toggle"
                           data-toggle="dropdown">{{ Auth::user()->name }}<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('profile') }}">
                                    <i class="material-icons">explicit</i> @lang('general/message.edit_profile')
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="material-icons">https</i>@lang('general/message.log_out')</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">{{ csrf_field() }}</form>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif
        </ul>
    </div>
</div>
