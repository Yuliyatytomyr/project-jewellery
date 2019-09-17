@extends('administration.app.app')

@section('content')



    <div class="row">

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        {{ $title }}
                        {{--<a href="{{ asset(app()->getLocale().'/admin/settings/categories/create') }}" title="добаить категорию"><i class="fa fa-plus text-success"></i></a>--}}
                    </h4>

                    <table class="table table-hover table-bordered">

                        <thead class="text-center">
                        <tr>
                            <th>Название</th>
                            <th>Изображения</th>
                            <th>Ко-во подкатегорий</th>
                            <th>Ко-во товаров</th>
                            <th>Действия</th>
                        </tr>
                        </thead>

                        <tbody>

                        @forelse($categories as $category)
                            <tr>
                                <td>
                                    <a href="{{ asset(app()->getLocale().'/admin/settings/categories/'.$category->alias) }}">
                                        {{ $category->getNameTran() }}
                                    </a>
                                </td>

                                <td class="text-center">
                                    <img src="{{ asset($category->image_thumb) }}" alt="">
                                    <img src="{{ asset($category->image_full) }}" alt="">
                                </td>

                                <td class="text-center">
                                    {{ $category->subcategories->count() }}
                                </td>

                                <td>
                                    Данных нет
                                </td>

                                <td class="text-center">
                                    <a class="text-info mr-3" href="{{ asset(app()->getLocale().'/admin/settings/categories/'.$category->alias) }}" title="Просмотреть категорию {{ $category->name_ru }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="text-warning" href="{{ asset(app()->getLocale().'/admin/settings/categories/'.$category->alias.'/edit') }}" title="Редактировать категорию {{ $category->name_ru }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Категории не обнаружены</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
@endsection