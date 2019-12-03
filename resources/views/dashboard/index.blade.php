@extends('layout.app')
@section('title')
    @lang('general/message.dashboard')
@stop
@section('header_styles')
@stop

@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12" style="background-color: white; padding:20px">
                <h4 style="text-align:center">InterCrone Exchange Overview</h4>
                <p style="text-align: justify">InterCrone is a new proof-of-stake digital currency that launched from
                    EdJoWa GmbH. This coin can be elevate quickly to one of the top 10 digital currencies in the world
                    and is being heavily supported by traders, members, and soon to be merchants.</p>
                <p style="text-align: justify">InterCrone will soon be fully integrated into a new cutting edge Merchant
                    platform. Our plan is to make InterCrone a widely accepted currency by utilizing our worldwide
                    network of distributors.</p>
                <p style="text-align: justify">This coin works just like Bitcoin and you can manage your InterCrone
                    tokens in the same way by sending them to your InterCrone address. The big difference is you can
                    also stake your coins to earn more of them. For details click on the Virtual Staking tab below.
                <p style="text-align: justify">Go to - <a href="http://www.intercrone.com">InterCrone.com</a> for news,
                    support and to download an InterCrone wallet</p>
            </div>
            <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-12"
                 style="background-color: white; padding:20px">
                <h4 style="text-align:center">InterCrone Payout Address</h4>
                <p style="text-align: center"><strong>Enter your InterCrone address below and save it!</strong></p>
                <form id="addressForm" class="form-horizontal" method="post" action="">
                    {{ csrf_field() }}
                    @if(count($errors) > 0 && $errors->first('intercrone_address'))
                        <div class="alert alert-danger alert-with-icon" data-notify="container">
                            <i class="material-icons" data-notify="icon">notifications</i>
                            <span data-notify="message">
                          @foreach($errors->all() as $error)
                                    <li><strong> {{$error}} </strong></li>
                                @endforeach
                      </span>
                        </div>
                    @endif
                    <input type="text" required maxlength="34" name="intercrone_address"
                           value="{{ $user->profile->intercrone_address }}" class="form-control"
                           placeholder="Enter InterCrone Address" style="text-align: center;width:100%">
                    <br/>
                    <input type="submit" class="btn btn-info" value="Save InterCrone Address"
                           style="margin:auto;display:flex;"/>
                    <br/>
                </form>
                <strong>NOTE: </strong>InterCrone addresses are 34 characters with no
                dashes or special characters and always begin with "E"
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
@stop


