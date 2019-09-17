@extends('administration.app.app')

@section('content')
    <div class="col-12 card">
        <div class="card-body">
            <h3 class="">{{ $title }}</h3>
            <hr>
            <form class="row forms-sample" id="pvalue-edit-form" action="{{ asset(app()->getLocale().'/admin/settings/pvalues/'.$pvalue->id) }}" method="post">
                @csrf

                {{ method_field('PUT') }}
                <input type="hidden" name="redirect" value="{{ asset(app()->getLocale().'/admin/settings/params/'.$pvalue->param->id) }}">
                <input type="hidden" name="param_id" value="{{ $pvalue->param->id }}">


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pvalue-name-ru">Название (ru)*</label>
                        @if($pvalue->param->type_value == 'text')
                            <input type="text" class="form-control" id="pvalue-name-ru" name="name_ru" placeholder="Название (ru)" autocomplete="off" value="{{ $pvalue->name_ru }}">
                        @elseif($pvalue->param->type_value == 'int')
                            <input type="number" min="0" class="form-control" id="pvalue-name-ru" name="name_ru" placeholder="Название (ru)" autocomplete="off" value="{{ $pvalue->name_ru }}">
                        @elseif($pvalue->param->type_value == 'dec')
                            <input type="number" min="0" step="any" class="form-control" id="pvalue-name-ru" name="name_ru" placeholder="Название (ru)" autocomplete="off" value="{{ $pvalue->name_ru }}">
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pvalue-name-ua">Название (ua)*</label>
                        @if($pvalue->param->type_value == 'text')
                            <input type="text" class="form-control" id="pvalue-name-ua" name="name_ua" placeholder="Название (ua)" autocomplete="off" value="{{ $pvalue->name_ua }}">
                        @elseif($pvalue->param->type_value == 'int')
                            <input type="number" min="0" class="form-control" id="pvalue-name-ua" name="name_ua" placeholder="Название (ua)" autocomplete="off" value="{{ $pvalue->name_ua }}">
                        @elseif($pvalue->param->type_value == 'dec')
                            <input type="number" min="0" step="any" class="form-control" id="pvalue-name-ua" name="name_ua" placeholder="Название (ua)" autocomplete="off" value="{{ $pvalue->name_ua }}">
                        @endif
                    </div>
                </div>


                <div class="col-12">
                    <div class="form-group">
                        <label for="pvalue-desc">Заметка по значению</label>
                        <textarea class="form-control" name="desc" id="pvalue-desc" rows="2">{{ $pvalue->desc }}</textarea>
                    </div>
                </div>


                <button type="button" class="btn btn-success mr-2" id="pvalue-edit-submit" form="pvalue-edit-form">Сохранить</button>
            </form>
        </div>
    </div>
@endsection

@section('script2')
    <script>


        $('.card').on('click', '#pvalue-edit-submit', function (e) {
            let form = $("#"+$(this).attr('form'));
            let url = form.attr('action');
            let data = form.serializeArray();

            let formData = new FormData();

            $.each(data, function (i, v) {
                formData.append(v.name, v.value);
            });

            sendForm(form, url, formData, function(data){

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