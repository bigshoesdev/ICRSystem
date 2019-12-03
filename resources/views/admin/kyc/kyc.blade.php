@extends('layout.admin')

@section('title')
    @lang('general/message.all_identity_verify')
@stop

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <br>
                <h4 class="card-title">@lang('general/message.all_identity_verify')</h4>
                <div class="card-content">
                    <br>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">@lang('general/message.id')</th>
                                <th class="text-center">@lang('general/message.type')</th>
                                <th class="text-center">@lang('general/message.name')</th>
                                <th class="text-center">@lang('general/message.dob')</th>
                                <th class="text-center">@lang('general/message.front')</th>
                                <th class="text-center">@lang('general/message.back')</th>
                                <th class="text-center">@lang('general/message.view')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($kycs)
                                @php $id=0;@endphp
                                @foreach($kycs as $kyc)
                                    @php $id++;@endphp
                                    <tr>
                                        <td class="text-center">{{ $id }}</td>
                                        <td class="text-center">{{$kyc->name}}</td>
                                        <td class="text-center">{{$kyc->user->name}}</td>
                                        <td class="text-center">{{$kyc->dob->toFormattedDateString()}}</td>
                                        <td width="20%">
                                            <img src="{{$kyc->front}}" class="img-rounded" alt="Front Page Photo">
                                        </td>
                                        <td width="20%">
                                            <img src="{{$kyc->back}}" class="img-rounded" alt="Back Page Photo">
                                        </td>
                                        <td class="td-actions text-center">
                                            <a href="{{route('admin.kyc.show', $kyc->id)}}" type="button" rel="tooltip"
                                               class="btn btn-success">@lang('general/message.show')</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-5">
                            {{$kycs->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card card-content">
                    <div class="card-content">
                        <form action="{{route('admin.user.index')}}" method="get">
                            <div class="form-group label-floating">
                                <label for="s" class="control-label">Search</label>
                                <input type="text" id="s" name="s" value="{{isset($s) ? $s : ''}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary ">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
