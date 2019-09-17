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
                            <th>Название</th>
                            <th>Ко-во подкатегорий</th>
                            <th>Ко-во товаров</th>
                            <th>Действия</th>
                        </tr>
                        </thead>

                        <tbody id="gproducts-place">

                        @forelse($categories as $category)
                            <tr class="text-center">
                                <td>
                                    <a href="{{ asset(app()->getLocale().'/manager/categories/'.$category->alias) }}" title="{{ $category->getNameTran() }}">
                                        {{ $category->getNameTran() }}
                                    </a>
                                </td>

                                <td>
                                    {{ count($category->subcategories) }}
                                </td>

                                <td>
                                    {{ count($category->gproducts) }}
                                </td>

                                <td>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Товары не найдены</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>

@endsection