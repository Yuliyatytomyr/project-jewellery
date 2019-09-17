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
                            <th>Тематика новостей</th>
                            <th>Публикация</th>
                            <th>Ко-во постов</th>
                            <th>Действия</th>
                        </tr>
                        </thead>

                        <tbody>
                            @forelse($bthemes as $btheme)
                                <tr class="text-center">
                                    <td>
                                        <a href="{{ asset(app()->getLocale().'/admin/blog/themes/'.$btheme->alias) }}">{{ $btheme->getNameTran() }}</a>
                                    </td>
                                    <td id="b-t-toggle-{{ $btheme->id }}">
                                        @include('administration.admin.blog.layouts.b_t_t_toggle')
                                    </td>
                                    <td>
                                        {{ count($btheme->btposts) }}
                                    </td>
                                    <td id="b-t-actions-{{ $btheme->id }}">
                                        @include('administration.admin.blog.layouts.b_t_t_actions')
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="4">Темы новостей отсутствуют</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <a href="{{  asset(app()->getLocale().'/admin/blog/themes/create') }}" class="btn btn-primary">+ Добавить тему</a>
            </div>
        </div>
    </div>
@endsection

@section('script2')
    <script>
        $('.card').on('click', '.btheme-toggle', function (e) {
            e.preventDefault();

            let url = $(this).data('url');
            let formData = new FormData();

            sendActionGet(url, formData, (data) => {
                if(data.status == 'success') {
                    toastr.info(data.msg);
                    let themeId = data.themeId;
                    $('#b-t-toggle-'+themeId).html(data.renders.toggle);
                    $('#b-t-actions-'+themeId).html(data.renders.actions);
                }
            });
        });
    </script>
@endsection