@extends('layout.admin')
@section('title')
    @lang('general/message.edit_blog_tag')
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple"><i class="material-icons">perm_identity</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">
                        @lang('general/message.news_tag') -
                        <small class="category">
                            @lang('general/message.edit_tag')
                        </small>
                    </h4>
                    <form action="{{route('admin.tag.update',['id'=> $tag->id])}}"
                          method="post">{{ csrf_field() }}
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
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="tag">@lang('general/message.tag_name')</label>
                                    <input id="tag" name="tag" type="text" value="{{$tag->tag}}"
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                        <a href="{{route('admin.tag.index')}}"
                           class="btn btn-rose">@lang('general/message.cancel_edit')</a>
                        <button type="submit"
                                class="btn btn-success pull-right">@lang('general/message.save_change')</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
