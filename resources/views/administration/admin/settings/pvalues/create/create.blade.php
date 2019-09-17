@extends('administration.app.app')

@section('content')
    <div class="col-12 card">
        <div class="card-body">
            <h3 class="">{{ $title }}</h3>
            <hr>
            <form class="row forms-sample" id="pvalue-create-form" action="{{ asset(app()->getLocale().'/admin/settings/pvalues') }}" method="post">
                @csrf


                <input type="hidden" name="redirect" value="{{ asset(app()->getLocale().'/admin/settings/params/'.$param->id) }}">
                <input type="hidden" name="param_id" value="{{ $param->id }}">


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pvalue-name-ru">Название (ru)*</label>
                        @if($param->type_value == 'text')
                            <input type="text" class="form-control" id="pvalue-name-ru" name="name_ru" placeholder="Название (ru)" autocomplete="off">
                        @elseif($param->type_value == 'int')
                            <input type="number" min="0" class="form-control" id="pvalue-name-ru" name="name_ru" placeholder="Название (ru)" autocomplete="off">
                        @elseif($param->type_value == 'dec')
                            <input type="number" min="0" step="any" class="form-control" id="pvalue-name-ru" name="name_ru" placeholder="Название (ru)" autocomplete="off">
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pvalue-name-ua">Название (ua)*</label>
                        @if($param->type_value == 'text')
                            <input type="text" class="form-control" id="pvalue-name-ua" name="name_ua" placeholder="Название (ua)" autocomplete="off">
                        @elseif($param->type_value == 'int')
                            <input type="number" min="0" class="form-control" id="pvalue-name-ua" name="name_ua" placeholder="Название (ua)" autocomplete="off">
                        @elseif($param->type_value == 'dec')
                            <input type="number" min="0" step="any" class="form-control" id="pvalue-name-ua" name="name_ua" placeholder="Название (ua)" autocomplete="off">
                        @endif
                    </div>
                </div>


                <div class="col-12">
                    <div class="form-group">
                        <label for="pvalue-desc">Заметка по значению</label>
                        <textarea class="form-control" name="desc" id="pvalue-desc" rows="2"></textarea>
                    </div>
                </div>


                <button type="button" class="btn btn-success mr-2" id="pvalue-create-submit" form="pvalue-create-form">Сохранить</button>
            </form>
        </div>
    </div>
@endsection

@section('script2')
    <script>


        $('.card').on('click', '#pvalue-create-submit', function (e) {
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