@extends('administration.app.app')

@section('content')
    <div class="col-12 card">
        <div class="card-body">
            <h3 class="card-title">{{ $title }}</h3>

            <form class="row forms-sample" id="param-edit-form" action="{{ asset(app()->getLocale().'/admin/settings/params/'.$param->id) }}" method="post">
                @csrf
                {{ method_field('PUT') }}
                <input type="hidden" name="redirect" value="{{ asset(app()->getLocale().'/admin/settings/params') }}">
                <input type="hidden" name="action" id="param-edit-action" value="">
                <div class="col-6">
                    <div class="form-group">
                        <label for="type-param">Тип праметра</label>
                        <select class="form-control form-control-lg" name="type_param" id="type-param">
                            <option value="list" {{ $param->getSelectTypeParam('list') }}>Одинарные</option>
                            <option value="tab" {{ $param->getSelectTypeParam('tab') }}>Мульти</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="type-value">Тип значения</label>
                        <select class="form-control form-control-lg" name="type_value" id="type-value">
                            <option value="text" {{ $param->getSelectTypeValue('text') }}>Текстовое</option>
                            <option value="int" {{ $param->getSelectTypeValue('int') }}>Целочисловое</option>
                            <option value="dec" {{ $param->getSelectTypeValue('dec') }}>Дробное</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="param-name-ru">Название (ru)*</label>
                        <input type="text" class="form-control" id="param-name-ru" name="name_ru" placeholder="Название (ru)" value="{{ $param->name_ru }}">
                    </div>
                    <div class="form-group">
                        <label for="param-name-ua">Название (ua)*</label>
                        <input type="text" class="form-control" id="param-name-ua" name="name_ua" placeholder="Название (ua)" value="{{ $param->name_ua }}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <div class="form-check form-check-flat">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="special" {{ $param->checkSpecialParam() }}> Основная характеристика <i class="input-helper"></i>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="param-desc-ru">Заметка о характеристеке товара</label>
                        <textarea class="form-control" name="desc" id="param-desc-ru" rows="2">{{ $param->desc }}</textarea>
                    </div>
                </div>
                <button type="button" class="btn btn-success mr-2 param-edit-submit" data-action="check" form="param-edit-form">Сохранить</button>
            </form>
        </div>
    </div>

    <div class="modal fade" id="param-edit-modal" tabindex="-1" role="dialog" aria-labelledby=relation-s-p-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title w-100 text-center text-white" id="rerelation-s-p-label">Внимание!</h5>
                </div>
                <div class="modal-body">
                    <p class="text-center text-danger"><i class="fa fa-warning fa-2x"></i></p>
                    <p class="text-center" id="param-edit-modal-info"></p>
                </div>
                <div class="modal-footer d-flex justify-content-around">
                    <button type="button" class="btn btn-success param-edit-submit" data-action="edit" form="param-edit-form">подтвердить</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">отменить</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script2')
    <script>

        $('body').on('click', '.param-edit-submit', function (e) {
            let action = $(this).data('action');
            $('#param-edit-action').val(action);

            let form = $("#"+$(this).attr('form'));
            let url = form.attr('action');
            let data = form.serializeArray();
            let formData = new FormData();

            $.each(data, function (i, v) {
                formData.append(v.name, v.value);
            });

            sendForm(form, url, formData, function(data){

                if(data.action == 'confirm'){
                    toastr.warning('Внимание!');
                    $('#param-edit-modal-info').html(data.modalInfo);
                    $('#param-edit-modal').modal({
                        'backdrop' : 'static',
                        'keyboard' : false
                    });
                }else if(data.action == 'updated'){
                    toastr.success(data.msg);

                    setTimeout(function () {
                        window.location.replace(data.redirect);
                    }, 1000);
                }
            });

        });
    </script>
@endsection