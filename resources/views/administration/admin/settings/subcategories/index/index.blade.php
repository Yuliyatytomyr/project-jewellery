@extends('administration.app.app')

@section('content')



    <div class="row">

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Подкатегории <a href="{{ asset(app()->getLocale().'/admin/settings/subcategories/create') }}" title="добаить категорию"><i class="fa fa-plus text-success"></i></a></h4>

                    <table class="table table-hover table-bordered">

                        <thead class="text-center">
                        <tr>
                            <th>Название</th>
                            <th>Родительская категория</th>
                            <th>Ко-во товаров</th>
                            <th>Действия</th>
                        </tr>
                        </thead>

                        <tbody>

                        @forelse($subcategories as $subcategory)
                            <tr>
                                <td>
                                    <a href="{{ asset(app()->getLocale().'/admin/settings/subcategories/'.$subcategory->alias) }}">{{ $subcategory->getNameTran() }}</a>
                                </td>

                                <td>
                                    <a href="{{ asset(app()->getLocale().'/admin/settings/categories/'.$subcategory->category->alias) }}">{{ $subcategory->category->getNameTran() }}</a>
                                </td>

                                <td>
                                    Нет данных
                                </td>

                                <td class="text-center">
                                    <a class="text-info mr-3" href="{{ asset(app()->getLocale().'/admin/settings/subcategories/'.$subcategory->alias) }}" title="Просмотреть подкатегорию {{ $subcategory->name_ru }}"><i class="fa fa-eye"></i></a>
                                    <a class="text-warning" href="{{ asset(app()->getLocale().'/admin/settings/subcategories/'.$subcategory->alias.'/edit') }}" title="Редактировать подкатегорию {{ $subcategory->name_ru }}"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Податегории не обнаружены</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $subcategories->links() }}
                </div>
            </div>
        </div>


    </div>
@endsection