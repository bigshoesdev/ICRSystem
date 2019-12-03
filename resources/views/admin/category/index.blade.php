@extends('layout.admin')

@section('title')
    @lang('general/message.all_news_category')
@stop

@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <br>
                <h4 class="card-title">@lang('general/message.all_news_category')</h4>
                <div class="card-content">
                    <br>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">@lang('general/message.id')</th>
                                <th>@lang('general/message.name')</th>
                                <th>@lang('general/message.created')</th>
                                <th>@lang('general/message.updated')</th>
                                <th class="text-right">@lang('general/message.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($categories)
                                @foreach($categories as $category)
                                    <tr>
                                        <td class="text-center">{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->created_at->diffForHumans()}}</td>
                                        <td>{{$category->updated_at->diffForHumans()}}</td>
                                        <td class="td-actions text-right">
                                            <a href="{{route('admin.category.edit', $category->id)}}" type="button"
                                               rel="tooltip" class="btn btn-success">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a href="{{route('admin.category.delete', $category->id)}}" type="button"
                                               rel="tooltip" class="btn btn-danger category-delete">
                                                <i class="material-icons">close</i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <br>
                <h4 class="card-title">@lang('general/message.create_category')</h4>
                <div class="card-content">
                    <br>
                    <form class="m-form" action="{{route('admin.category.store')}}" method="post">
                        {{csrf_field()}}
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
                                <div class="form-group">
                                    <div class="form-group label-floating">
                                        <label class="control-label"
                                               for="name">@lang('general/message.full_name')</label>
                                        <input id="name" name="name" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="submit"
                                class="btn btn-success pull-right">@lang('general/message.create_category')</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script type="text/javascript">
        $(".category-delete").on('click', function (e) {
            e.preventDefault();

            var theHREF = $(this).attr("href");

            $.confirm({
                title: "@lang('general/message.del_confirm')",
                content: "@lang('general/message.sure_delete_category')",
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


    </script>

@endsection

