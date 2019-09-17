@extends('administration.app.app')

@section('content')



    <div class="row">

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ (app()->getLocale() == 'ru') ? $category->name_ru : $category->name_ua }} <a href="{{ asset(app()->getLocale().'/admin/settings/subcategories/create?category_alias='.$category->alias) }}" title="добаить подкатегорию"><i class="fa fa-plus text-success"></i></a></h4>

                    <table class="table table-hover table-bordered">

                        <thead class="text-center">
                        <tr>
                            <th>Название</th>
                            <th>Изображения</th>
                            <th>Ко-во товаров</th>
                            <th>Действия</th>
                        </tr>
                        </thead>

                        <tbody>
                        @forelse($category->subcategories as $subcategory)
                            <tr>
                                <td>
                                    <a href="{{ asset(app()->getLocale().'/admin/settings/subcategories/'.$subcategory->alias) }}">
                                        {{ $subcategory->getNameTran() }}
                                    </a>
                                </td>
                                <td class="text-center">

                                    @if($subcategory->image_thumb != null)
                                        <img src="{{ asset($subcategory->image_thumb) }}" alt="{{ $subcategory->alias.'_thumb' }}">
                                    @endif

                                    @if($subcategory->image_full != null)
                                        <img src="{{ asset($subcategory->image_full) }}" alt="{{ $subcategory->alias.'_full' }}">
                                    @endif

                                </td>
                                <td class="text-center">
                                    нет данных
                                </td>
                                <td class="text-center">
                                    <a class="text-info mr-3" href="{{ asset(app()->getLocale().'/admin/settings/subcategories/'.$subcategory->alias) }}" title="Просмотреть подкатегорию {{ $subcategory->name_ru }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="text-warning" href="{{ asset(app()->getLocale().'/admin/settings/subcategories/'.$subcategory->alias.'/edit') }}" title="Редактировать подкатегорию {{ $subcategory->name_ru }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Подкатегории не обнаружены</td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
@endsection