@extends('layout.admin')

@section('title')
    @lang('general/message.all_user_open_sup')
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <br>
                <h4 class="card-title">@lang('general/message.all_user_open_sup')</h4>
                <div class="card-content">
                    <br>
                    <br>
                    @if(count($open_supports) > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">@lang('general/message.sn')</th>
                                    <th class="text-center">@lang('general/message.ticket_num')</th>
                                    <th class="text-center">@lang('general/message.subject')</th>
                                    @if(Auth::user()->admin == 1)
                                        <th class="text-center">@lang('general/message.view_user')</th>
                                    @endif
                                    <th class="text-center">@lang('general/message.view_ticket')</th>
                                    <th class="text-center">@lang('general/message.status')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $id=0;@endphp
                                @foreach($open_supports as $support)
                                    @php $id++;@endphp
                                    <tr>
                                        <td class="text-center">{{ $id }}</td>
                                        <td class="text-center"><code>{{$support->ticket}}</code></td>
                                        <td class="text-center">{{$support->subject}}</td>
                                        @if(Auth::user()->admin == 1)
                                            <td class="text-center">
                                                <a href="{{route('admin.user.edit', $support->user->id)}}" type="button"
                                                   class="btn btn-rose">
                                                    <i class="material-icons">search</i> @lang('general/message.view')
                                                </a>
                                            </td>
                                        @endif
                                        <td class="text-center">
                                            <a href="{{route('admin.support.view', $support->ticket)}}" type="button" class="btn btn-info">
                                                <i class="material-icons">search</i> @lang('general/message.view')
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            @if($support->status == 1)
                                                <button class="btn btn-success">
                                                        <span class="btn-label">
                                                            <i class="material-icons">check</i>
                                                        </span>
                                                    @lang('general/message.open')
                                                </button>
                                            @elseif($support->status == 2)
                                                <button class="btn btn-info">
                                                        <span class="btn-label">
                                                            <i class="material-icons">check</i>
                                                        </span>
                                                    @lang('general/message.agent_answer')
                                                </button>
                                            @elseif($support->status == 3)
                                                <button class="btn btn-warning">
                                                        <span class="btn-label">
                                                            <i class="material-icons">check</i>
                                                        </span>
                                                    @lang('general/message.user_answer')
                                                </button>
                                            @elseif($support->status == 0)
                                                <button class="btn btn-danger">
                                                        <span class="btn-label">
                                                            <i class="material-icons">close</i>
                                                        </span>
                                                    @lang('general/message.close')
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <h1 class="text-center">@lang('no_open_sup_req')</h1>
                    @endif
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-5">
                            {{$open_supports->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection