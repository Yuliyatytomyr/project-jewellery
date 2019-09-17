@extends('administration.app.app')

@section('content')
    <div class="col-12 card">
        <div class="card-body">
            <h3 class="card-title">{{ $title }}</h3>

            <form class="row forms-sample" id="param-create-form" action="{{ asset(app()->getLocale().'/admin/settings/params') }}" method="post">
                @csrf

                <input type="hidden" name="redirect" value="{{ asset(app()->getLocale().'/admin/settings/params') }}">
                <div class="col-6">
                    <div class="form-group">
                        <label for="type-param">Тип праметра</label>
                        <select class="form-control form-control-lg" name="type_param" id="type-param">
                            <option value="list">Одинарные</option>
                            <option value="tab">Мульти</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="type-value">Тип значения</label>
                        <select class="form-control form-control-lg" name="type_value" id="type-value">
                            <option value="text">Текстовое</option>
                            <option value="int">Целочисловое</option>
                            <option value="dec">Дробное</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="param-name-ru">Название (ru)*</label>
                        <input type="text" class="form-control" id="param-name-ru" name="name_ru" placeholder="Название (ru)">
                    </div>
                    <div class="form-group">
                        <label for="param-name-ua">Название (ua)*</label>
                        <input type="text" class="form-control" id="param-name-ua" name="name_ua" placeholder="Название (ua)">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <div class="form-check form-check-flat">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="special"> Основная характеристика <i class="input-helper"></i>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="param-desc-ru">Заметка о характеристеке товара</label>
                        <textarea class="form-control" name="desc" id="param-desc-ru" rows="2"></textarea>
                    </div>
                </div>
                <button type="button" class="btn btn-success mr-2" id="param-create-submit" form="param-create-form">Сохранить</button>
            </form>
        </div>
    </div>
@endsection

@section('script2')
    <script>

        $('.card').on('click', '#param-create-submit', function (e) {
            let form = $("#"+$(this).attr('form'));
            let url = form.attr('action');
            let data = form.serializeArray();
            let formData = new FormData();

            $.each(data, function (i, v) {
                formData.append(v.name, v.value);
            });

            sendFormWithFiles(form, url, formData, function(data){

                if(data.status == 'success'){
                    toastr.success(data.msg);

                    setTimeout(function () {
                        window.location.replace(data.redirect);
                    }, 1000);

                }
            });

        });
    </script>
@endsection