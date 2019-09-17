@extends('administration.app.app')

@section('content')



    <div class="row">

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $title }} <a href="{{ asset(app()->getLocale().'/admin/settings/params/create') }}" title="добаить характеристику"><i class="fa fa-plus text-success"></i></a></h4>

                    <table class="table table-hover table-bordered">

                        <thead class="text-center">
                        <tr>
                            <th>Название</th>
                            <th>Основной</th>
                            <th>Тип параметра</th>
                            <th>Тип значений</th>
                            <th>Ко-во значений</th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>

                        @forelse($params as $param)
                            <tr class="text-center">
                                <td>
                                    <a href="{{ asset(app()->getLocale().'/admin/settings/params/'.$param->id) }}">{{ $param->getNameTran() }}</a>
                                </td>

                                <td>
                                    @if($param->special)
                                        Да
                                    @else
                                        Нет
                                    @endif
                                </td>

                                <td>
                                    @if($param->type_param == 'list')
                                        Одинарный
                                    @elseif($param->type_param == 'tab')
                                        Мульти
                                    @endif
                                </td>

                                <td>
                                    @if($param->type_value == 'text')
                                        Текстовый
                                    @elseif($param->type_value == 'int')
                                        Целочисловой
                                    @elseif($param->type_value == 'dec')
                                        Дробный
                                    @endif
                                </td>

                                <td>
                                    {{ $param->pvalues->count() }}
                                </td>

                                <td class="text-center p-0">
                                    <div class="dropdown dropleft">
                                        <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-cogs ml-1"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -186px, 0px);">

                                            <a class="dropdown-item" href="{{ asset(app()->getLocale().'/admin/settings/params/'.$param->id) }}" title="Просмотреть характеристику {{ $param->getNameTran() }}">Просмотр</a>
                                            <a class="dropdown-item" href="{{ asset(app()->getLocale().'/admin/settings/params/'.$param->id.'/edit') }}" title="Редактировать характеристику {{ $param->getNameTran() }}">Редактирование</a>
                                            <a class="dropdown-item add-rel-for-all-subcats" style="cursor: pointer;" data-url="{{ asset(app()->getLocale().'/admin/settings/params/'.$param->id.'/attach_all_subcats') }}" title="Добавить ко всем подкатегориям {{ $param->getNameTran() }}">Добавить ко всем подкатегориям</a>

                                        </div>
                                    </div>
                                    {{--<a class="text-info mr-3" href="{{ asset(app()->getLocale().'/admin/settings/params/'.$param->id) }}" title="Просмотреть характеристику {{ $param->getNameTran() }}">--}}
                                        {{--<i class="fa fa-eye"></i>--}}
                                    {{--</a>--}}
                                    {{--<a class="text-warning" href="{{ asset(app()->getLocale().'/admin/settings/params/'.$param->id.'/edit') }}" title="Редактировать характеристику {{ $param->getNameTran() }}">--}}
                                        {{--<i class="fa fa-edit"></i>--}}
                                    {{--</a>--}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Характеристики товаров не обнаружены</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $params->links() }}
                </div>
            </div>
        </div>


    </div>
@endsection

@section('script2')
    <script>
        $('.card').on('click', '.add-rel-for-all-subcats', function(){
            let url = $(this).data('url');
            let formData = new FormData();

            sendAction(url, formData, (data) => {
                console.log(data)
            });
        });
    </script>
@endsection