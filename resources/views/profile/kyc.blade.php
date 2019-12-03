@extends('layout.app')
@section('title')
    @lang('general/message.kyc_verify')
@stop

@section('header_styles')
    <style>
        input::-webkit-datetime-edit {
            color: transparent;
        }

        input:focus::-webkit-datetime-edit {
            color: #000;
        }
    </style>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="row">
                    <div class="text-center">
                        <h5 class="title text-danger">@lang('general/message.read_this_before_submit')</h5>
                    </div>
                </div>
                <div class="card-content">
                    <br>
                    @lang('general/message.read_this_before_submit1')
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                @lang('general/message.read_this_before_submit2')
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3 class="title text-center">@lang('general/message.fill_form_with_info')</h3>
            <br/>
            <div class="nav-center">
                <ul class="nav nav-pills nav-pills-info nav-pills-icons" role="tablist">
                    @if($result1)
                    @else
                        <li class="active">
                            <a href="#identity" role="tab" data-toggle="tab">
                                <i class="material-icons">gavel</i> @lang('general/message.identity_verify')
                            </a>
                        </li>
                    @endif

                    @if($result2)
                    @else
                        <li class="{{ $result1? 'active':''}}">
                            <a href="#paddress" role="tab" data-toggle="tab">
                                <i class="material-icons">location_on</i> @lang('general/message.proof_address')
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="tab-content">
                @if($result1)
                @else
                    <div class="tab-pane active" id="identity">
                        <div class="card">
                            <div class="card-content">
                                <form action="{{route('profile.kyc1.submit')}}" method="post"
                                      enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    @if(count($errors) > 0)
                                        <div class="alert alert-danger alert-with-icon" data-notify="container">
                                            <i class="material-icons" data-notify="icon">notifications</i>
                                            <span data-notify="message">
                                                @foreach($errors->all() as $error)
                                                    <li><strong> {{$error}} </strong></li>
                                                @endforeach
                                            </span>
                                        </div>
                                    @endif
                                    <br><br>
                                    <div class="alert alert-info">
                                        <span>@lang('general/message.no_need_doc_type')</span>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-3">
                                            <div class="form-group label-floating">
                                                <select class="selectpicker" name="name"
                                                        data-style="btn btn-warning btn-round"
                                                        title="@lang('general/message.select_doc_type')" data-size="7">
                                                    <option value="National ID Card">@lang('general/message.nation_id_card')</option>
                                                    <option value="International Passport">@lang('general/message.inter_passport')</option>
                                                    <option value="Driver License">@lang('general/message.driver_license')</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label" for="number">
                                                    @lang('general/message.pass_nid_license')
                                                </label>
                                                <input id="number" name="number" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label" for="dob">
                                                    @lang('general/message.date_birth')
                                                </label>
                                                <input id="dob" name="dob" placeholder="" type="date"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-3">
                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                @lang('general/message.max_filesize')
                                                <div class="fileinput-new thumbnail">
                                                    <img src="{{asset('assets/img/dashboard/image_placeholder.jpg')}}"
                                                         alt="...">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                <div>
                                            <span class="btn btn-rose btn-round btn-file">
                                                <span class="fileinput-new">@lang('general/message.sel_front_page')</span>
                                                <span class="fileinput-exists">@lang('general/message.change_front_page')</span>
                                                <input type="file" name="front"/>
                                            </span>
                                                    <a href="#" class="btn btn-danger btn-round fileinput-exists"
                                                       data-dismiss="fileinput">
                                                        <i class="fa fa-times"></i> @lang('general/message.remove')
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-3">
                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                @lang('general/message.max_filesize')
                                                <div class="fileinput-new thumbnail">
                                                    <img src="{{asset('assets/img/dashboard/image_placeholder.jpg')}}"
                                                         alt="...">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                <div>
                                            <span class="btn btn-rose btn-round btn-file">
                                                <span class="fileinput-new">@lang('general/message.sel_back_page')</span>
                                                <span class="fileinput-exists">@lang('general/message.change_back_page')</span>
                                                <input type="file" name="back"/>
                                            </span>
                                                    <a href="#" class="btn btn-danger btn-round fileinput-exists"
                                                       data-dismiss="fileinput"><i
                                                                class="fa fa-times"></i> @lang('general/message.remove')
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <a href="{{route('dashboard')}}"
                                       class="btn btn-rose">@lang('general/message.cancel_verify')</a>
                                    <button type="submit"
                                            class="btn btn-success pull-right">@lang('general/message.submit_verification')
                                    </button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif

                @if($result2)
                @else
                    <div class="tab-pane {{$result1? 'active':''}}" id="paddress">
                        <div class="card">
                            <div class="card-content">
                                <form action="{{route('profile.kyc2.submit')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    @if(count($errors) > 0)
                                        <div class="alert alert-danger alert-with-icon" data-notify="container">
                                            <i class="material-icons" data-notify="icon">notifications</i>
                                            <span data-notify="message">
                                                @foreach($errors->all() as $error)
                                                    <li><strong> {{$error}} </strong></li>
                                                @endforeach
                                            </span>
                                        </div>
                                    @endif
                                    <br><br>
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-3">
                                            <div class="form-group label-floating">
                                                <select class="selectpicker" name="name"
                                                        data-style="btn btn-warning btn-round"
                                                        title="@lang('general/message.select_doc_type')" data-size="7">
                                                    <option value="Bank Statement">@lang('general/message.bank_stat')</option>
                                                    <option value="Utility Bills">@lang('general/message.utility_bill')</option>
                                                    <option value="Credit Card Statement">@lang('general/message.credit_card')
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-3">
                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                @lang('general/message.max_filesize')
                                                <div class="fileinput-new thumbnail">
                                                    <img src="{{asset('assets/img/dashboard/image_placeholder.jpg')}}"
                                                         alt="...">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                    <span class="fileinput-new">@lang('general/message.sel_doc')</span>
                                                    <span class="fileinput-exists">@lang('general/message.change_doc')</span>
                                                    <input type="file" name="photo"/>
                                                    </span>
                                                    <a href="#" class="btn btn-danger btn-round fileinput-exists"
                                                       data-dismiss="fileinput"><i class="fa fa-times"></i>
                                                        @lang('general/message.remove')</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <a href="{{route('dashboard')}}" class="btn btn-rose">
                                        @lang('general/message.cancel_verify')
                                    </a>
                                    <button type="submit" class="btn btn-success pull-right">
                                        @lang('general/message.submit_verification')
                                    </button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
@stop


