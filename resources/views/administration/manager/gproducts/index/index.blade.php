@extends('administration.app.app')

@section('content')

    <div class="row">

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4>
                        {{ $title }}
                        <a href="{{ asset(app()->getLocale().'/manager/gproducts/create') }}" title="добавить товар"><i class="fa fa-plus text-success"></i></a>
                    </h4>

                    <table class="table table-hover table-bordered">

                        <thead class="text-center">
                        <tr>
                            <th>(Категория) подкатегория</th>
                            <th>Название</th>
                            <th>Изображения</th>
                            <th>Действия</th>
                        </tr>
                        </thead>

                        <tbody id="gproducts-place">

                        @forelse($gproducts as $gproduct)
                            <tr>
                                <td class="text-center">
                                    ({{ $gproduct->category->getNameTran() }}) {{ $gproduct->subcategory->getNameTran() }}
                                </td>

                                <td>
                                    <a href="{{ asset(app()->getLocale().'/manager/gproducts/'.$gproduct->alias) }}">
                                        {{ $gproduct->getNameTran() }}
                                    </a>
                                </td>

                                <td class="text-center">

                                </td>





                                <td class="text-center">
                                    <a class="text-info mr-3" href="{{ asset(app()->getLocale().'/manager/gproducts/'.$gproduct->alias) }}" title="Просмотреть товар {{ $gproduct->name_ru }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="text-warning" href="{{ asset(app()->getLocale().'/manager/gproducts/'.$gproduct->alias.'/edit') }}" title="Редактировать товар {{ $gproduct->name_ru }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Товары не найдены</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $gproducts->links() }}
                </div>
            </div>
        </div>


    </div>

@endsection