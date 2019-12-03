@extends('layout.admin')

@section('title')
    @lang('general/message.edit_category')
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">perm_identity</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">@lang('general/message.news_category') -
                        <small class="category">@lang('general/message.edit_category')</small>
                    </h4>
                    <form action="{{route('admin.category.update',['id'=>$category->id])}}" method="post">
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
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label"
                                           for="name">@lang('general/message.category_name')</label>
                                    <input id="name" name="name" type="text" value="{{$category->name}}"
                                           class="form-control">
                                </div>
                            </div>

                        </div>
                        <br><br><br>
                        <a href="{{route('admin.category.index')}}"
                           class="btn btn-rose">@lang('general/message.cancel_edit')</a>
                        <button type="submit"
                                class="btn btn-success pull-right">@lang('general/message.update_category')</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
