@extends('administration.app.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">


                    <h4 class="card-title">{{ $subcategory->getNameTran()}}</h4>

                    {{--forms for actions with subcategories--}}

                    <table class="table table-hover table-bordered">

                        <thead class="text-center">
                        <tr>
                            <th>Название</th>
                            <th>Основной</th>
                            <th>Тип параметра</th>
                            <th>Тип значений</th>
                            <th>Ко-во значений</th>
                            <th>Действия</th>
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

                                <td class="text-center" id="param-rel-block-{{ $param->id }}">
                                    @include('administration.admin.settings.subcategories.show.layouts.pram_ralation_change_block')
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


    <div class="modal fade" id="relation-s-p-modal" tabindex="-1" role="dialog" aria-labelledby=relation-s-p-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title w-100 text-center text-white" id="rerelation-s-p-label">Внимание!</h5>
                </div>
                <div class="modal-body">
                    <form action="" id="relation-s-p-modal-form" method="post">
                        @csrf
                        <input type="hidden" id="param-id-input" name="param_id" value="">

                    </form>
                    <p class="text-center" id="relation-s-p-modal-info"></p>
                </div>
                <div class="modal-footer d-flex justify-content-around">
                    <button type="button" class="btn btn-success" id="relation-s-p-modal-submit" form="relation-s-p-modal-form">подтвердить</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">отменить</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script2')
    <script>
        $('.card').on('click', '.change-relation-s-p', function () {
            let url = $(this).data('url');
            let paramId = $(this).data('param');
            let action = $(this).data('action');
            $('#relation-s-p-modal-form').attr('action', url);
            $('#param-id-input').val(paramId);

            let info = '';
            if(action == 'attach'){
                info = 'Вы уверены, что хотите подключить эту характеристику к данной подкатегории?';
            }else if(action == 'detach'){
                info = '<i class="fa fa-warning fa-2x text-danger"></i><br>Вы уверены, что хотите отключить эту характеристику у данной подкатегории?<br>Отключение характеристики удалит ее у всех товаров данной подкатегории!';
            }
            $('#relation-s-p-modal-info').html(info);
            $('#relation-s-p-modal').modal({
                'backdrop' : 'static',
                'keyboard' : false
            });
        });

        $('body').on('click', '#relation-s-p-modal-submit', function () {
            let form = $('#'+$(this).attr('form'));
            let url = form.attr('action');
            let paramId = $('#param-id-input').val();
            let formData = new FormData();

            formData.append('param_id', paramId);

            sendAction(url, formData, function(data){
                if(data.status == 'success'){
                    toastr.success(data.msg);
                    $('#param-rel-block-'+paramId).html(data.render);
                }else if(data.status == 'erorr'){
                    toastr.error(data.msg);
                }
                $('#relation-s-p-modal').modal('hide');
            });
        });
    </script>
@endsection