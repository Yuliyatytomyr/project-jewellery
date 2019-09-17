@extends('administration.app.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        {{ $title }}
                    </h4>

                    <table class="table table-hover table-bordered">

                        <thead class="text-center">
                        <tr>
                            <th>Заголовок</th>
                            <th>Изображение</th>
                            <th>Публикация</th>
                            <th>Дата/время создания</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($bt_posts as $bt_post)
                                <tr class="text-center">
                                    <td>
                                        <a href="{{ asset(app()->getLocale().'/admin/blog/posts/'.$bt_post->alias) }}">{{ $bt_post->getTitleTran() }}</a>
                                    </td>

                                    <td>
                                        <img src="{{ asset($bt_post->image_path) }}" alt="{{ $bt_post->getTitleTran() }}">
                                    </td>

                                    <td id="bt-post-toggle-{{ $bt_post->id }}">
                                        @include('administration.admin.blog.theme.show.layouts.b_t_post_toggle', [
                                            'btpost' => $bt_post
                                        ])
                                    </td>

                                    <td>
                                        {{ $bt_post->created_at }}
                                    </td>

                                    <td id="bt-post-actions-{{ $bt_post->id }}">
                                        @include('administration.admin.blog.theme.show.layouts.b_t_post_actions', [
                                            'btpost' => $bt_post
                                        ])
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="5">Новостей нет</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                    {{ $bt_posts->links() }}
                </div>
                <a href="{{  asset(app()->getLocale().'/admin/blog/posts/create') }}" class="btn btn-primary">+ Добавить новость</a>
            </div>
        </div>
    </div>
@endsection

@section('script2')
    <script>
        $('.card').on('click', '.btpost-toggle', function (e) {
            e.preventDefault();

            let url = $(this).data('url');
            let formData = new FormData();

            sendActionGet(url, formData, (data) => {
                if(data.status == 'success') {
                    toastr.info(data.msg);
                    let btPostId = data.btPostId;
                    $('#bt-post-toggle-'+btPostId).html(data.renders.toggle);
                    $('#bt-post-actions-'+btPostId).html(data.renders.actions);
                }
            });
        });
    </script>
@endsection