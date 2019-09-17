@extends('administration.app.app')

@section('content')
    <div class="col-12 card">
        <div class="card-body">
            <h4 class="w-100 text-center mb-5">{{ $title }}</h4>

            <form class="row forms-sample" id="mozaik-create-form" action="{{ asset(app()->getLocale().'/admin/settings/content/home/mozaiks') }}" enctype="multipart/form-data" method="post">
                @csrf
                <input type="hidden" name="redirect" value="{{ asset(app()->getLocale().'/admin/settings/content/home') }}">
                <div class="col-12">

                    <div class="form-group">
                        <label for="mozaik-alt">Название*</label>
                        <input type="text" class="form-control" id="mozaik-alt" name="alt" placeholder="Название мозайки">
                    </div>

                </div>
                <div class="col-md-6 col-12">

                    <div class="form-group">
                        <label for="mozaik-name-ru">Текст в правом нижнем углу (ru)*</label>
                        <input type="text" class="form-control" id="mozaik-name-ru" name="name_ru">
                    </div>

                </div>
                <div class="col-md-6 col-12">

                    <div class="form-group">
                        <label for="mozaik-name-ua">Текст в правом нижнем углу (ua)*</label>
                        <input type="text" class="form-control" id="mozaik-name-ua" name="name_ua">
                    </div>

                </div>
                <div class="col-12">

                    <div class="form-group">
                        <label for="mozaik-link">Ссылка для перехода*</label>
                        <input type="text" class="form-control" id="mozaik-link" name="link" placeholder="Скопируйте ссылку для прехода и добавьте сюда">
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Изображение (мобильная версия)*</label>
                        <input type="file" name="image_thumb" id="image-thumb" class="file-upload-default" data-info="#image-thumb-info" accept="image/x-png,image/gif,image/jpeg">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" id="image-thumb-info" disabled placeholder="Изображение не выбрано...">
                            <span class="input-group-append">
                            <button class="file-upload-browse btn btn-info" type="button" data-input="#image-thumb">Найти</button>
                          </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Изображение (больших мониторов)*</label>
                        <input type="file" name="image_full" id="image-full" class="file-upload-default" data-info="#image-full-info" accept="image/x-png,image/gif,image/jpeg">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" id="image-full-info" disabled placeholder="Изображение не выбрано...">
                            <span class="input-group-append">
                            <button class="file-upload-browse btn btn-info" type="button" data-input="#image-full">Найти</button>
                          </span>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <div class="form-check form-check-flat">
                            <label class="form-check-label">
                                <input type="checkbox" name="show_on" class="form-check-input"> Двойная мозайка <i class="input-helper"></i>
                            </label>
                        </div>
                    </div>
                </div>


                <div class="col-md-6 offset-md-3 mt-4">
                    <button type="button" class="btn btn-success w-100" id="mozaik-create-submit" form="mozaik-create-form">Создать слайд</button>
                </div>

            </form>
        </div>
    </div>
@endsection

@section('script2')
    <script>
        // select profile foto
        $('.card').on('click','.file-upload-browse', function () {
            $($(this).data('input')).click();
        });
        $('.card').on('change', '.file-upload-default', function(){
            $($(this).data('info')).val($(this).val());
        });

        $('.card').on('click', '#mozaik-create-submit', function (e) {
            let form = $('#'+$(this).attr('form'));
            let url = form.attr('action');

            let data = form.serializeArray();
            let imagefileTumb = document.querySelector('#image-thumb');
            let imagefileFull = document.querySelector('#image-full');
            let formData = new FormData();

            $.each(data, function (i, v) {
                formData.append(v.name, v.value);
            });

            if($('#image-thumb').val() != ''){
                formData.append("image_thumb", imagefileTumb.files[0]);
            }
            if($('#image-full').val() != ''){
                formData.append("image_full", imagefileFull.files[0]);
            }



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