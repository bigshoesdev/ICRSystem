@extends('layout.admin')
@section('title')
    @lang('general/message.all_mem_profile')
@stop
@section('header_styles')
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <br>
                <h4 class="card-title">@lang('general/message.all_member')</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-content">
                            <div class="card-content">
                                <form action="{{route('admin.user.index')}}" method="get">
                                    <div class="col-md-9">
                                        <div class="form-group label-floating">
                                            <label for="s" class="control-label">@lang('general/message.search')</label>
                                            <input type="text" id="s" name="s" value="{{isset($s) ? $s : ''}}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group text-center">
                                            <button type="submit"
                                                    class="btn btn-primary ">@lang('general/message.search')</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">@lang('general/message.id')</th>
                                <th class="text-center">@lang('general/message.photo')</th>
                                <th class="text-center">@lang('general/message.name')</th>
                                <th class="text-center">@lang('general/message.deposit')</th>
                                <th class="text-center">@lang('general/message.coin')</th>
                                <th class="text-center">@lang('general/message.status')</th>
                                <th class="text-center">@lang('general/message.verification')</th>
                                <th class="text-center">@lang('general/message.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($users)
                                @php $id=0;@endphp
                                @foreach($users as $user)
                                    @php $id++;@endphp
                                    <tr>
                                        <td class="text-center">{{ $id }}</td>
                                        <td width="10%">
                                            <img src="{{asset($user->profile->avatar)}}" class="img-circle"
                                                 alt="User Photo">
                                        </td>
                                        <td class="text-center">{{$user->name}}</td>
                                        <td class="text-center">USD $ 0.00 EUR € 0.00</td>
                                        <td class="text-center">ICR ♛ 0.00 BTC ♛ 0.00</td>
                                        <td class="text-center">
                                            @if($user->active == 0)
                                                @lang('general/message.not_active')
                                            @else
                                                @lang('general/message.active')
                                            @endif
                                        </td>
                                        <td class="td-actions text-center">
                                            <span class="text-danger">@lang('general/message.identity'): </span>
                                            @if($user->kycs->count() == 0)
                                                <span class="btn btn-default btn-sm">@lang('general/message.not_verify')</span>
                                            @else
                                                @if($user->kycs->first()->status == false)
                                                    <a href=""
                                                       class="btn btn-warning btn-sm">@lang('general/message.under_review')</a>
                                                @else
                                                    <span class="btn btn-success btn-sm">@lang('general/message.verified')</span>
                                                @endif
                                            @endif
                                            <br/><br/>
                                            <span class="text-danger">@lang('general/message.address'): </span>
                                            @if($user->kyc2s->count() == 0)
                                                <span class="btn btn-default btn-sm">@lang('general/message.not_verify')</span>
                                            @else
                                                @if($user->kyc2s->first()->status == false)
                                                    <a href=""
                                                       class="btn btn-warning btn-sm">@lang('general/message.under_review')</a>
                                                @else
                                                    <span class="btn btn-success btn-sm">@lang('general/message.verified')</span>
                                                @endif
                                            @endif
                                        </td>
                                        <td class="td-actions text-center">
                                            <a href="{{route('admin.user.edit', $user->id)}}" type="button" rel="tooltip"
                                               class="btn btn-rose">@lang('general/message.edit')</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-5">
                            {{$users->appends(['s'=>$s])->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
@stop

