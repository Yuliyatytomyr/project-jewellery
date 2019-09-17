@extends('administration.app.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $title }} <a href="{{ asset(app()->getLocale().'/admin/settings/pvalues/create?param_id='.$param->id) }}" title="добаить значение"><i class="fa fa-plus text-success"></i></a></h4>

                    

                    <table class="table table-hover table-bordered">

                        <thead class="text-center">
                            <tr>
                                <th>id значения</th>
                                <th>Название (ru)</th>
                                <th>Название (ua)</th>
                                <th>Действия</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($pvalues as $pvalue)
                                <tr class="text-center">
                                    <td>
                                        {{ $pvalue->id }}
                                    </td>

                                    <td>
                                        {{ $pvalue->name_ru }}
                                    </td>

                                    <td>
                                        {{ $pvalue->name_ua }}
                                    </td>

                                    <td>
                                        <a class="text-warning" href="{{ asset(app()->getLocale().'/admin/settings/pvalues/'.$pvalue->id.'/edit') }}" title="Редактировать значение {{ $pvalue->name_ru }}"><i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Значения не обнаружены</td>
                                </tr>
                            @endforelse
                        </tbody>

                        </tbody>
                    </table>

                    {{ $pvalues->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection