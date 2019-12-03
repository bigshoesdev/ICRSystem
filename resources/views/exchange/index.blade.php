@extends('layout.app')

@section('title')
    @lang('general/message.exchange_money_with_coin_sec')
@stop

@section('header_styles')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-tabs" data-background-color="green">
                    <h4 class="card-title">
                        @lang('general/message.exchange_money_with_coin_sec')
                    </h4>
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-info">
                                <span>@lang('general/message.note_icr_exchange_fee', ['percent' => 5])</span>
                            </div>
                            <form id="form_deposit_instant" class="form-deposit"
                                  action="" method="post" novalidate>
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
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="form-group label-floating">
                                            <select class="selectpicker" name="admin"
                                                    data-style="btn btn-warning btn-round"
                                                    title="@lang('general/message.sel_currency') "
                                                    data-size="7">
                                                <option value="usd"> @lang('general/message.usd')</option>
                                                <option value="eur"> @lang('general/message.eur')</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="form-group label-floating">
                                            <label class="control-label">@lang('general/message.money'): </label>
                                            <input id="amount_eur_bank" data-id="instant" required
                                                   name="amount_eur" step="0.01" type="number"
                                                   class="form-control eur">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="form-group label-floating">
                                            <select class="selectpicker" name="admin"
                                                    data-style="btn btn-warning btn-round"
                                                    title="@lang('general/message.sel_coin') "
                                                    data-size="7">
                                                <option value="usd"> @lang('general/message.icr')</option>
                                                <option value="eur"> @lang('general/message.btc')</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="form-group label-floating">
                                            <label class="control-label">@lang('general/message.coin') : </label>
                                            <input id="fee_bank" readonly name="fee" step="0.01" type="number"
                                                   class="form-control fee">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="form-group label-floating">
                                            <label class="control-label">@lang('general/message.fee') : </label>
                                            <input id="fee_bank" readonly name="fee" step="0.01" type="number"
                                                   class="form-control fee">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="form-group label-floating">
                                            <label class="control-label">@lang('general/message.total')
                                                : </label>
                                            <input id="total_bank" readonly name="amount" step="0.01"
                                                   type="number"
                                                   class="form-control total">
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <a href="{{route('deposit')}}"
                                   class="btn btn-rose">@lang('general/message.cancel_exchange')</a>
                                <button type="submit" data-id="instant"
                                        class="btn btn-success pull-right btn-deposit-next">@lang('general/message.next')
                                </button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card card-content">
                    <div class="card-content">
                        <div class="alert alert-primary">
                            <h4 class="card-title text-center"><span>@lang('general/message.my_deposit')</span></h4>
                        </div>
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="green">
                                <i class="material-icons">done_all</i>
                            </div>
                            <div class="card-content">
                                <p class="category">@lang('general/message.usd')</p>
                                <h4 class="card-title">$ 0.00</h4>
                                <p class="category">@lang('general/message.eur')</p>
                                <h4 class="card-title">€ 0.00</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-content">
                    <div class="card-content">
                        <div class="alert alert-primary">
                            <h4 class="card-title text-center"><span>@lang('general/message.my_coin_bal')</span></h4>
                        </div>
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="green">
                                <i class="material-icons">done_all</i>
                            </div>
                            <div class="card-content">
                                <p class="category">@lang('general/message.btc')</p>
                                <h4 class="card-title">♛ 0.00</h4>
                                <p class="category">@lang('general/message.icr')</p>
                                <h4 class="card-title">♛ 0.00</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="" class="btn btn-danger">@lang('general/message.exchange_history')</a>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
@endsection