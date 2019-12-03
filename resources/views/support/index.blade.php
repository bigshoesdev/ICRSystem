@extends('layout.app')
@section('title')
    @lang('general/message.support_request')
@stop

@section('header_styles')
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-tabs" data-background-color="green">
                    <h4 class="card-title">
                        @lang('general/message.your_support_request')
                    </h4>
                </div>

                <div class="card-content">
                    <div class="row card-content">
                        <a href="{{ route('supports.create') }}" type="button" class="btn btn-primary pull-right">
                            <i class="material-icons">create</i> @lang('general/message.new_ticket')
                        </a>
                    </div>
                    @if(count($supports) > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">@lang('general/message.sn')</th>
                                    <th class="text-center">@lang('general/message.ticket_no')</th>
                                    <th class="text-center">@lang('general/message.subject')</th>
                                    <th class="text-center">@lang('general/message.view')</th>
                                    <th class="text-center">@lang('general/message.status')</th>
                                    <th class="text-center">@lang('general/message.action')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $id=0;@endphp
                                @foreach($supports as $support)
                                    @php $id++;@endphp
                                    <tr>
                                        <td class="text-center">{{ $id }}</td>
                                        <td class="text-center"><code>{{$support->ticket}}</code></td>
                                        <td class="text-center">{{$support->subject}}</td>
                                        <td class="text-center">
                                            <a href="{{route('supports.view', $support->ticket)}}" type="button"
                                               class="btn btn-info">
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
                                                    @lang('general/message.you_answer')
                                                </button>
                                            @elseif($support->status == 0)
                                                <button class="btn btn-success">
                                                        <span class="btn-label">
                                                            <i class="material-icons">close</i>
                                                        </span>
                                                    @lang('general/message.closed')
                                                </button>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($support->status > 0)
                                                <a href="{{route('supports.close', $support->id)}}" type="button"
                                                   class="btn btn-danger ticket-delete">
                                                    <i class="material-icons">close</i> @lang('general/message.close')
                                                </a>
                                            @else
                                                <span type="button" class="btn btn-danger" disabled><i
                                                            class="material-icons">close</i> @lang('general/message.close')
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    @else
                        <h1 class="text-center">@lang('general/message.no_support_request')</h1>
                    @endif
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-5">
                            {{$supports->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
    <script type="text/javascript">
        $(function () {
            $(".ticket-delete").on('click', function (e) {
                e.preventDefault();
                var theHREF = $(this).attr("href");
                $.confirm({
                    title: "@lang('general/message.close_confirm')",
                    content: "@lang('general/message.sure_close_ticket')",
                    buttons: {
                        Confirm: {
                            btnClass: 'btn-warning',
                            action: function () {
                                window.location.href = theHREF;
                            }
                        },
                        Cancel: {
                            btnClass: 'btn-blue',
                        }
                    }
                });
            });
        })
    </script>
@stop


