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
                            <th>Родительская категория</th>
                            <th>Названией</th>
                            <th>Ко-во товаров</th>
                            <th>Действия</th>
                        </tr>
                        </thead>

                        <tbody id="gproducts-place">

                        @forelse($subcategories as $subcategory)
                            <tr class="text-center">
                                <td>
                                    <a href="{{ asset(app()->getLocale().'/manager/categories/'.$subcategory->category->alias) }}" title="{{ $subcategory->category->getNameTran() }}">
                                        {{ $subcategory->category->getNameTran() }}
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ asset(app()->getLocale().'/manager/subcategories/'.$subcategory->alias) }}" title="{{ $subcategory->getNameTran() }}">
                                        {{ $subcategory->getNameTran() }}
                                    </a>
                                </td>

                                <td>
                                    {{ count($subcategory->gproducts) }}
                                </td>

                                <td>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Подкатегории не найдены</td>
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