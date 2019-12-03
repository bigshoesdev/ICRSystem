@extends('layout.admin')
@section('title')
    @lang('general/message.view_all_news')
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
                <h4 class="card-title">@lang('general/message.all_news')</h4>
                <div class="card-content">
                    <br>
                    @if(count($posts) > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">@lang('general/message.id')</th>
                                    <th class="text-center">@lang('general/message.photo')</th>
                                    <th class="text-center">@lang('general/message.title')</th>
                                    <th class="text-center">@lang('general/message.view_news')</th>
                                    <th class="text-center">@lang('general/message.edit_news')</th>
                                    <th class="text-center">@lang('general/message.actions')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $id=0;@endphp
                                @foreach($posts as $post)
                                    @php $id++;@endphp
                                    <tr>
                                        <td class="text-center">{{ $id }}</td>
                                        <td width="10%">
                                            <img src="{{$post->featured}}" class="img-circle" alt="No Photo">
                                        </td>
                                        <td class="text-center">{{str_limit($post->title, 30)}}</td>
                                        <td class="td-actions text-center">
                                            <a href="{{route('news.view',['slug'=>$post->slug])}}" type="button" rel="tooltip" class="btn btn-info" target="_blank">
                                                <i class="material-icons">edit</i>
                                            </a>
                                        </td>

                                        <td class="td-actions text-center">
                                            <a href="{{route('admin.post.edit',['id'=>$post->id])}}" type="button"
                                               rel="tooltip" class="btn btn-warning">
                                                <i class="material-icons">edit</i>
                                            </a>
                                        </td>

                                        <td class="td-actions text-center">
                                            <a href="{{route('admin.post.kill',['id'=>$post->id])}}" type="button"
                                               rel="tooltip" class="btn btn-danger news-delete">
                                                <i class="material-icons">close</i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <h1 class="text-center">@lang('general/message.no_news')</h1>
                    @endif
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-5">
                            {{$posts->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
    <script type="text/javascript">
        $(".news-delete").on('click', function (e) {
            e.preventDefault();
            var theHREF = $(this).attr("href");
            $.confirm({
                title: "@lang('general/message.del_confirm')",
                content: "@lang('general/message.sure_delete_news')",
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


