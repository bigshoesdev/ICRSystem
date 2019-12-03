@extends('layout/home')

@section('title')
    @lang('general/message.home')
@stop

@section('header_styles')
    <link rel="stylesheet" href="{{asset('assets/css/home.css')}}">
@stop

@section('content')
    <div id="app">
        <div>
            <div class="bg-wrapper animated-all" style="height:750auto;">
                <div class="header-bg">
                    @include('partial/home/navbar')
                    <div class="container">
                        <h1 class="text-lighter">
                            <span>@lang('general/message.exchange_intercrone')</span>
                        </h1>
                        <h2 class="h2-landing">
                            <span>@lang('general/message.transfer_moeney')</span></h2>
                        <div class="" style="position:relative">
                            <div class="col-with-error">
                                <form class="form-inline form-exchange">
                                    <div class="form-group form-group-shadow">
                                        <div class="input-group input-group-currency">
                                            <div class="input-group-addon uppercase">
                                                <span>@lang('general/message.you_have')</span>
                                            </div>
                                            <input type="text" class="form-control" name="amount" value=""
                                                   autocomplete="off">
                                            <div class="input-group-btn">
                                                <button type="button"
                                                        class="btn btn-default dropdown-toggle uppercase dropdown-toggle-big currency-btn">
                                                    <b id="currency-label">@lang('general/message.usd')</b>
                                                    <span class="glyphicon menu-down"></span>
                                                </button>
                                                <div class="box__wrapper currency_wrapper" style="display:none;">
                                                    <div class="list__wrapper" style="width: 220px;">
                                                        <div class="currency_select_block_scroll_bar"
                                                             style="position: relative; overflow: hidden; width: 240px; height: 80px;">
                                                            <div style="position: absolute; top: 0px; left: 0px; right: 0px; bottom: 0px; overflow: scroll; margin-right: -15px;margin-bottom:-15px;">
                                                                <div class="items__wrapper" style="width: 235px;">
                                                                    <div class="row item__wrapper" data-currency="usd" data-label="@lang('general/message.usd')"
                                                                         style="height: 40px;">
                                                                        <div class="col-xs-4 coin_short text-right uppercase">
                                                                            @lang('general/message.usd')
                                                                        </div>
                                                                        <div class="col-xs-2 icon__wrapper">
                                                                            <img class="glyphicon coin_icon"
                                                                                 src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHZpZXdCb3g9IjAgMCAyMCAyMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMTAuNzk2IDE2Ljc4NHYxLjUwMWEuMjMuMjMgMCAwIDEtLjIxNS4yMTVIOS4zNDhhLjIzLjIzIDAgMCAxLS4yMTUtLjIxNXYtMS41MDFjLTEuOTg0LS4yMTUtMy4yMTctMS4yODctMy41OTMtMS42MDktLjA1My0uMDU0LS4wNTMtLjE2IDAtLjI2OGwxLjA3My0xLjUwMmMuMDUzLS4xMDcuMjE0LS4xMDcuMjY4LS4wNTMuNDI5LjM3NSAxLjY2MiAxLjI4NyAzLjE2NCAxLjI4NyAxLjAxOSAwIDEuOTMtLjUzNiAxLjkzLTEuNjA5IDAtMi4yNTItNi4yNzQtMi4wMzgtNi4yNzQtNi4wMDYgMC0xLjkzIDEuNDQ4LTMuNDMzIDMuNDg2LTMuNzU0VjEuNzE1QS4yMy4yMyAwIDAgMSA5LjQgMS41aDEuMjM0YS4yMy4yMyAwIDAgMSAuMjE0LjIxNXYxLjUwMWMxLjc3LjE2MSAyLjg0My45NjUgMy4xNjQgMS4yMzQuMDU0LjA1My4xMDguMTYuMDU0LjIxNGwtLjg1OCAxLjYwOWMtLjA1NC4xMDctLjIxNS4xNi0uMjY4LjA1My0uMzc2LS4zMjEtMS40NDgtMS4wMTgtMi43MzUtMS4wMTgtMS4xMjYgMC0xLjk4NC42NDMtMS45ODQgMS42MDggMCAyLjIgNi4yNzQgMS44MjQgNi4yNzQgNi4wMDctLjEwNyAxLjkzLTEuNDQ4IDMuNTQtMy43IDMuODYiIGZpbGw9IiMxMEQwNzgiIGZpbGwtcnVsZT0iZXZlbm9kZCIvPjwvc3ZnPg=="
                                                                                 alt="usd"></div>
                                                                        <div class="col-xs-6 coin_full">@lang('general/message.usd_dollar')</div>
                                                                    </div>
                                                                    <div class="row item__wrapper" data-currency="euro" data-label="@lang('general/message.eur')"
                                                                         style="height: 40px;">
                                                                        <div class="col-xs-4 coin_short text-right uppercase">
                                                                            @lang('general/message.eur')
                                                                        </div>
                                                                        <div class="col-xs-2 icon__wrapper">
                                                                            <img class="glyphicon coin_icon"
                                                                                 src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHZpZXdCb3g9IjAgMCAyMCAyMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMTUuMDE2IDE3LjE4M2E4LjI5NiA4LjI5NiAwIDAgMS0yLjIxOC4zMTdjLTMuNDg2IDAtNi4xMjctMi4xNjUtNi45NzItNS4zMzVINC42MTFhLjIyNy4yMjcgMCAwIDEtLjIxMS0uMjF2LTEuMTYzYzAtLjEwNS4xMDYtLjIxMS4yMTEtLjIxMWguOTUxYy0uMDUzLS4zMTctLjA1My0uODQ1IDAtMS4yNjhoLS45NWEuMjI3LjIyNyAwIDAgMS0uMjEyLS4yMVY3Ljk0YzAtLjEwNS4xMDYtLjIxMS4yMTEtLjIxMWgxLjIxNUM2LjcyNCA0LjY2NSA5LjQxOCAyLjUgMTIuNzk4IDIuNWMuODQ1IDAgMS42MzcuMTU4IDIuMDA3LjIxMS4xMDYgMCAuMTU4LjEwNi4xNTguMjEybC0uNTI4IDIuMDA3YzAgLjEwNS0uMTA1LjE1OC0uMjExLjE1OGE3LjY1NiA3LjY1NiAwIDAgMC0xLjQyNi0uMTU4Yy0xLjk1NCAwLTMuNDMzIDEuMDU2LTQuMDY3IDIuNzk5aDQuNTQyYy4xMDYgMCAuMjEyLjEwNi4yMTIuMjExbC0uMjEyIDEuMTYyYzAgLjEwNi0uMTA1LjE1OS0uMjExLjE1OUg4LjQxNGMtLjA1My4zNy0uMDUzLjg0NSAwIDEuMjY3aDQuMzMxYy4xMDYgMCAuMjExLjEwNi4yMTEuMjExbC0uMjEgMS4xNjJjMCAuMTA2LS4xMDcuMTU5LS4yMTIuMTU5SDguODg5Yy42MzQgMS43NDMgMi4yMTkgMi44NTIgNC4wNjcgMi44NTIuNzQgMCAxLjM3NC0uMTU4IDEuNjktLjIxMS4xMDYtLjA1My4yMTIuMDUzLjIxMi4xNThsLjQyMiAyLjAwN2MtLjEwNS4yMTEtLjIxMS4zMTctLjI2NC4zMTciIGZpbGw9IiMxMEQwNzgiIGZpbGwtcnVsZT0iZXZlbm9kZCIvPjwvc3ZnPg=="
                                                                                 alt="eur"></div>
                                                                        <div class="col-xs-6 coin_full">@lang('general/message.euro')</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-change">
                                        <a href="#" class="img-change">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAPCAMAAADJev/pAAAAP1BMVEX///////////////////////////////////////////////////////////////////////////////////81m6ZbAAAAFXRSTlMABhQqLEtucHGSk5SWsbKzydni5+iF4Q8iAAAAXElEQVR4AXXOxQFEMQgEUEJkPTr9t7puH3lHdEipTDaM7DSwjsFuAD2Kytcs9MQX2dg/63lAnEp0Fw4Lm8Y6P5/Hjjsdt0x8PfuN6WknG1/pe0oKp2U0RFyJG0k3pDQHtUizpCYAAAAASUVORK5CYII="
                                                 alt="">
                                        </a>
                                    </div>
                                    <div class="form-group form-group-shadow dest-cc input-bg-transparent transparent">
                                        <div class="input-group input-group-currency">
                                            <div class="input-group-addon uppercase">
                                                <span>@lang('general/message.you_get')</span>
                                            </div>
                                            <input type="text" readonly="" value="" class="form-control light">
                                            <div class="input-group-btn">
                                                <button type="button"
                                                        class="btn btn-default dropdown-toggle uppercase dropdown-toggle-big coin-btn">
                                                    <b id="coin-label">@lang('general/message.btc')</b>
                                                    <span class="glyphicon menu-down"></span>
                                                </button>
                                                <div class="box__wrapper coin_wrapper" style="display: none;">
                                                    <div class="list__wrapper" style="width: 220px;">
                                                        <div class="coin_select_block_scroll_bar"
                                                             style="position: relative; overflow: hidden; width: 240px; height: 80px;">
                                                            <div style="position: absolute; top: 0px; left: 0px; right: 0px; bottom: 0px; overflow: scroll; margin-right: -15px;margin-bottom:-15px;">
                                                                <div class="items__wrapper" style="width: 235px;">
                                                                    <div class="row item__wrapper" data-coin="btc" data-label="@lang('general/message.btc')"
                                                                         style="height: 40px;">
                                                                        <div class="col-xs-4 coin_short text-right uppercase">
                                                                            @lang('general/message.btc')
                                                                        </div>
                                                                        <div class="col-xs-2 icon__wrapper">
                                                                            <img class="glyphicon bitcoin"
                                                                                 style="margin-top: 5px;"
                                                                                 src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHZpZXdCb3g9IjAgMCAyMCAyMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNOC45NDIgNi4wMzN2My4wMDhoMS40MjdjLjI3OCAwIC41NTUtLjA0MS44MjEtLjEyMWEyLjE3IDIuMTcgMCAwIDAgLjY0OS0uMzE5IDEuNjYgMS42NiAwIDAgMCAuNDYzLS41MTYgMS4xMDIgMS4xMDIgMCAwIDAgMC0xLjA5NiAxLjY1MSAxLjY1MSAwIDAgMC0uNDYzLS41MTYgMi4xOSAyLjE5IDAgMCAwLS42NDktLjMyIDIuOTA1IDIuOTA1IDAgMCAwLS44MjEtLjEySDguOTQyem0zLjk5NSA1LjYxN2EyLjAzMyAyLjAzMyAwIDAgMC0uNjE1LS42IDIuOTY4IDIuOTY4IDAgMCAwLS44MzYtLjM1OSA0LjMyIDQuMzIgMCAwIDAtMS4wODctLjEzOUg4Ljk0MnYzLjQwNGgxLjQ1N2MuMzY3IDAgLjczMi0uMDQ3IDEuMDg3LS4xNC4yOTUtLjA3Ni41NzctLjE5OC44MzYtLjM1OS4yNDUtLjE1NC40NTUtLjM1OC42MTUtLjZhMS4wOTIgMS4wOTIgMCAwIDAgMC0xLjIwN3ptLTUuNDE4IDMuOTI4SDQuNWwuMjg4LTEuNjIyaDEuMDZhLjU3Ny41NzcgMCAwIDAgLjU3Ny0uNTc4VjYuNjFhLjU3Ni41NzYgMCAwIDAtLjU3Ny0uNTc2SDQuNTA5VjQuNDFoMy4wMVYyaDEuNDIzdjIuNDFoMS4yMjdWMmgxLjQyMnYyLjQxaC4wM2MuNDM2IDAgLjg3LjA2MyAxLjI4OC4xODcuNDA2LjEyMy43OS4zMTIgMS4xMzQuNTYuMzc1LjI3My42OS42MjIuOTIgMS4wMjVhMi43MiAyLjcyIDAgMCAxIDAgMi43MSAzLjI2OSAzLjI2OSAwIDAgMS0uNTMuNjkxbC4xNTQuMDkxYy40NDEuMjc3LjgxOS42NDUgMS4xMDcgMS4wOGEyLjcxNSAyLjcxNSAwIDAgMSAwIDMgMy42NiAzLjY2IDAgMCAxLTEuMTA3IDEuMDhjLS40LjI0OC0uODM1LjQzNi0xLjI5LjU1NS0uNDg4LjEyNS0uOTkuMTg5LTEuNDk0LjE4OWgtLjIxMVYxOGgtMS40MjN2LTIuNDIySDguOTQyVjE4SDcuNTJ2LTIuNDIyeiIgZmlsbD0iIzEwRDA3OCIgZmlsbC1ydWxlPSJldmVub2RkIi8+PC9zdmc+"
                                                                                 alt="btc"></div>
                                                                        <div class="col-xs-6 coin_full">@lang('general/message.bitcoin')</div>
                                                                    </div>
                                                                    <div class="row item__wrapper" data-coin="icr" data-label="@lang('general/message.icr')"
                                                                         style="height: 40px;">
                                                                        <div class="col-xs-4 coin_short text-right uppercase">
                                                                            @lang('general/message.icr')
                                                                        </div>
                                                                        <div class="col-xs-2 icon__wrapper">
                                                                            <span style="color:#da9c82;font-size: 15px;line-height: 35px;">♛</span>
                                                                        </div>
                                                                        <div class="col-xs-6 coin_full">@lang('general/message.intercrone')</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-exchange pull-right">
                                        <a href="{{route('exchange')}}" class="btn btn-lg btn-green btn-exchange btn-arrow-right"
                                           role="button">
                                            <span>@lang('general/message.exchange')</span>
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="stick-to-bottom">
                            <div class="inline-block div-offer-rate">
                                <div class="circle-text div-best-rate">
                                    <a href="{{route('deposit')}}" rel="noopener noreferrer" class="fiat-holder">
                                        <span class="fiat-offer"></span>
                                        <span class="fiat-offer-highlighted hidden"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="benefits" style=" padding-bottom: 0px;">
                <div class="container">
                    <div class="row table-benefits text-center">
                        <section class="col-xs-4" style="padding:0 60px">
                            <h2 class="text-bold"><span>@lang('general/message.fair')</span></h2>
                            <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjEwIiBoZWlnaHQ9IjIyNSIgdmlld0JveD0iMCAwIDIxMCAyMjUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHRpdGxlPmljX2ZhaXI8L3RpdGxlPjxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+PHBhdGggZD0iTTY4Ljg1NSAxNUwxNSA2OC44NTUiIGZpbGw9IiMwRURBN0MiLz48cGF0aCBkPSJNNjguODU1IDE1TDE1IDY4Ljg1NSIgc3Ryb2tlLW9wYWNpdHk9Ii43IiBzdHJva2U9IiNGNUY1RjUiIHN0cm9rZS13aWR0aD0iMzAiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIvPjxwYXRoIGQ9Ik0xMjYuNjg3IDI5LjQ1OGwtOTcuNTkgOTcuNTkiIGZpbGw9IiMwRURBN0MiLz48cGF0aCBkPSJNMTI2LjY4NyAyOS40NThsLTk3LjU5IDk3LjU5IiBzdHJva2Utb3BhY2l0eT0iLjciIHN0cm9rZT0iI0Y1RjVGNSIgc3Ryb2tlLXdpZHRoPSIzMCIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIi8+PHBhdGggZD0iTTE4NS4yNDEgNDMuMTkzbC0xMDIuNjUgMTAyLjY1IiBmaWxsPSIjMEVEQTdDIi8+PHBhdGggZD0iTTE4NS4yNDEgNDMuMTkzbC0xMDIuNjUgMTAyLjY1IiBzdHJva2Utb3BhY2l0eT0iLjciIHN0cm9rZT0iI0Y1RjVGNSIgc3Ryb2tlLXdpZHRoPSIzMCIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIi8+PHBhdGggZD0iTTE5NC42MzkgMTA2LjA4NEw5MS4yNjUgMjA5LjQ1OCIgZmlsbD0iIzBFREE3QyIvPjxwYXRoIGQ9Ik0xOTQuNjM5IDEwNi4wODRMOTEuMjY1IDIwOS40NTgiIHN0cm9rZS1vcGFjaXR5PSIuNyIgc3Ryb2tlPSIjRjVGNUY1IiBzdHJva2Utd2lkdGg9IjMwIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz48cGF0aCBkPSJNMTY0LjI0NCA5MC4zNTNhNS42NzIgNS42NzIgMCAxIDEtMTEuMzQ0IDAgNS42NzIgNS42NzIgMCAwIDEgMTEuMzQ0IDB6TTU0LjU4IDQxLjE5M2E1LjY3MiA1LjY3MiAwIDEgMS0xMS4zNDQuMDAxIDUuNjcyIDUuNjcyIDAgMCAxIDExLjM0NCAwem0xNi4zODYtNS42NzJhMi41MjEgMi41MjEgMCAxIDEtNS4wNDIgMCAyLjUyMSAyLjUyMSAwIDAgMSA1LjA0MiAwek03Ny44OCAxNTYuNTNIMzMuNzgyQTMuNzgyIDMuNzgyIDAgMCAxIDMwIDE1Mi43NDdWNjEuOTkyYTMuNzgyIDMuNzgyIDAgMCAxIDMuNzgxLTMuNzgyaDEwMi4xMDFhMy43ODIgMy43ODIgMCAwIDEgMy43ODIgMy43ODJ2MzkuNzA3bS0xMDAuODQgMTUuMTI2di0xMy40NzciIHN0cm9rZT0iIzYxNjE2MSIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz48cGF0aCBkPSJNNzcuODgxIDE0Ny43MDZINDEuMzQ0YTIuNTIxIDIuNTIxIDAgMCAxLTIuNTItMi41MjF2LTcuMzM2bTAtNjAuODg5di03LjQwNmEyLjUyMSAyLjUyMSAwIDAgMSAyLjUyLTIuNTJoODYuOTc1YTIuNTIxIDIuNTIxIDAgMCAxIDIuNTIxIDIuNTJ2MjcuNzI3IiBzdHJva2U9IiM2MTYxNjEiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIi8+PHBhdGggZD0iTTgxLjY4IDEzMi41OGMwIC41NzMuMDEzIDEuMTQuMDQ1IDEuNzA4YTI2Ljg5IDI2Ljg5IDAgMCAxLTEwLjUxMy0zLjQ4Yy01LjItNC45NC04LjQzOS0xMS45MTctOC40MzktMTkuNjU3IDAtMTQuOTY4IDEyLjEzMi0yNy4xIDI3LjEtMjcuMSA0Ljk2NyAwIDkuNjE5IDEuMzM2IDEzLjYyIDMuNjYxYTI3LjAyMiAyNy4wMjIgMCAwIDEgNi4xOSA4LjgzYy0xNi4wOTcgNC4wODQtMjguMDAyIDE4LjY3NC0yOC4wMDIgMzYuMDM4IiBmaWxsPSIjMTBEMDc4Ii8+PHBhdGggZD0iTTgxLjcyNSAxMzQuMjk0Yy0xMy41MDctMS41MzctMjMuOTk0LTEzLjAwOC0yMy45OTQtMjYuOTI0IDAtMTQuOTY5IDEyLjEzMi0yNy4xMDEgMjcuMS0yNy4xMDEgMTEuMTE4IDAgMjAuNjczIDYuNjkzIDI0Ljg1MiAxNi4yNzNNODQuODMyIDg1Ljk0MXY2LjkzM20tMjEuNzQ0IDE0LjgxMWg2LjkzM20tLjU2NC0xNS4zNzVsNC45MDIgNC45MDJtLTQuOTAyIDI1Ljg0OGw0LjkwMi00LjkwMm0yMC45NDYtMjAuOTQ2bDQuOTAyLTQuOTAyIiBzdHJva2U9IiM2MTYxNjEiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIi8+PHBhdGggZD0iTTQ3LjAxNyAxMDAuNDM3aC02LjMwM2ExLjI2IDEuMjYgMCAwIDEtMS4yNi0xLjI2Vjg1Ljk0YzAtLjY5Ni41NjQtMS4yNiAxLjI2LTEuMjZoNi4zMDNjLjY5NiAwIDEuMjYuNTY0IDEuMjYgMS4yNnYxMy4yMzVhMS4yNiAxLjI2IDAgMCAxLTEuMjYgMS4yNjFtMCAzNC42NjRoLTYuMzAzYTEuMjYgMS4yNiAwIDAgMS0xLjI2LTEuMjZ2LTEzLjIzNWMwLS42OTYuNTY0LTEuMjYgMS4yNi0xLjI2aDYuMzAzYy42OTYgMCAxLjI2LjU2NCAxLjI2IDEuMjZ2MTMuMjM1YTEuMjYgMS4yNiAwIDAgMS0xLjI2IDEuMjYiIGZpbGw9IiMxMEQwNzgiLz48cGF0aCBkPSJNNDMuODY2IDk3LjkxNmgtNi4zMDNhMS4yNiAxLjI2IDAgMCAxLTEuMjYtMS4yNlY4My40MmMwLS42OTYuNTY0LTEuMjYgMS4yNi0xLjI2aDYuMzAzYy42OTUgMCAxLjI2LjU2NCAxLjI2IDEuMjZ2MTMuMjM1YzAgLjY5Ni0uNTY1IDEuMjYxLTEuMjYgMS4yNjF6bTAgMzQuNjY0aC02LjMwM2ExLjI2IDEuMjYgMCAwIDEtMS4yNi0xLjI2di0xMy4yMzZjMC0uNjk2LjU2NC0xLjI2IDEuMjYtMS4yNmg2LjMwM2MuNjk1IDAgMS4yNi41NjQgMS4yNiAxLjI2djEzLjIzNWExLjI2IDEuMjYgMCAwIDEtMS4yNiAxLjI2em0yMC4xNjggMjMuOTV2NS4wNDFINDcuMDE3bTc3LjUyMS03OC4xNTF2LTguMTkzYTEuODkgMS44OSAwIDAgMC0xLjg5LTEuODloLTguMTk0bTM1LjI1NyA4MC4wMTZjLTYuNjgxIDkuOS0xOC4wMDMgMTYuNDEyLTMwLjg0NiAxNi40MTItMjAuNTM2IDAtMzcuMTg0LTE2LjY0OC0zNy4xODQtMzcuMTg1IDAtMjAuNTM3IDE2LjY0OC0zNy4xODUgMzcuMTg0LTM3LjE4NSAyMC41MzcgMCAzNy4xODUgMTYuNjQ4IDM3LjE4NSAzNy4xODUgMCA0LjQxNC0uNzcgOC42NS0yLjE4IDEyLjU3OU04OS4yNDQgMTMyLjU4YzAtMTMuMSA4LjU0Ny0yNC4yNCAyMC4zNTctMjguMTM4bS0xNi4xOTUgNDMuMjY2YTI5LjQwOCAyOS40MDggMCAwIDEtMy42OTMtOS44Nm01OS44ODItNjkuMDg2bDUuMzQ4LTUuMzQ3bTAgNS4zNDdsLTUuMzQ4LTUuMzQ3IiBzdHJva2U9IiM2MTYxNjEiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIi8+PHBhdGggZD0iTTExNS4wODQgMTI1LjAxN2E1LjA0MiA1LjA0MiAwIDEgMS0xMC4wODQgMCA1LjA0MiA1LjA0MiAwIDAgMSAxMC4wODQgMHptMTYuMzg2IDE2LjM4NmE1LjA0MiA1LjA0MiAwIDEgMS0xMC4wODQgMCA1LjA0MiA1LjA0MiAwIDAgMSAxMC4wODUgMHptMi41MjItMjMuOTQ5bC0zMC4yNTMgMzAuMjUybTUwLjQyMS0yLjUyMUgxODBtLTMwLjI1MiA4LjE5M2gxNS4xMjZtLTIyLjA1OSA4LjE5M2g4LjgyNG0tNjYuNDYxLTQ0Ljc1NGMtLjExMy4wMDctLjIzMy4wMDctLjM0Ni4wMDctNS4yMTkgMC05LjQ1NC00LjIzNi05LjQ1NC05LjQ1NCAwLTUuMjIgNC4yMzUtOS40NTQgOS40NTQtOS40NTQgNC4zODYgMCA4LjA3MyAyLjk4NyA5LjE0NSA3LjA0IiBzdHJva2U9IiM2MTYxNjEiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIi8+PC9nPjwvc3ZnPg==">
                            <p>@lang('general/message.fair_desc')</span>
                            </p>
                        </section>
                        <section class="col-xs-4" style="padding:0 60px">
                            <h2 class="text-bold"><span>@lang('general/message.fast')</span></h2>
                            <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjEwIiBoZWlnaHQ9IjIyNSIgdmlld0JveD0iMCAwIDIxMCAyMjUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHRpdGxlPmljX2Zhc3Q8L3RpdGxlPjxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+PHBhdGggZD0iTTY4Ljg1NSAxNUwxNSA2OC44NTUiIGZpbGw9IiMwRURBN0MiLz48cGF0aCBkPSJNNjguODU1IDE1TDE1IDY4Ljg1NSIgc3Ryb2tlLW9wYWNpdHk9Ii43IiBzdHJva2U9IiNGNUY1RjUiIHN0cm9rZS13aWR0aD0iMzAiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIvPjxwYXRoIGQ9Ik0xMjYuNjg3IDI5LjQ1OGwtOTcuNTkgOTcuNTkiIGZpbGw9IiMwRURBN0MiLz48cGF0aCBkPSJNMTI2LjY4NyAyOS40NThsLTk3LjU5IDk3LjU5IiBzdHJva2Utb3BhY2l0eT0iLjciIHN0cm9rZT0iI0Y1RjVGNSIgc3Ryb2tlLXdpZHRoPSIzMCIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIi8+PHBhdGggZD0iTTE4NS4yNDEgNDMuMTkzbC0xMDIuNjUgMTAyLjY1IiBmaWxsPSIjMEVEQTdDIi8+PHBhdGggZD0iTTE4NS4yNDEgNDMuMTkzbC0xMDIuNjUgMTAyLjY1IiBzdHJva2Utb3BhY2l0eT0iLjciIHN0cm9rZT0iI0Y1RjVGNSIgc3Ryb2tlLXdpZHRoPSIzMCIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIi8+PHBhdGggZD0iTTE5NC42MzkgMTA2LjA4NEw5MS4yNjUgMjA5LjQ1OCIgZmlsbD0iIzBFREE3QyIvPjxwYXRoIGQ9Ik0xOTQuNjM5IDEwNi4wODRMOTEuMjY1IDIwOS40NTgiIHN0cm9rZS1vcGFjaXR5PSIuNyIgc3Ryb2tlPSIjRjVGNUY1IiBzdHJva2Utd2lkdGg9IjMwIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz48cGF0aCBkPSJNMTI2LjIzNiAxMjMuNTRoLTMwLjg1Yy0xLjM2Ni04LjMzNy00LjE3Ny0yNy43NS0zLjE0My00MS4yMTYgMi41NDctMzMuMDc0IDIwLjk0Ni00NS4yNyAyMC45NDYtNDUuMjdzLjY2My40NCAxLjc1NyAxLjM3OGM1LjYyMSA2LjQyNiAxMy41MjcgMTguOTggMTUuMTM1IDM5LjgzOCAxLjM1MSAxNy41NjgtMy44NDUgNDUuMjctMy44NDUgNDUuMjciIGZpbGw9IiMxMEQwNzgiLz48cGF0aCBkPSJNNTEuNjA3IDE0My44ODhjLTMuODQtOC4yMzQtNS45ODUtMTcuNDE4LTUuOTg1LTI3LjEwNCAwLTIwLjA3NCA5LjIxNS0zOCAyMy42NDktNDkuNzdtODEuMDgtLjAwMUMxNjQuNzg0IDc4Ljc4MyAxNzQgOTYuNzEgMTc0IDExNi43ODNjMCAzNS40NTMtMjguNzM2IDY0LjE5LTY0LjE5IDY0LjE5LTIyLjQ0NiAwLTQyLjItMTEuNTItNTMuNjc0LTI4Ljk3MSIgc3Ryb2tlPSIjNjE2MTYxIiBzdHJva2Utd2lkdGg9IjIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIvPjxwYXRoIGQ9Ik0xMjEuMjk3IDEyMy41NHYzLjM3OWE0LjA1NSA0LjA1NSAwIDAgMS00LjA1NCA0LjA1NEg5OC4zMjRtMTkuNTk1LTUwLjY3NmE4LjEwOCA4LjEwOCAwIDEgMS0xNi4yMTcgMCA4LjEwOCA4LjEwOCAwIDAgMSAxNi4yMTcgMHoiIHN0cm9rZT0iIzYxNjE2MSIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz48cGF0aCBkPSJNMTE3LjkxOSA4MC4yOTdhOC4xMDggOC4xMDggMCAxIDEtMTYuMjE3IDAgOC4xMDggOC4xMDggMCAwIDEgMTYuMjE3IDB6bS0xMi4xNjIgMGE0LjA1OCA0LjA1OCAwIDAgMSA0LjA1NC00LjA1NG00LjcyOSA1NC43M3YyMy42NDltLTkuNDU5LTIzLjY0OXYxMS40ODZtOS40NTkgMTIuMTYzYzAtNi4zNDQgNS4xNDMtMTEuNDg3IDExLjQ4Ny0xMS40ODdzMTEuNDg3IDUuMTQzIDExLjQ4NyAxMS40ODdtLTQuNzk0LTkuMzMyYTEyLjE1MSAxMi4xNTEgMCAwIDEgMTAuMi01LjUzMyAxMi4xMSAxMi4xMSAwIDAgMSA3Ljc3NCAyLjgxbS0zLjg5NC0yLjE3NWMxLjY0Ny02LjAxMyA3LjE1LTEwLjQzMyAxMy42ODctMTAuNDMzTTk4LjMzOCAxNDYuNWExMS40NSAxMS40NSAwIDAgMC04LjEyMi0zLjM2NWMtNi4zNDMgMC0xMS40ODcgNS4xNDMtMTEuNDg3IDExLjQ4NyIgc3Ryb2tlPSIjNjE2MTYxIiBzdHJva2Utd2lkdGg9IjIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIvPjxwYXRoIGQ9Ik04My41MjMgMTQ1LjI5YTEyLjE1MSAxMi4xNTEgMCAwIDAtMTAuMTk5LTUuNTMzIDEyLjExNiAxMi4xMTYgMCAwIDAtNy43NzUgMi44MW0zLjg5NC0yLjE3NWMtMS42NDYtNi4wMTMtNy4xNS0xMC40MzMtMTMuNjg2LTEwLjQzM20zNi4yNzMtNi40MTlzLTUuMTkzLTI3LjcwMi0zLjg0MS00NS4yN0M5MC43MzMgNDUuMTk4IDEwOS4xMzUgMzMgMTA5LjEzNSAzM3MxOC40MDIgMTIuMTk4IDIwLjk0NiA0NS4yN2MxLjM1MSAxNy41NjgtMy44NDEgNDUuMjctMy44NDEgNDUuMjdIOTIuMDN6IiBzdHJva2U9IiM2MTYxNjEiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIi8+PHBhdGggZD0iTTEyNi4yMzYgMTIzLjU0SDkyLjAzNHMtNS4xOTYtMjcuNzAyLTMuODQ1LTQ1LjI3QzkwLjczNiA0NS4xOTYgMTA5LjEzNSAzMyAxMDkuMTM1IDMzczIuNTEzIDEuNjYyIDUuODEgNS40MzJjNS42MjIgNi40MjYgMTMuNTI4IDE4Ljk4IDE1LjEzNiAzOS44MzggMS4zNTEgMTcuNTY4LTMuODQ1IDQ1LjI3LTMuODQ1IDQ1LjI3ek0xMDkuODEgNjMuNDA1aDE3LjU2OG0tMjUuNjc1IDBoNC4wNTQiIHN0cm9rZT0iIzYxNjE2MSIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz48cGF0aCBkPSJNMTMwLjAxNCA5OC41NGM3LjE4MiAxLjY2MyAxMi41NCA4LjEwMiAxMi41NCAxNS43OTEgMCA3LjcxNi01LjM5MiAxNC4xNzYtMTIuNjE1IDE1LjgwNGExNi4wOTIgMTYuMDkyIDAgMCAwLTMuMjM2LTYuNTA3TTg4LjU2NyA5OC41NGMtNy4xODIgMS42NjMtMTIuNTQgOC4xMDItMTIuNTQgMTUuNzkxIDAgNy43MTYgNS4zOTIgMTQuMTc2IDEyLjYxNSAxNS44MDRhMTYuMDkyIDE2LjA5MiAwIDAgMSAzLjIzNi02LjUwN20tMTAuNDQ2LTguODcxYzAtMy4zOCAxLjQ2LTYuNDIgMy43ODUtOC41MjJtLTIuMzEyIDE0LjE1M2ExMS40NDQgMTEuNDQ0IDAgMCAxLTEuMDQzLTIuNTA4TTYzLjg2NSA0Ny44NjVhNi4wOCA2LjA4IDAgMSAxLTEyLjE2MiAwIDYuMDggNi4wOCAwIDEgMSAxMi4xNjIgMHptOTYuNjIxIDYuNzU3YTMuMzc4IDMuMzc4IDAgMSAxLTYuNzU2IDAgMy4zNzggMy4zNzggMCAwIDEgNi43NTYgMHpNODQuMTM1IDM1LjcwM2EyLjcwMyAyLjcwMyAwIDEgMS01LjQwNiAwIDIuNzAzIDIuNzAzIDAgMCAxIDUuNDA2IDB6bTU0LjU2NiA4LjYxbDUuNzMzLTUuNzMzbTAgNS43MzNMMTM4LjcgMzguNThNNTEuNzAzIDE0My44MUgyNG0zMS43NTcgOC4xMDlIMzkuNTRtMjIuOTc0IDguNzg0aC05LjQ2IiBzdHJva2U9IiM2MTYxNjEiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIi8+PC9nPjwvc3ZnPg==">
                            <p><span>@lang('general/message.fast_desc')</span></p>
                        </section>
                        <section class="col-xs-4" style="padding:0 60px">
                            <h2 class="text-bold"><span>@lang('general/message.trusty')</span></h2>
                            <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjEwIiBoZWlnaHQ9IjIyNSIgdmlld0JveD0iMCAwIDIxMCAyMjUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHRpdGxlPmljX1RydXN0eTwvdGl0bGU+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBkPSJNNjguODU1IDE1TDE1IDY4Ljg1NSIgZmlsbD0iIzBFREE3QyIvPjxwYXRoIGQ9Ik02OC44NTUgMTVMMTUgNjguODU1IiBzdHJva2Utb3BhY2l0eT0iLjciIHN0cm9rZT0iI0Y1RjVGNSIgc3Ryb2tlLXdpZHRoPSIzMCIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIi8+PHBhdGggZD0iTTEyNi42ODcgMjkuNDU4bC05Ny41OSA5Ny41OSIgZmlsbD0iIzBFREE3QyIvPjxwYXRoIGQ9Ik0xMjYuNjg3IDI5LjQ1OGwtOTcuNTkgOTcuNTkiIHN0cm9rZS1vcGFjaXR5PSIuNyIgc3Ryb2tlPSIjRjVGNUY1IiBzdHJva2Utd2lkdGg9IjMwIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz48cGF0aCBkPSJNMTg1LjI0MSA0My4xOTNsLTEwMi42NSAxMDIuNjUiIGZpbGw9IiMwRURBN0MiLz48cGF0aCBkPSJNMTg1LjI0MSA0My4xOTNsLTEwMi42NSAxMDIuNjUiIHN0cm9rZS1vcGFjaXR5PSIuNyIgc3Ryb2tlPSIjRjVGNUY1IiBzdHJva2Utd2lkdGg9IjMwIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz48cGF0aCBkPSJNMTk0LjYzOSAxMDYuMDg0TDkxLjI2NSAyMDkuNDU4IiBmaWxsPSIjMEVEQTdDIi8+PHBhdGggZD0iTTE5NC42MzkgMTA2LjA4NEw5MS4yNjUgMjA5LjQ1OCIgc3Ryb2tlLW9wYWNpdHk9Ii43IiBzdHJva2U9IiNGNUY1RjUiIHN0cm9rZS13aWR0aD0iMzAiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIvPjxwYXRoIHN0cm9rZT0iIzYxNjE2MSIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiIGQ9Ik0xMDMuMDY2IDg4LjYxM1Y3Ny43ODVoNDUuNjM2djQ5LjUwMmgtOS4yODIiLz48cGF0aCBkPSJNNTYuMTAyIDE0MS45ODNINDUuODNhMy44NjcgMy44NjcgMCAwIDEtMy44NjgtMy44NjdWNDcuNjE5YTMuODY3IDMuODY3IDAgMCAxIDMuODY4LTMuODY4aDExMy43YTMuODY4IDMuODY4IDAgMCAxIDMuODY3IDMuODY4djkwLjQ5N2EzLjg2OCAzLjg2OCAwIDAgMS0zLjg2NyAzLjg2N2gtMjAuMTFNMTIzLjk1IDI1Ljk2MWE2Ljk2IDYuOTYgMCAwIDEtNi45NjEgNi45NjIgNi45NiA2Ljk2IDAgMCAxLTYuOTYxLTYuOTYyQTYuOTYgNi45NiAwIDAgMSAxMTYuOTg5IDE5YTYuOTYgNi45NiAwIDAgMSA2Ljk2MSA2Ljk2MXptMjAuMTEtMy4wOTRhMy4wOTQgMy4wOTQgMCAxIDEtNi4xODcgMCAzLjA5NCAzLjA5NCAwIDAgMSA2LjE4OCAwek0xNzUgMTcyLjkyM2EzLjg2NyAzLjg2NyAwIDEgMS03LjczNSAwIDMuODY3IDMuODY3IDAgMCAxIDcuNzM1IDB6bS0yNC45MzktMTEuODAybDYuNTYyLTYuNTYzbS4wMDEgNi41NjNsLTYuNTYyLTYuNTYzbTEzLjMzNi04OS4xNDlINTUuODg0bTk4LjIzMi0xMC4wNTVIODQuNTAzIiBzdHJva2U9IiM2MTYxNjEiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIi8+PHBhdGggZD0iTTU4LjIwNCA1Ni45YTMuMDk0IDMuMDk0IDAgMSAxLTYuMTg4IDAgMy4wOTQgMy4wOTQgMCAwIDEgNi4xODggMG0xMC4wNTYgMGEzLjA5NCAzLjA5NCAwIDEgMS02LjE4OCAwIDMuMDk0IDMuMDk0IDAgMCAxIDYuMTg4IDBtMTAuMDU1IDBhMy4wOTQgMy4wOTQgMCAxIDEtNi4xODggMCAzLjA5NCAzLjA5NCAwIDAgMSA2LjE4OCAwIi8+PHBhdGggZD0iTTU2LjY1NyA1NS4zNTRhMy4wOTQgMy4wOTQgMCAxIDEtNi4xODggMCAzLjA5NCAzLjA5NCAwIDAgMSA2LjE4OCAwem0xMC4wNTYgMGEzLjA5NCAzLjA5NCAwIDEgMS02LjE4OCAwIDMuMDk0IDMuMDk0IDAgMCAxIDYuMTg4IDB6bTEwLjA1NSAwYTMuMDk0IDMuMDk0IDAgMSAxLTYuMTg4IDAgMy4wOTQgMy4wOTQgMCAwIDEgNi4xODggMHoiIHN0cm9rZT0iIzYxNjE2MSIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz48cGF0aCBkPSJNMTM5LjQyIDExMy4wMzJWMTU5cy0xLjA1MiA5LjgtMTMuMTUgMjAuODg0Yy05LjI4MSA4LjUwOC0yMy4yMDQgMTIuMzc2LTIzLjIwNCAxMi4zNzZzLTEzLjA1Ni0zLjYyOC0yMi4zMTUtMTEuNTg3bC0uMDA3LS4wMDhjLTcuODQzLTkuMDUtOC42MTctMTYuMjUtOC42MTctMTYuMjVWMTEyLjU5czIyLjQzMSAzLjg2OCAzNi4zNTQtMTAuODI4YzkuNjYgMTAuMjAyIDIzLjQyIDExLjQ1NSAzMC45MzkgMTEuMjciIGZpbGw9IiMxMEQwNzgiLz48cGF0aCBkPSJNNzAuMzg1IDE2OC40MDVjMS45NTcgMy4zNDYgNC45NCA3LjMyMyA5LjQ3NyAxMS40NzkuMjk0LjI2My41ODguNTI2Ljg4Mi43ODFsLjAwNy4wMDhjOS4yNTkgNy45NTkgMjIuMzE1IDExLjU4NiAyMi4zMTUgMTEuNTg2czEzLjkyMy0zLjg2NyAyMy4yMDUtMTIuMzc1QzEzOC4zNjggMTY4LjggMTM5LjQyIDE1OSAxMzkuNDIgMTU5di00NS45NjhtMCAwdi01Ljg1NXMtMjIuNDMxIDMuODY3LTM2LjM1NC0xMC44M2MtMTMuOTIyIDE0LjY5Ny0zNi4zNTMgMTAuODMtMzYuMzUzIDEwLjgzVjE1OW0xMi4zNzUtODEuMjE1SDUzLjU2NG00MC4yMjEgMTAuODI4SDUzLjU2NG0xMy4xNDkgMzUuNThoLTEzLjE1bTEzLjE1LTkuMjgxaC0xMy4xNU02Ni43MTMgMTU5SDM1bTM0LjgwNyA5LjI4MmgtMTcuNzltMjYuMjk4IDEwLjA1NUg2Ny40ODYiIHN0cm9rZT0iIzYxNjE2MSIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz48cGF0aCBzdHJva2U9IiM2MTYxNjEiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBkPSJNODYuNDM2IDE2Ni4zNDhoMzIuNDg3di0yNC43NTFIODYuNDM2em01LjAyOC0zMi40ODZjMC02LjE5NCA1LjAyMi0xMS4yMTYgMTEuMjE2LTExLjIxNiA2LjE5NCAwIDExLjIxNSA1LjAyMiAxMS4yMTUgMTEuMjE2bTAgLjM4N3Y2Ljk2Ii8+PHBhdGggZD0iTTEwNi45MzQgMTU2LjY4YTMuODY3IDMuODY3IDAgMSAxLTcuNzM1IDAgMy44NjcgMy44NjcgMCAwIDEgNy43MzUgMHptLTMuODY4LTEwLjA1NnY2LjE4OCIgc3Ryb2tlPSIjNjE2MTYxIiBzdHJva2Utd2lkdGg9IjIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIvPjwvZz48L3N2Zz4=">
                            <p><span>@lang('general/message.trusty_desc')</span></p>
                        </section>
                    </div>
                </div>
            </div>
            <div class="container container-fluid" style="text-align:center">
                <div class="press-logo-container">
                    <div class="press-logo-wrapper">
                        <img class="bottom" src="{{asset('assets/img/home/cointelegraph_bottom.png')}}"
                             alt="cointelegraph logo">
                        <img class="top" src="{{asset('assets/img/home/cointelegraph_top.png')}}"
                             alt="cointelegraph logo">
                    </div>
                </div>
                <div class="press-logo-container">
                    <div class="press-logo-wrapper">
                        <img class="bottom" src="{{asset('assets/img/home/coindesk_bottom.png')}}" alt="coindesk logo">
                        <img class="top" src="{{asset('assets/img/home/coindesk_top.png')}}" alt="coindesk logo">
                    </div>
                </div>
                <div class="press-logo-container">
                    <div class="press-logo-wrapper">
                        <img class="bottom"
                             src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTQwIiBoZWlnaHQ9IjM2IiB2aWV3Qm94PSIwIDAgMTQwIDM2IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjx0aXRsZT5sb2dvX0ZvcmJlc19ncmVlbjwvdGl0bGU+PHBhdGggZD0iTTcwLjQ4MyAxMC4zbC0yLjU3NiA2LjU5N2MtMy4yMTctMi4wOTItNi43NTctMS4xMjYtNy41NjEgMC0uMTYgMy44NjItLjE2IDkuOTc3LjE2MSAxMy4wMzUuMTYgMS45My42NDMgMi44OTYgMi4yNTIgMy4wNThsMS45MzEuMTZ2MS4yODdINDkuNzI1VjMzLjE1bDEuMTI3LS4xNmMxLjQ0OC0uMTYgMi4wOS0xLjEyNyAyLjI1Mi0zLjA1Ny4xNjEtMy4zOC4zMjMtMTAuMTM5IDAtMTQtLjE2Mi0yLjA5My0uODA0LTIuODk3LTIuMjUyLTMuMDU5bC0xLjEyNy0uMTZ2LS45NjVsMTAuNzgyLTIuMDkyLS4xNjEgNS42MzJjMi41NzQtNS43OTQgNy40MDItNi41OTggMTAuMTM3LTQuOTg5em02OC4wNy42NDNsLjE2IDYuMjc2LTEuMTI3LjMyMWMtMS40NDctNC4zNDUtMy4zOC02LjExNC02LjI3NS02LjExNC0xLjkzIDAtMy4zNzkgMS40NDctMy4zNzkgMy41NHMxLjYwOCAzLjIyIDYuMTE1IDQuOTg5YzQuMTgzIDEuNjA5IDUuOTUzIDMuNTQgNS45NTMgNi45MiAwIDQuOTg3LTQuMDIyIDguMjA2LTEwLjI5OCA4LjIwNi0zLjA1OCAwLTYuNTk3LS42NDQtOC41MjgtMS40NDhsLS4xNjItNy4wOCAxLjEyNy0uMzIzYzEuNzcgNC44MjkgNC4wMjIgNi41OTggNy4wOCA2LjU5OCAyLjU3NCAwIDQuMDIzLTEuNzcgNC4wMjMtMy43MDEgMC0xLjkzLTEuMTI3LTMuMDU4LTUuMTQ5LTQuNTA2LTMuODYzLTEuMjg4LTYuNTk4LTMuMDU3LTYuNTk4LTcuMjQxIDAtNC4xODUgMy43MDEtNy43MjQgOS42NTUtNy43MjQgMi44OTcgMCA1LjQ3LjQ4MiA3LjQwMiAxLjI4N3ptLTM0LjExNiA4LjUzTDExMiAxOS4zMWMwLTMuMjE4LS40ODItOC4wNDctMy4yMTctOC4wNDctMi43MzYgMC00LjE4NSA0LjUwNy00LjM0NiA4LjIwOHptLTcuNDAyIDMuMDU2YzAtNi41OTcgNC4xODQtMTIuODczIDEyLjM5Mi0xMi44NzMgNi43NTggMCA5Ljk3NiA0Ljk4OCA5Ljk3NiAxMS41ODZoLTE0Ljk2NmMtLjE2IDUuOTU0IDIuNzM3IDEwLjI5OCA4LjUzIDEwLjI5OCAyLjU3NCAwIDMuODYxLS42NDMgNS40Ny0xLjc3bC42NDQuODA1Yy0xLjYxIDIuMjUzLTUuMTQ5IDQuNTA2LTkuNjU0IDQuNTA2LTcuMjQyIDAtMTIuMzkyLTUuMTQ5LTEyLjM5Mi0xMi41NTJ6TTM3LjAxMiAxMS4yNjRjLTMuNTQgMC00LjUwNSA0LjgyOS00LjUwNSAxMS4xMDQgMCA2LjExNSAxLjYwOCAxMS4xMDMgNC44MjcgMTEuMTAzIDMuNyAwIDQuNjY3LTQuODI3IDQuNjY3LTExLjEwMyAwLTYuMTE1LTEuNjEtMTEuMTA0LTQuOTg5LTExLjEwNHptLjQ4My0xLjYwOGM4LjA0NiAwIDEyLjA3IDUuNDcgMTIuMDcgMTIuNzEyIDAgNi45Mi00LjUwNiAxMi43MTMtMTIuNTUzIDEyLjcxMy04LjA0NSAwLTEyLjA2OS01LjQ3MS0xMi4wNjktMTIuNzEzIDAtNi45MiA0LjUwNi0xMi43MTIgMTIuNTUyLTEyLjcxMnpNMjguMzIyLjY0NWwuMTYxIDkuNDkzLTEuNjEuNDgzYy0xLjYwOC00LjgyOC0zLjg2LTcuNTYzLTguMjA3LTcuNTYzaC01LjYzMWMtLjE2MiAzLjA1Ny0uMzIxIDguMjA2LS4zMjEgMTMuNjc4bDMuODYxLS4xNmMyLjQxNSAwIDMuNTQtMS45MzIgNC4wMjQtNC42NjhoMS40NDh2MTEuNDI1SDIwLjZjLS40ODQtMi43MzUtMS42MS00LjY2Ni00LjAyNC00LjY2NmwtMy44NjEtLjE2YzAgNC4xODIuMTYgNy41NjIuMzIgOS42NTQuMzIzIDMuMDU3IDEuMTI3IDQuNTA3IDMuMjIgNC42NjdsMS45MzEuMzIxdjEuMjg4SDBWMzMuMTVsMS42MS0uMzJjMi4wOTItLjE2MSAyLjg5Ny0xLjYxIDMuMjE3LTQuNjY4LjMyMy00Ljk4OC40ODUtMTUuNDQ4IDAtMjEuMjQxLS4zMi0zLjA1OC0xLjEyNS00LjM0NS0zLjIxNy00LjY2N0wwIDIuMDkzVi42NDVoMjguMzIyek04MS41ODYgMzMuMzFjLS42NDMgMC0xLjQ0NyAwLTEuOTMtLjE2Mi0uMTYxLTIuMjUyLS4zMjMtMTEuNzQ3LS4xNjEtMjAuMTE0Ljk2NS0uMzIyIDEuNjA5LS40ODMgMi40MTMtLjQ4MyAzLjU0IDAgNS40NzMgNC4xODQgNS40NzMgOS4zMzQgMCA2LjQzNi0yLjQxNCAxMS40MjUtNS43OTUgMTEuNDI1em0zLjcwMi0yMy4zMzRjLTIuMjUzIDAtNC4wMjMuNDgzLTUuNzkzIDEuNDQ5IDAtNS4xNSAwLTkuODE3LjE2LTExLjQyNkw2OC44NzMgMS45MzF2Ljk2NmwxLjEyNy4xNmMxLjQ0OS4zMjIgMS45MzIgMS4xMjcgMi4yNTMgMy4wNTguMzIyIDMuODYyLjE2MiAyNC40NiAwIDI3LjgzOSAyLjg5Ny42NDUgNS45NTQgMS4xMjcgOS4wMTIgMS4xMjcgOC41MyAwIDEzLjY3Ny01LjMxIDEzLjY3Ny0xMy42NzkgMC02LjU5Ny00LjE4Mi0xMS40MjUtOS42NTQtMTEuNDI1eiIgZmlsbD0iIzEwRDA3OCIgZmlsbC1ydWxlPSJldmVub2RkIi8+PC9zdmc+"
                             lt="forbes logo">
                        <img class="top"
                             src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTQwIiBoZWlnaHQ9IjM2IiB2aWV3Qm94PSIwIDAgMTQwIDM2IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjx0aXRsZT5sb2dvX0ZvcmJlczwvdGl0bGU+PHBhdGggZD0iTTcwLjQ4MyAxMC4zbC0yLjU3NiA2LjU5N2MtMy4yMTctMi4wOTItNi43NTctMS4xMjYtNy41NjEgMC0uMTYgMy44NjItLjE2IDkuOTc3LjE2MSAxMy4wMzUuMTYgMS45My42NDMgMi44OTYgMi4yNTIgMy4wNThsMS45MzEuMTZ2MS4yODdINDkuNzI1VjMzLjE1bDEuMTI3LS4xNmMxLjQ0OC0uMTYgMi4wOS0xLjEyNyAyLjI1Mi0zLjA1Ny4xNjEtMy4zOC4zMjMtMTAuMTM5IDAtMTQtLjE2Mi0yLjA5My0uODA0LTIuODk3LTIuMjUyLTMuMDU5bC0xLjEyNy0uMTZ2LS45NjVsMTAuNzgyLTIuMDkyLS4xNjEgNS42MzJjMi41NzQtNS43OTQgNy40MDItNi41OTggMTAuMTM3LTQuOTg5em02OC4wNy42NDNsLjE2IDYuMjc2LTEuMTI3LjMyMWMtMS40NDctNC4zNDUtMy4zOC02LjExNC02LjI3NS02LjExNC0xLjkzIDAtMy4zNzkgMS40NDctMy4zNzkgMy41NHMxLjYwOCAzLjIyIDYuMTE1IDQuOTg5YzQuMTgzIDEuNjA5IDUuOTUzIDMuNTQgNS45NTMgNi45MiAwIDQuOTg3LTQuMDIyIDguMjA2LTEwLjI5OCA4LjIwNi0zLjA1OCAwLTYuNTk3LS42NDQtOC41MjgtMS40NDhsLS4xNjItNy4wOCAxLjEyNy0uMzIzYzEuNzcgNC44MjkgNC4wMjIgNi41OTggNy4wOCA2LjU5OCAyLjU3NCAwIDQuMDIzLTEuNzcgNC4wMjMtMy43MDEgMC0xLjkzLTEuMTI3LTMuMDU4LTUuMTQ5LTQuNTA2LTMuODYzLTEuMjg4LTYuNTk4LTMuMDU3LTYuNTk4LTcuMjQxIDAtNC4xODUgMy43MDEtNy43MjQgOS42NTUtNy43MjQgMi44OTcgMCA1LjQ3LjQ4MiA3LjQwMiAxLjI4N3ptLTM0LjExNiA4LjUzTDExMiAxOS4zMWMwLTMuMjE4LS40ODItOC4wNDctMy4yMTctOC4wNDctMi43MzYgMC00LjE4NSA0LjUwNy00LjM0NiA4LjIwOHptLTcuNDAyIDMuMDU2YzAtNi41OTcgNC4xODQtMTIuODczIDEyLjM5Mi0xMi44NzMgNi43NTggMCA5Ljk3NiA0Ljk4OCA5Ljk3NiAxMS41ODZoLTE0Ljk2NmMtLjE2IDUuOTU0IDIuNzM3IDEwLjI5OCA4LjUzIDEwLjI5OCAyLjU3NCAwIDMuODYxLS42NDMgNS40Ny0xLjc3bC42NDQuODA1Yy0xLjYxIDIuMjUzLTUuMTQ5IDQuNTA2LTkuNjU0IDQuNTA2LTcuMjQyIDAtMTIuMzkyLTUuMTQ5LTEyLjM5Mi0xMi41NTJ6TTM3LjAxMiAxMS4yNjRjLTMuNTQgMC00LjUwNSA0LjgyOS00LjUwNSAxMS4xMDQgMCA2LjExNSAxLjYwOCAxMS4xMDMgNC44MjcgMTEuMTAzIDMuNyAwIDQuNjY3LTQuODI3IDQuNjY3LTExLjEwMyAwLTYuMTE1LTEuNjEtMTEuMTA0LTQuOTg5LTExLjEwNHptLjQ4My0xLjYwOGM4LjA0NiAwIDEyLjA3IDUuNDcgMTIuMDcgMTIuNzEyIDAgNi45Mi00LjUwNiAxMi43MTMtMTIuNTUzIDEyLjcxMy04LjA0NSAwLTEyLjA2OS01LjQ3MS0xMi4wNjktMTIuNzEzIDAtNi45MiA0LjUwNi0xMi43MTIgMTIuNTUyLTEyLjcxMnpNMjguMzIyLjY0NWwuMTYxIDkuNDkzLTEuNjEuNDgzYy0xLjYwOC00LjgyOC0zLjg2LTcuNTYzLTguMjA3LTcuNTYzaC01LjYzMWMtLjE2MiAzLjA1Ny0uMzIxIDguMjA2LS4zMjEgMTMuNjc4bDMuODYxLS4xNmMyLjQxNSAwIDMuNTQtMS45MzIgNC4wMjQtNC42NjhoMS40NDh2MTEuNDI1SDIwLjZjLS40ODQtMi43MzUtMS42MS00LjY2Ni00LjAyNC00LjY2NmwtMy44NjEtLjE2YzAgNC4xODIuMTYgNy41NjIuMzIgOS42NTQuMzIzIDMuMDU3IDEuMTI3IDQuNTA3IDMuMjIgNC42NjdsMS45MzEuMzIxdjEuMjg4SDBWMzMuMTVsMS42MS0uMzJjMi4wOTItLjE2MSAyLjg5Ny0xLjYxIDMuMjE3LTQuNjY4LjMyMy00Ljk4OC40ODUtMTUuNDQ4IDAtMjEuMjQxLS4zMi0zLjA1OC0xLjEyNS00LjM0NS0zLjIxNy00LjY2N0wwIDIuMDkzVi42NDVoMjguMzIyek04MS41ODYgMzMuMzFjLS42NDMgMC0xLjQ0NyAwLTEuOTMtLjE2Mi0uMTYxLTIuMjUyLS4zMjMtMTEuNzQ3LS4xNjEtMjAuMTE0Ljk2NS0uMzIyIDEuNjA5LS40ODMgMi40MTMtLjQ4MyAzLjU0IDAgNS40NzMgNC4xODQgNS40NzMgOS4zMzQgMCA2LjQzNi0yLjQxNCAxMS40MjUtNS43OTUgMTEuNDI1em0zLjcwMi0yMy4zMzRjLTIuMjUzIDAtNC4wMjMuNDgzLTUuNzkzIDEuNDQ5IDAtNS4xNSAwLTkuODE3LjE2LTExLjQyNkw2OC44NzMgMS45MzF2Ljk2NmwxLjEyNy4xNmMxLjQ0OS4zMjIgMS45MzIgMS4xMjcgMi4yNTMgMy4wNTguMzIyIDMuODYyLjE2MiAyNC40NiAwIDI3LjgzOSAyLjg5Ny42NDUgNS45NTQgMS4xMjcgOS4wMTIgMS4xMjcgOC41MyAwIDEzLjY3Ny01LjMxIDEzLjY3Ny0xMy42NzkgMC02LjU5Ny00LjE4Mi0xMS40MjUtOS42NTQtMTEuNDI1eiIgZmlsbD0iI0EzQTNBMyIgZmlsbC1ydWxlPSJldmVub2RkIi8+PC9zdmc+"
                             alt="forbes logo">
                    </div>
                </div>
                <div class="press-logo-container">
                    <div class="press-logo-wrapper">
                        <img class="bottom" src="{{asset('assets/img/home/bitcoincom_bottom.png')}}"
                             alt="bitcoincom logo">
                        <img class="top" src="{{asset('assets/img/home/bitcoincom_top.png')}}" alt="bitcoincom logo">
                    </div>
                </div>
                <div class="press-logo-container">
                    <div class="press-logo-wrapper">
                        <img class="bottom" src="{{asset('assets/img/home/techcrunch_bottom.png')}}"
                             alt="techcrunch logo">
                        <img class="top" src="{{asset('assets/img/home/techcrunch_top.png')}}" alt="techcrunch logo">
                    </div>
                </div>
            </div>
            {{--<div class="reviews">--}}
            {{--<div class="container-fluid">--}}
            {{--<div class="title"><span>Our clients love us</span></div>--}}
            {{--<div class="main-container">--}}
            {{--<div class="arrow-halo active">--}}
            {{--<div class="arrow arrow-left"></div>--}}
            {{--</div>--}}
            {{--<div class="entries  ">--}}
            {{--@foreach([1,2,3,4] as $i )--}}
            {{--<div class="review-entry">--}}
            {{--<div class="header">--}}
            {{--<div>--}}
            {{--<div class="avatar">--}}
            {{--<img src="{{ asset('assets/img/person.jpg') }}">--}}
            {{--</div>--}}
            {{--<div class="name">Yknox</div>--}}
            {{--</div>--}}
            {{--<a href="https://twitter.com/yknox/"--}}
            {{--target="_blank">--}}
            {{--<div class="source-button"><img--}}
            {{--src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAALQAAAA9CAMAAAAzrLMQAAAAeFBMVEVVrO5VrO5VrO5VrO5VrO5VrO5VrO5MaXFVrO5VrO7///+k0/bS6fro9P1gsu+q1veCwvO73vhst/D0+f71+v5qtvDq9f11vPHd7vyOyPSAwfKVy/Rgse+KxvN3vfHV6vvA4PnG4/m12/jg8PyZzfWg0PXK5fqw2Pd9Jk0bAAAACnRSTlNAELD/IDBgAPCgWtvJyAAAArpJREFUeAHt2oVu40AUheHsnoBzzMwQfv833B1nCk4aT0OSLfkX3JEa+GoIz1ai2ViS3NVq8Rcj6u9CoJcaRpW2XM3mGkaWNp+tMbrWM4ywCa1uQo+mCT2hJ3SY2/YhHhU6rtkWlfhfYZcDQ4c1rsr5WYOyCYJiYOiGzW2zLMfA0BEv1UXAbg3KbFhoktx1dv+W3aJjsCuGh2aQdbb9ZUGMAaLJYwhZqDAPAV1T1kh2xot2IYaGzvlZnQtezItsXOXwe86tXfg2dBHxW1Ft2y9Fy9FZPY9GxquU6MoQkWxnhZ/6/4e3oaPDlv1luJFS8TY0FanRFmnKuRHTIw3Iv+o853xbifYJaepfN+O5pn4HekdVyo2YkJWAkLTQQnUF2mVbYsmb8XzyHvSBimolWio3JPcADNKTf4UjrLque99WwElsZt2Ue4akwfvQRcD+bBVaHg8WKRRiJv2PHh5pWoCVnLc7Sfp7665Hj5L9xUo0EtJCShpy6v3o03mPICVdAMLcJavRyAP2FEGN1skULs30POn1oeX/KDrvE5I67kUjrnm7XI1GRbrweYLfzgT9aH5Lnoh3o8PjNuKtgkKNBsx2K1dw6VekrkD7V2jcjUbE2x3wG/SJTOgDqZisFOhNZ9Mq0Xefijv8Cl2RpCs3ookLtAV0Vnv5WAfdehyNreKhQ4mGSTKVzxqnzl9N0tBdp7My2sfpk0nfexwNW/EYrUS7pC8fxVh1/qpT5HRWlsFzezyBRtzwhxr8Fi0fcmGR5sVf22c+r7vCfkP6boX70aqtvRv6x2LhkZcdi2Gjy2syt8BA0aVt29ua1wUlBotGHvGntgUGipbs3dVWtsPhfz4d2zU/223L0XyoHmbZ4ZBl8fT1xYSe0BN6Qt/VhNYwurRx/vBqlD9xWy20kZkX4mebf9baiMjrP6vVP73guOLJir68AAAAAElFTkSuQmCC">--}}
            {{--</div>--}}
            {{--</a>--}}
            {{--</div>--}}
            {{--<div>--}}
            {{--<div class="text">I love how @intercron_team has no limits and awesome fees--}}
            {{--when--}}
            {{--going from moneny to crypto. No reason for exchanges !--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div>--}}
            {{--<div class="date">February 25, 2017, 9:12 PM</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--@endforeach--}}
            {{--</div>--}}
            {{--<div class="arrow-halo active">--}}
            {{--<div class="arrow arrow-right "></div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="pagination">--}}
            {{--<div class="item active">--}}
            {{--<div class="dot"></div>--}}
            {{--</div>--}}
            {{--<div class="item "></div>--}}
            {{--<div class="item "></div>--}}
            {{--<div class="item "></div>--}}
            {{--<div class="item "></div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="container container-fluid container-partners" style="height: 550px !important;">--}}
            {{--<div class="title"><span>@lang('general/message.our_partner')</span></div>--}}
            {{--<a href="#">--}}
            {{--<div class="partners-logo-container">--}}
            {{--<div class="logo-wrapper">--}}
            {{--<img class="bottom" src="{{asset('assets/img/home/coinmarketcap_bottom.png')}}"--}}
            {{--alt="coinmarketcap logo" style="margin-top:5px;margin-left:10px">--}}
            {{--<img class="top" src="{{asset('assets/img/home/coinmarketcap_top.png')}}"--}}
            {{--alt="coinmarketcap logo" style="margin-top:5px;margin-left:10px">--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="partners-logo-container">--}}
            {{--<div class="logo-wrapper">--}}
            {{--<img class="bottom"--}}
            {{--src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTUwIiBoZWlnaHQ9IjU5IiB2aWV3Qm94PSIwIDAgMTUwIDU5IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjx0aXRsZT5sb2dvIEpheHggZ3JlZW48L3RpdGxlPjxwYXRoIGQ9Ik04Ni40NCAyOS4yMTlMNzUuMDY3IDQ0LjAyN2w3LjUwOSA1Ljc2NSA5LjgzNC0xMi44MDEgOS44MzQgMTIuODAyIDcuNTA4LTUuNzY2Yy0zLjgwMS00Ljk1MS03LjU4NC05Ljg3Ni0xMS4zNzItMTQuODA3IDMuOTk4LTUuMjEzIDcuOTg0LTEwLjM5IDExLjk3MS0xNS41OTNsLTcuNTA3LTUuNzY0TDkyLjQxIDIxLjQ0NyA4MS45NzUgNy44NjJsLTcuNTA4IDUuNzY3IDExLjk3MyAxNS41OXptNTUuNDUxIDIwLjU3NGw3LjUwOC01Ljc2N2MtMy44MS00Ljk1OS03LjU4Ny05Ljg3OC0xMS4zNzItMTQuODA3IDQuMDAyLTUuMjExIDcuOTgxLTEwLjM5NCAxMS45NzMtMTUuNTlsLTcuNTA5LTUuNzY2LTEwLjQzNSAxMy41ODMtMTAuNDM1LTEzLjU4NC03LjUwNyA1Ljc2OGM0LjAwOCA1LjIxNyA3Ljk4OCAxMC40MDEgMTEuOTcyIDE1LjU4OWwtMTEuMzcyIDE0LjgwOCA3LjUwOCA1Ljc2NiA5LjgzNC0xMi44MDIgOS44MzUgMTIuODAyek01My43MjIgMzkuMDI0Yy0yLjQ0MyAxLjMyNS01LjA0MyAxLjczLTcuNzY0IDEuMjMxLTIuODE3LS41MTYtNS4xNTQtMS45MDItNi45NTYtNC4xMy0yLjI3OC0yLjgxNy0zLjA4Mi02LjA0NS0yLjQ0NC05LjU5Ni41MzItMi45NjQgMi4wNDgtNS4zNzYgNC40NS03LjE5MiAyLjczOS0yLjA2OSA1LjgzOS0yLjgxOCA5LjIwMy0yLjE4NiA0LjEzMi43NzcgNy4wMjkgMy4xODEgOC43MzQgNy4wMTEuNjQ5IDEuNDU3LjkxMSAzLjAwNC45MSA0LjU5OC0uMDAzIDYuNjkzLS4wMDEgMTMuMzg3IDAgMjAuMDggMCAuMTM3LjAxMy4yNzUuMDIxLjQzMWg5LjE5MnYtLjM4Yy4wMTMtNi43MjMuMDI3LTEzLjQ0Ni4wMzItMjAuMTY5LjAwMS0uNjA0LS4wNTItMS4yMDgtLjA5Ni0xLjgxMWExOC45MyAxOC45MyAwIDAgMC0uODM4LTQuMjk2IDIwLjc1IDIwLjc1IDAgMCAwLTQuOTktOC4zNzUgMjAuODU4IDIwLjg1OCAwIDAgMC01LjE4LTMuODk3IDIwLjQ3IDIwLjQ3IDAgMCAwLTguMzc3LTIuMzg4IDIwLjM5IDIwLjM5IDAgMCAwLTQuNzk2LjIzOSAyMC43MzYgMjAuNzM2IDAgMCAwLTYuNjUgMi4zMzggMjAuODM3IDIwLjgzNyAwIDAgMC02LjkyNiA2LjIxN2MtMi4yNzIgMy4yMDYtMy41MzYgNi43ODItMy43ODkgMTAuNzAxYTE5Ljk4MiAxOS45ODIgMCAwIDAgLjQyNSA1LjY4N2MxLjA3NiA0Ljc4MiAzLjUwNyA4Ljc0NCA3LjMxOCAxMS44MTQgNC4wMiAzLjI0IDguNjM3IDQuNzg0IDEzLjgxNCA0LjYxNGEyMC4xMTIgMjAuMTEyIDAgMCAwIDQuNzQyLS43M2MuMzItLjA4OC4zMjQtLjA4OC4zMjQtLjQwM3YtOS4yMzdjMC0uMDk2LS4wMTYtLjE5Mi0uMDI5LS4zMzYtLjEzOC4wNjktLjIzNi4xMTQtLjMzLjE2NXpNMjAuNzc4IDBjLS4wMDIuMTUxLS4wMDQuMzAyLS4wMDQuNDU0LS4wMDEgMTIuNTA0LjAwOSAyNS4wMDgtLjAwOCAzNy41MTItLjAwMyAyLjkyMy0uNTMgNS43NTYtMS43MzUgOC40NDJhMTcuNDggMTcuNDggMCAwIDEtMy45MTQgNS41MmMtMS44ODMgMS44MDEtNC4wNiAzLjE0NS02LjQ0MyA0LjE3My0yLjMyOCAxLjAwNi00Ljc1NSAxLjY2NC03LjI2MSAyLjAzNi0uNDY4LjA3LS45NDIuMDkzLTEuNDEzLjEzOHYtOS4xNDdjLjQyLS4wMzkuODQzLS4wNjMgMS4yNjItLjEyIDEuNjg0LS4yMyAzLjI5MS0uNzA2IDQuNzgyLTEuNTM4IDEuMzAzLS43MjcgMi40MTgtMS42NzYgMy4zMDQtMi44ODIgMS41NzctMi4xNDkgMi4zMi00LjU4NiAyLjMyMy03LjIyNS4wMjEtMTIuMzAzLjAwOS0yNC42MDYuMDEtMzYuOTEgMC0uMTUxLjAwNi0uMzAyLjAxLS40NTNoOS4wODd6IiBmaWxsPSIjMTBEMDc4IiBmaWxsLXJ1bGU9ImV2ZW5vZGQiLz48L3N2Zz4="--}}
            {{--alt="jaxx logo">--}}
            {{--<img class="top"--}}
            {{--src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTUwIiBoZWlnaHQ9IjU5IiB2aWV3Qm94PSIwIDAgMTUwIDU5IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjx0aXRsZT5sb2dvIEpheHg8L3RpdGxlPjxwYXRoIGQ9Ik04Ni40NCAyOS4yMTlMNzUuMDY3IDQ0LjAyN2w3LjUwOSA1Ljc2NSA5LjgzNC0xMi44MDEgOS44MzQgMTIuODAyIDcuNTA4LTUuNzY2Yy0zLjgwMS00Ljk1MS03LjU4NC05Ljg3Ni0xMS4zNzItMTQuODA3IDMuOTk4LTUuMjEzIDcuOTg0LTEwLjM5IDExLjk3MS0xNS41OTNsLTcuNTA3LTUuNzY0TDkyLjQxIDIxLjQ0NyA4MS45NzUgNy44NjJsLTcuNTA4IDUuNzY3IDExLjk3MyAxNS41OXptNTUuNDUxIDIwLjU3NGw3LjUwOC01Ljc2N2MtMy44MS00Ljk1OS03LjU4Ny05Ljg3OC0xMS4zNzItMTQuODA3IDQuMDAyLTUuMjExIDcuOTgxLTEwLjM5NCAxMS45NzMtMTUuNTlsLTcuNTA5LTUuNzY2LTEwLjQzNSAxMy41ODMtMTAuNDM1LTEzLjU4NC03LjUwNyA1Ljc2OGM0LjAwOCA1LjIxNyA3Ljk4OCAxMC40MDEgMTEuOTcyIDE1LjU4OWwtMTEuMzcyIDE0LjgwOCA3LjUwOCA1Ljc2NiA5LjgzNC0xMi44MDIgOS44MzUgMTIuODAyek01My43MjIgMzkuMDI0Yy0yLjQ0MyAxLjMyNS01LjA0MyAxLjczLTcuNzY0IDEuMjMxLTIuODE3LS41MTYtNS4xNTQtMS45MDItNi45NTYtNC4xMy0yLjI3OC0yLjgxNy0zLjA4Mi02LjA0NS0yLjQ0NC05LjU5Ni41MzItMi45NjQgMi4wNDgtNS4zNzYgNC40NS03LjE5MiAyLjczOS0yLjA2OSA1LjgzOS0yLjgxOCA5LjIwMy0yLjE4NiA0LjEzMi43NzcgNy4wMjkgMy4xODEgOC43MzQgNy4wMTEuNjQ5IDEuNDU3LjkxMSAzLjAwNC45MSA0LjU5OC0uMDAzIDYuNjkzLS4wMDEgMTMuMzg3IDAgMjAuMDggMCAuMTM3LjAxMy4yNzUuMDIxLjQzMWg5LjE5MnYtLjM4Yy4wMTMtNi43MjMuMDI3LTEzLjQ0Ni4wMzItMjAuMTY5LjAwMS0uNjA0LS4wNTItMS4yMDgtLjA5Ni0xLjgxMWExOC45MyAxOC45MyAwIDAgMC0uODM4LTQuMjk2IDIwLjc1IDIwLjc1IDAgMCAwLTQuOTktOC4zNzUgMjAuODU4IDIwLjg1OCAwIDAgMC01LjE4LTMuODk3IDIwLjQ3IDIwLjQ3IDAgMCAwLTguMzc3LTIuMzg4IDIwLjM5IDIwLjM5IDAgMCAwLTQuNzk2LjIzOSAyMC43MzYgMjAuNzM2IDAgMCAwLTYuNjUgMi4zMzggMjAuODM3IDIwLjgzNyAwIDAgMC02LjkyNiA2LjIxN2MtMi4yNzIgMy4yMDYtMy41MzYgNi43ODItMy43ODkgMTAuNzAxYTE5Ljk4MiAxOS45ODIgMCAwIDAgLjQyNSA1LjY4N2MxLjA3NiA0Ljc4MiAzLjUwNyA4Ljc0NCA3LjMxOCAxMS44MTQgNC4wMiAzLjI0IDguNjM3IDQuNzg0IDEzLjgxNCA0LjYxNGEyMC4xMTIgMjAuMTEyIDAgMCAwIDQuNzQyLS43M2MuMzItLjA4OC4zMjQtLjA4OC4zMjQtLjQwM3YtOS4yMzdjMC0uMDk2LS4wMTYtLjE5Mi0uMDI5LS4zMzYtLjEzOC4wNjktLjIzNi4xMTQtLjMzLjE2NXpNMjAuNzc4IDBjLS4wMDIuMTUxLS4wMDQuMzAyLS4wMDQuNDU0LS4wMDEgMTIuNTA0LjAwOSAyNS4wMDgtLjAwOCAzNy41MTItLjAwMyAyLjkyMy0uNTMgNS43NTYtMS43MzUgOC40NDJhMTcuNDggMTcuNDggMCAwIDEtMy45MTQgNS41MmMtMS44ODMgMS44MDEtNC4wNiAzLjE0NS02LjQ0MyA0LjE3My0yLjMyOCAxLjAwNi00Ljc1NSAxLjY2NC03LjI2MSAyLjAzNi0uNDY4LjA3LS45NDIuMDkzLTEuNDEzLjEzOHYtOS4xNDdjLjQyLS4wMzkuODQzLS4wNjMgMS4yNjItLjEyIDEuNjg0LS4yMyAzLjI5MS0uNzA2IDQuNzgyLTEuNTM4IDEuMzAzLS43MjcgMi40MTgtMS42NzYgMy4zMDQtMi44ODIgMS41NzctMi4xNDkgMi4zMi00LjU4NiAyLjMyMy03LjIyNS4wMjEtMTIuMzAzLjAwOS0yNC42MDYuMDEtMzYuOTEgMC0uMTUxLjAwNi0uMzAyLjAxLS40NTNoOS4wODd6IiBmaWxsPSIjQTNBM0EzIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiLz48L3N2Zz4="--}}
            {{--alt="jaxx logo">--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="partners-logo-container">--}}
            {{--<div class="logo-wrapper">--}}
            {{--<img class="bottom"--}}
            {{--src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTQwIiBoZWlnaHQ9IjYwIiB2aWV3Qm94PSIwIDAgMTQwIDYwIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjx0aXRsZT5CUkQgZ3JlZW48L3RpdGxlPjxwYXRoIGQ9Ik0zMS4zOTMgMjguMzA0YzAtLjc1Mi42MjItMS4zNjIgMS4zOS0xLjM2Mmg0LjgzYzIuNzU3IDAgNC44Mi0uMTM0IDUuNzc2LTEuMTE2LjQ1LS40NzMuNjgyLTEuMTA3LjYzOC0xLjc1M2EyLjIwNCAyLjIwNCAwIDAgMC0uNTkyLTEuNzJjLS45NjgtLjk0OC0zLjAzLTEuMTE2LTUuODIyLTEuMTE2aC04Ljk4OHYxOC4xNTRoOC44OTdjMy4wMyAwIDUuMjc1LS4yMjQgNi4zMjMtMS4yNjJhMi4zOTIgMi4zOTIgMCAwIDAgLjY4My0xLjg0MiAyLjUxMyAyLjUxMyAwIDAgMC0uNjgzLTEuODg3Yy0xLjA2LTEuMDM4LTMuMzA0LTEuMTE2LTYuMzIzLTEuMTE2aC00LjcwNWMtLjc2OC4wMTgtMS40MDUtLjU3Ni0xLjQyNS0xLjMyOHYtMy42NTJ6TTIwIDE2LjU4MmMwLTEuMTI5LjkzNC0yLjA0MyAyLjA4NS0yLjA0M2gxNS4wMDRjOC44NTIgMCAxMS45NzQgMS4wMzggMTQuMTI3IDMuMTQ4YTYuNzIyIDYuNzIyIDAgMCAxIDEuOTM3IDUuMTI0YzAgMy42NC0xLjk3MSA2LjEwNy03LjI5MiA3LjE5IDUuMTM5Ljg5NCA3Ljc0OCAyLjk3IDcuNzQ4IDcuMTQ1YTcuMDYzIDcuMDYzIDAgMCAxLTIuMDE3IDUuMzA0QzQ5LjQ4NCA0NC41MTUgNDYuMDQ0IDQ2IDM2Ljc4MiA0NkgyMi4wODRDMjAuOTM0IDQ2IDIwIDQ1LjA4NSAyMCA0My45NTdWMTYuNTgyem00Ny44NjQgMTQuMDU2YzAtLjc1My42MjMtMS4zNjIgMS4zOS0xLjM2MmgzLjA3N2M0LjIxNSAwIDUuMzA4LS4zMTMgNi41MDUtMS40ODUuNjEtLjY0Ni45NC0xLjQ5OS45MjMtMi4zNzguMDUzLS45MjEtLjMtMS44Mi0uOTctMi40NjgtMS4wMTMtLjk5My0xLjc3Ni0xLjExNi02LjQ1OC0xLjExNmgtNy42NTZ2MjQuMTZINTUuNTZWMTYuNTgyYzAtMS4xMTYuOTEzLTIuMDI1IDIuMDUtMi4wNDRoMTQuODEyYzkuNjcyIDAgMTEuNTQgMS4xMTcgMTMuODg3IDMuNDE3YTkuNzggOS43OCAwIDAgMSAyLjU2NCA3LjE5YzAgMi4zNzgtLjU1OCA1Ljc5NC0yLjc2OSA3Ljk0OS0uNjk1LjY4LTEuNTcyIDIuMjMyLTcuMDc1IDIuNjU3TDg4Ljk3NSA0Nkg3Ni45NzhsLTguNjgtOS41MzRhMi4wMTMgMi4wMTMgMCAwIDEtLjQzNC0xLjM2MnYtNC40NjZ6TTkwLjUwMyAxNi41OGMwLTEuMTI4LjkxNy0yLjA0MyAyLjA1LTIuMDQzaDkuNzEzYzExLjMxNCAwIDEzLjk1OCAxLjg4NyAxNy4zNDEgNS4yNTlhMTQuNTcyIDE0LjU3MiAwIDAgMSAzLjk2NiAxMC40NzIgMTQuNTcyIDE0LjU3MiAwIDAgMS0zLjk2NiAxMC40NzJjLTMuMzYgMy4zNS02LjAyNyA1LjI1OS0xNy4zNDEgNS4yNTloLTkuNzEzYTIuMDQ2IDIuMDQ2IDAgMCAxLTIuMDUtMi4wNDNWMTYuNTgxem04Ljk2MiAyMi4zM2gyLjc5YzcuMjU4IDAgOC4xODgtMS4wMzggMTAuMDgyLTIuOTI1YTcuNTU1IDcuNTU1IDAgMCAwIDIuMDcyLTUuNzA2IDcuNjU2IDcuNjU2IDAgMCAwLTIuMDYtNS42OTRjLTEuODk0LTEuODg3LTIuODI0LTIuOTI1LTEwLjA4My0yLjkyNWgtMi43OWwtLjAxMSAxNy4yNXoiIGZpbGw9IiMxMEQwNzgiIGZpbGwtcnVsZT0iZXZlbm9kZCIvPjwvc3ZnPg=="--}}
            {{--alt="BRD logo">--}}
            {{--<img class="top"--}}
            {{--src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTQwIiBoZWlnaHQ9IjYwIiB2aWV3Qm94PSIwIDAgMTQwIDYwIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjx0aXRsZT5CUkQ8L3RpdGxlPjxwYXRoIGQ9Ik0zMS4zOTMgMjguMzA0YzAtLjc1Mi42MjItMS4zNjIgMS4zOS0xLjM2Mmg0LjgzYzIuNzU3IDAgNC44Mi0uMTM0IDUuNzc2LTEuMTE2LjQ1LS40NzMuNjgyLTEuMTA3LjYzOC0xLjc1M2EyLjIwNCAyLjIwNCAwIDAgMC0uNTkyLTEuNzJjLS45NjgtLjk0OC0zLjAzLTEuMTE2LTUuODIyLTEuMTE2aC04Ljk4OHYxOC4xNTRoOC44OTdjMy4wMyAwIDUuMjc1LS4yMjQgNi4zMjMtMS4yNjJhMi4zOTIgMi4zOTIgMCAwIDAgLjY4My0xLjg0MiAyLjUxMyAyLjUxMyAwIDAgMC0uNjgzLTEuODg3Yy0xLjA2LTEuMDM4LTMuMzA0LTEuMTE2LTYuMzIzLTEuMTE2aC00LjcwNWMtLjc2OC4wMTgtMS40MDUtLjU3Ni0xLjQyNS0xLjMyOHYtMy42NTJ6TTIwIDE2LjU4MmMwLTEuMTI5LjkzNC0yLjA0MyAyLjA4NS0yLjA0M2gxNS4wMDRjOC44NTIgMCAxMS45NzQgMS4wMzggMTQuMTI3IDMuMTQ4YTYuNzIyIDYuNzIyIDAgMCAxIDEuOTM3IDUuMTI0YzAgMy42NC0xLjk3MSA2LjEwNy03LjI5MiA3LjE5IDUuMTM5Ljg5NCA3Ljc0OCAyLjk3IDcuNzQ4IDcuMTQ1YTcuMDYzIDcuMDYzIDAgMCAxLTIuMDE3IDUuMzA0QzQ5LjQ4NCA0NC41MTUgNDYuMDQ0IDQ2IDM2Ljc4MiA0NkgyMi4wODRDMjAuOTM0IDQ2IDIwIDQ1LjA4NSAyMCA0My45NTdWMTYuNTgyem00Ny44NjQgMTQuMDU2YzAtLjc1My42MjMtMS4zNjIgMS4zOS0xLjM2MmgzLjA3N2M0LjIxNSAwIDUuMzA4LS4zMTMgNi41MDUtMS40ODUuNjEtLjY0Ni45NC0xLjQ5OS45MjMtMi4zNzguMDUzLS45MjEtLjMtMS44Mi0uOTctMi40NjgtMS4wMTMtLjk5My0xLjc3Ni0xLjExNi02LjQ1OC0xLjExNmgtNy42NTZ2MjQuMTZINTUuNTZWMTYuNTgyYzAtMS4xMTYuOTEzLTIuMDI1IDIuMDUtMi4wNDRoMTQuODEyYzkuNjcyIDAgMTEuNTQgMS4xMTcgMTMuODg3IDMuNDE3YTkuNzggOS43OCAwIDAgMSAyLjU2NCA3LjE5YzAgMi4zNzgtLjU1OCA1Ljc5NC0yLjc2OSA3Ljk0OS0uNjk1LjY4LTEuNTcyIDIuMjMyLTcuMDc1IDIuNjU3TDg4Ljk3NSA0Nkg3Ni45NzhsLTguNjgtOS41MzRhMi4wMTMgMi4wMTMgMCAwIDEtLjQzNC0xLjM2MnYtNC40NjZ6TTkwLjUwMyAxNi41OGMwLTEuMTI4LjkxNy0yLjA0MyAyLjA1LTIuMDQzaDkuNzEzYzExLjMxNCAwIDEzLjk1OCAxLjg4NyAxNy4zNDEgNS4yNTlhMTQuNTcyIDE0LjU3MiAwIDAgMSAzLjk2NiAxMC40NzIgMTQuNTcyIDE0LjU3MiAwIDAgMS0zLjk2NiAxMC40NzJjLTMuMzYgMy4zNS02LjAyNyA1LjI1OS0xNy4zNDEgNS4yNTloLTkuNzEzYTIuMDQ2IDIuMDQ2IDAgMCAxLTIuMDUtMi4wNDNWMTYuNTgxem04Ljk2MiAyMi4zM2gyLjc5YzcuMjU4IDAgOC4xODgtMS4wMzggMTAuMDgyLTIuOTI1YTcuNTU1IDcuNTU1IDAgMCAwIDIuMDcyLTUuNzA2IDcuNjU2IDcuNjU2IDAgMCAwLTIuMDYtNS42OTRjLTEuODk0LTEuODg3LTIuODI0LTIuOTI1LTEwLjA4My0yLjkyNWgtMi43OWwtLjAxMSAxNy4yNXoiIGZpbGw9IiNBMUExQTEiIGZpbGwtcnVsZT0iZXZlbm9kZCIvPjwvc3ZnPg=="--}}
            {{--alt="BRD logo">--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="partners-logo-container">--}}
            {{--<div class="logo-wrapper">--}}
            {{--<img class="bottom"--}}
            {{--src="{{asset('assets/img/home/coinmi_bottom.png')}}"--}}
            {{--alt="coinimi logo" style="margin-top:5px">--}}
            {{--<img class="top"--}}
            {{--src="{{asset('assets/img/home/coinmi_top.png')}}"--}}
            {{--alt="coinimi logo"--}}
            {{--style="margin-top:5px">--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="partners-logo-container">--}}
            {{--<div class="logo-wrapper">--}}
            {{--<img class="bottom"--}}
            {{--src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAwIiBoZWlnaHQ9IjQxIiB2aWV3Qm94PSIwIDAgMzAwIDQxIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjx0aXRsZT5sb2dvIGZyZWUgd2FsbGV0IGdyZWVuPC90aXRsZT48cGF0aCBkPSJNMzAwIDM5LjAzN2MtMS4yMDMuOTM2LTMuMzQyIDEuODcyLTUuNzQ4IDEuODcyLTUuNzQ5IDAtOC4wMjItMy42MS04LjAyMi0xMC4xNjFWNy40ODZoMi45NDJ2Ny4yMTloMTAuMjk0djIuODA4aC0xMC4yOTR2MTIuNzAxYzAgNS4wOCAxLjYwMyA3Ljc1NCA1Ljc0OCA3Ljc1NCAxLjczOCAwIDMuMjA5LS42NjkgNC4xNDQtMS4zMzdsLjkzNiAyLjQwNnptLTQxLjg0NS0xMy4zNjljLjQwMi01LjA4IDMuODc3LTguODIzIDkuNjI2LTguODIzIDUuMzQ4IDAgOC44MjMgMy4zNDIgOC45NTcgOC44MjNoLTE4LjU4M3ptOS44OTQtMTEuNjMxYy04LjU1NyAwLTEzLjEwMiA1Ljg4Mi0xMy4xMDIgMTMuMzY5IDAgOC4xNTUgNS40ODIgMTMuMzY5IDEzLjYzNiAxMy4zNjkgMy40NzcgMCA3LjA4Ni0xLjIwMyA5LjQ5Mi0zLjYxbC0uODAyLTIuNDA2Yy0xLjg3MiAxLjg3Mi00Ljk0NiAzLjIwOS04LjQyMiAzLjIwOS02LjE1IDAtMTAuMjk0LTMuNzQzLTEwLjU2Mi05Ljg5M2gyMS4yNTdjLjEzNC0uNjY5LjEzNC0xLjQ3MS4xMzQtMi40MDcgMC03LjA4Ni00Ljk0Ny0xMS42MzEtMTEuNjMxLTExLjYzMXptLTE3LjExMiAyMi41OTRsLjgwMSAyLjQwNmMtMS4yMDMuOTM2LTMuMDc1IDEuNzM4LTUuNDgxIDEuNzM4LTMuODc3IDAtNS42MTUtMi4yNzMtNS42MTUtNi45NTJWLjI2N2gyLjk0MXYzMS44MThjMCAzLjg3Ny45MzYgNS43NDkgMy43NDQgNS43NDkgMS4zMzYgMCAyLjgwNy0uNjY5IDMuNjEtMS4yMDN6bS0xNi4xNzcgMGwuODAyIDIuNDA2Yy0xLjIwNC45MzYtMy4wNzUgMS43MzgtNS40ODEgMS43MzgtMy44NzcgMC01LjYxNS0yLjI3My01LjYxNS02Ljk1MlYuMjY3aDIuOTQxdjMxLjgxOGMwIDMuODc3LjkzNiA1Ljc0OSAzLjc0MyA1Ljc0OSAxLjMzNyAwIDIuODA4LS42NjkgMy42MS0xLjIwM3ptLTIxLjc5Mi0yLjgwOGMtMS4zMzYgMS44NzItMy40NzYgNC4wMTEtNy44ODcgNC4xNDUtMy4yMDkgMC01Ljc0OS0xLjg3Mi01Ljc0OS01LjA4IDAtMy43NDQgMy42MDktNS4zNDggNi45NTItNS4zNDggMi42NzQgMCA0LjgxMy42NjggNi42ODQgMi4wMDV2NC4yNzh6bS02LjU1MS0xOS43ODZjLTIuOTQgMC01Ljc0OC45MzYtOC4xNTQgMi40MDdsLjUzNCAyLjQwNmMyLjI3Mi0xLjIwMyA0LjE0NC0yLjAwNSA3LjIyLTIuMDA1IDYuNDE3IDAgNi44MTggMy44NzcgNi44MTggMTAuMDI2LTIuMDA2LTEuNjA0LTQuOTQ3LTIuMDA1LTYuOTUyLTIuMDA1LTUuNDgyIDAtOS43NiAyLjgwOC05Ljc2IDguMDIyIDAgNC42NzkgMy4yMDkgNy42MiA4LjAyMiA3LjYyIDQuNjc5IDAgNy4yMTktMi4xMzkgOC44MjMtNC4yNzh2NC4wMTFoMi45NDF2LTE1LjkxYzAtNi41NS0yLjI3Mi0xMC4yOTQtOS40OTItMTAuMjk0em0tMTYuNzExLjY2OGgzLjA3NWwtOC4xNTUgMjUuOTM2aC0yLjQwNmwtNy4wODYtMTguNzE2LTEuMjAzLTMuMjA5Yy0uNDAxIDEuMjAzLS42NjggMi4yNzMtMS4yMDMgMy40NzZsLTYuOTUzIDE4LjU4M2gtMi40MDZsLTguNjg5LTI2LjA3aDMuMjA4bDUuODgzIDE4LjA0OWMuNDAxIDEuMzM3LjY2NyAyLjU0IDEuMDY5IDMuNzQzLjQwMS0xLjIwMy44MDItMi40MDYgMS4yMDMtMy43NDNsNi41NTEtMTguMDQ5SDE3NWw2LjY4NSAxNy45MTVjLjQwMSAxLjIwMy44MDIgMi41NCAxLjMzNiAzLjg3Ny40MDItMS40NzEuODAzLTIuODA4IDEuMjA0LTQuMTQ0bDUuNDgxLTE3LjY0OHptLTU5Ljg5MyAxMC45NjNjLjUzNS01LjA4IDMuODc3LTguODIzIDkuNjI1LTguODIzIDUuMzQ4IDAgOC44MjUgMy4zNDIgOC45NTggOC44MjNoLTE4LjU4M3ptMTAuMDI3LTExLjYzMWMtOC41NTYgMC0xMy4xMDIgNS44ODItMTMuMTAyIDEzLjM2OSAwIDguMTU1IDUuNDgyIDEzLjM2OSAxMy42MzcgMTMuMzY5IDMuNDc2IDAgNy4wODUtMS4yMDMgOS40OTEtMy42MWwtLjgwMi0yLjQwNmMtMS44NzIgMS44NzItNC45NDYgMy4yMDktOC40MjIgMy4yMDktNi4xNSAwLTEwLjI5NC0zLjc0My0xMC41NjEtOS44OTNoMjEuMjU2Yy4xMzQtLjY2OS4xMzQtMS40NzEuMTM0LTIuNDA3IDAtNy4wODYtNC45NDctMTEuNjMxLTExLjYzMS0xMS42MzF6bS0zOS41NzIgMTEuNjMxYy41MzUtNS4wOCAzLjg3Ny04LjgyMyA5LjYyNi04LjgyMyA1LjM0NyAwIDguODIzIDMuMzQyIDguOTU3IDguODIzaC0xOC41ODN6bTEwLjAyNi0xMS42MzFjLTguNTU2IDAtMTMuMTAyIDUuODgyLTEzLjEwMiAxMy4zNjkgMCA4LjE1NSA1LjQ4MiAxMy4zNjkgMTMuNjM3IDEzLjM2OSAzLjQ3NyAwIDcuMDg2LTEuMjAzIDkuNDkyLTMuNjFsLS44MDItMi40MDZjLTEuODcyIDEuODcyLTQuOTQ3IDMuMjA5LTguNDIyIDMuMjA5LTYuMTUgMC0xMC4yOTQtMy43NDMtMTAuNTYyLTkuODkzaDIxLjI1N2MuMTM0LS42NjkuMTM0LTEuNDcxLjEzNC0yLjQwNyAwLTcuMDg2LTQuOTQ3LTExLjYzMS0xMS42MzItMTEuNjMxem0tMjAuMTg3LjEzNGMyLjEzOSAwIDMuMjA4LjQwMSA0LjAxMS45MzZsLTEuMDY5IDIuODA3Yy0xLjIwNC0uODAyLTIuMDA2LS45MzYtMy42MTEtLjkzNi0zLjM0MSAwLTUuMDggMi4xNC02LjI4MyA0LjE0NXYxOS4yNTFoLTIuOTQxVjE0LjU3MmgyLjk0MXYzLjQ3NmMxLjQ3MS0yLjEzOSAzLjYxLTMuODc3IDYuOTUyLTMuODc3ek01MS40NzEuMjY3aDIyLjMyNnYyLjk0MUg1NC42OHYxNi41NzhoMTcuNTEydjIuOTQxSDU0LjY4djE3LjY0N2gtMy4yMDlWLjI2N3pNMTkuNzg2IDE5Ljc4NkgzLjQ3N1YzLjQ3NWgxNi4zMDlsLTQuMjc3IDguMTU2IDQuMjc3IDguMTU1ek0wIDB2NDAuNTA4aDMuNDc3VjIzLjI2MmgyMi4wNThsLTYuMDE2LTExLjYzMUwyNS41MzUgMEgweiIgZmlsbD0iIzEwRDA3OCIgZmlsbC1ydWxlPSJldmVub2RkIi8+PC9zdmc+"--}}
            {{--alt="freewallet logo">--}}
            {{--<img class="top"--}}
            {{--src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAwIiBoZWlnaHQ9IjQxIiB2aWV3Qm94PSIwIDAgMzAwIDQxIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjx0aXRsZT5GaWxsIDE8L3RpdGxlPjxwYXRoIGQ9Ik0zMDAgMzkuMDM3Yy0xLjIwMy45MzYtMy4zNDIgMS44NzItNS43NDggMS44NzItNS43NDkgMC04LjAyMi0zLjYxLTguMDIyLTEwLjE2MVY3LjQ4NmgyLjk0MnY3LjIxOWgxMC4yOTR2Mi44MDhoLTEwLjI5NHYxMi43MDFjMCA1LjA4IDEuNjAzIDcuNzU0IDUuNzQ4IDcuNzU0IDEuNzM4IDAgMy4yMDktLjY2OSA0LjE0NC0xLjMzN2wuOTM2IDIuNDA2em0tNDEuODQ1LTEzLjM2OWMuNDAyLTUuMDggMy44NzctOC44MjMgOS42MjYtOC44MjMgNS4zNDggMCA4LjgyMyAzLjM0MiA4Ljk1NyA4LjgyM2gtMTguNTgzem05Ljg5NC0xMS42MzFjLTguNTU3IDAtMTMuMTAyIDUuODgyLTEzLjEwMiAxMy4zNjkgMCA4LjE1NSA1LjQ4MiAxMy4zNjkgMTMuNjM2IDEzLjM2OSAzLjQ3NyAwIDcuMDg2LTEuMjAzIDkuNDkyLTMuNjFsLS44MDItMi40MDZjLTEuODcyIDEuODcyLTQuOTQ2IDMuMjA5LTguNDIyIDMuMjA5LTYuMTUgMC0xMC4yOTQtMy43NDMtMTAuNTYyLTkuODkzaDIxLjI1N2MuMTM0LS42NjkuMTM0LTEuNDcxLjEzNC0yLjQwNyAwLTcuMDg2LTQuOTQ3LTExLjYzMS0xMS42MzEtMTEuNjMxem0tMTcuMTEyIDIyLjU5NGwuODAxIDIuNDA2Yy0xLjIwMy45MzYtMy4wNzUgMS43MzgtNS40ODEgMS43MzgtMy44NzcgMC01LjYxNS0yLjI3My01LjYxNS02Ljk1MlYuMjY3aDIuOTQxdjMxLjgxOGMwIDMuODc3LjkzNiA1Ljc0OSAzLjc0NCA1Ljc0OSAxLjMzNiAwIDIuODA3LS42NjkgMy42MS0xLjIwM3ptLTE2LjE3NyAwbC44MDIgMi40MDZjLTEuMjA0LjkzNi0zLjA3NSAxLjczOC01LjQ4MSAxLjczOC0zLjg3NyAwLTUuNjE1LTIuMjczLTUuNjE1LTYuOTUyVi4yNjdoMi45NDF2MzEuODE4YzAgMy44NzcuOTM2IDUuNzQ5IDMuNzQzIDUuNzQ5IDEuMzM3IDAgMi44MDgtLjY2OSAzLjYxLTEuMjAzem0tMjEuNzkyLTIuODA4Yy0xLjMzNiAxLjg3Mi0zLjQ3NiA0LjAxMS03Ljg4NyA0LjE0NS0zLjIwOSAwLTUuNzQ5LTEuODcyLTUuNzQ5LTUuMDggMC0zLjc0NCAzLjYwOS01LjM0OCA2Ljk1Mi01LjM0OCAyLjY3NCAwIDQuODEzLjY2OCA2LjY4NCAyLjAwNXY0LjI3OHptLTYuNTUxLTE5Ljc4NmMtMi45NCAwLTUuNzQ4LjkzNi04LjE1NCAyLjQwN2wuNTM0IDIuNDA2YzIuMjcyLTEuMjAzIDQuMTQ0LTIuMDA1IDcuMjItMi4wMDUgNi40MTcgMCA2LjgxOCAzLjg3NyA2LjgxOCAxMC4wMjYtMi4wMDYtMS42MDQtNC45NDctMi4wMDUtNi45NTItMi4wMDUtNS40ODIgMC05Ljc2IDIuODA4LTkuNzYgOC4wMjIgMCA0LjY3OSAzLjIwOSA3LjYyIDguMDIyIDcuNjIgNC42NzkgMCA3LjIxOS0yLjEzOSA4LjgyMy00LjI3OHY0LjAxMWgyLjk0MXYtMTUuOTFjMC02LjU1LTIuMjcyLTEwLjI5NC05LjQ5Mi0xMC4yOTR6bS0xNi43MTEuNjY4aDMuMDc1bC04LjE1NSAyNS45MzZoLTIuNDA2bC03LjA4Ni0xOC43MTYtMS4yMDMtMy4yMDljLS40MDEgMS4yMDMtLjY2OCAyLjI3My0xLjIwMyAzLjQ3NmwtNi45NTMgMTguNTgzaC0yLjQwNmwtOC42ODktMjYuMDdoMy4yMDhsNS44ODMgMTguMDQ5Yy40MDEgMS4zMzcuNjY3IDIuNTQgMS4wNjkgMy43NDMuNDAxLTEuMjAzLjgwMi0yLjQwNiAxLjIwMy0zLjc0M2w2LjU1MS0xOC4wNDlIMTc1bDYuNjg1IDE3LjkxNWMuNDAxIDEuMjAzLjgwMiAyLjU0IDEuMzM2IDMuODc3LjQwMi0xLjQ3MS44MDMtMi44MDggMS4yMDQtNC4xNDRsNS40ODEtMTcuNjQ4em0tNTkuODkzIDEwLjk2M2MuNTM1LTUuMDggMy44NzctOC44MjMgOS42MjUtOC44MjMgNS4zNDggMCA4LjgyNSAzLjM0MiA4Ljk1OCA4LjgyM2gtMTguNTgzem0xMC4wMjctMTEuNjMxYy04LjU1NiAwLTEzLjEwMiA1Ljg4Mi0xMy4xMDIgMTMuMzY5IDAgOC4xNTUgNS40ODIgMTMuMzY5IDEzLjYzNyAxMy4zNjkgMy40NzYgMCA3LjA4NS0xLjIwMyA5LjQ5MS0zLjYxbC0uODAyLTIuNDA2Yy0xLjg3MiAxLjg3Mi00Ljk0NiAzLjIwOS04LjQyMiAzLjIwOS02LjE1IDAtMTAuMjk0LTMuNzQzLTEwLjU2MS05Ljg5M2gyMS4yNTZjLjEzNC0uNjY5LjEzNC0xLjQ3MS4xMzQtMi40MDcgMC03LjA4Ni00Ljk0Ny0xMS42MzEtMTEuNjMxLTExLjYzMXptLTM5LjU3MiAxMS42MzFjLjUzNS01LjA4IDMuODc3LTguODIzIDkuNjI2LTguODIzIDUuMzQ3IDAgOC44MjMgMy4zNDIgOC45NTcgOC44MjNoLTE4LjU4M3ptMTAuMDI2LTExLjYzMWMtOC41NTYgMC0xMy4xMDIgNS44ODItMTMuMTAyIDEzLjM2OSAwIDguMTU1IDUuNDgyIDEzLjM2OSAxMy42MzcgMTMuMzY5IDMuNDc3IDAgNy4wODYtMS4yMDMgOS40OTItMy42MWwtLjgwMi0yLjQwNmMtMS44NzIgMS44NzItNC45NDcgMy4yMDktOC40MjIgMy4yMDktNi4xNSAwLTEwLjI5NC0zLjc0My0xMC41NjItOS44OTNoMjEuMjU3Yy4xMzQtLjY2OS4xMzQtMS40NzEuMTM0LTIuNDA3IDAtNy4wODYtNC45NDctMTEuNjMxLTExLjYzMi0xMS42MzF6bS0yMC4xODcuMTM0YzIuMTM5IDAgMy4yMDguNDAxIDQuMDExLjkzNmwtMS4wNjkgMi44MDdjLTEuMjA0LS44MDItMi4wMDYtLjkzNi0zLjYxMS0uOTM2LTMuMzQxIDAtNS4wOCAyLjE0LTYuMjgzIDQuMTQ1djE5LjI1MWgtMi45NDFWMTQuNTcyaDIuOTQxdjMuNDc2YzEuNDcxLTIuMTM5IDMuNjEtMy44NzcgNi45NTItMy44Nzd6TTUxLjQ3MS4yNjdoMjIuMzI2djIuOTQxSDU0LjY4djE2LjU3OGgxNy41MTJ2Mi45NDFINTQuNjh2MTcuNjQ3aC0zLjIwOVYuMjY3ek0xOS43ODYgMTkuNzg2SDMuNDc3VjMuNDc1aDE2LjMwOWwtNC4yNzcgOC4xNTYgNC4yNzcgOC4xNTV6TTAgMHY0MC41MDhoMy40NzdWMjMuMjYyaDIyLjA1OGwtNi4wMTYtMTEuNjMxTDI1LjUzNSAwSDB6IiBmaWxsPSIjQTNBM0EzIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiLz48L3N2Zz4="--}}
            {{--alt="freewallet logo"></div>--}}
            {{--</div>--}}
            {{--<div class="partners-logo-container">--}}
            {{--<div class="logo-wrapper">--}}
            {{--<img class="bottom"--}}
            {{--src="{{asset('assets/img/home/coinpayment_bottom.png')}}"--}}
            {{--alt="coinpayments logo" style="margin-top:-12px">--}}
            {{--<img class="top"--}}
            {{--src="{{asset('assets/img/home/coinpayment_top.png')}}"--}}
            {{--alt="coinpayments logo"--}}
            {{--style="margin-top:-12px">--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</a></div>--}}
            @include('partial/home/footer')
        </div>
    </div>
@stop

@section('footer_scripts')
    <script src="{{ asset('assets/js/home.js') }}"></script>
@stop