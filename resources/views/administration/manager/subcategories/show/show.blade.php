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
                            <th>Наименование</th>
                            <th>data</th>
                            <th>data</th>
                            <th>Действия</th>
                        </tr>
                        </thead>

                        <tbody id="gproducts-place">

                        @forelse($gproducts as $gproduct)
                            <tr class="text-center">
                                <td>
                                    <a href="{{ asset(app()->getLocale().'/manager/gproducts/'.$gproduct->alias) }}" title="{{ $gproduct->getNameTran() }}">
                                        {{ $gproduct->getNameTran() }}
                                    </a>
                                </td>

                                <td>

                                </td>

                                <td>

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
                    {{ $gproducts->links() }}
                </div>
            </div>
        </div>


    </div>

@endsection