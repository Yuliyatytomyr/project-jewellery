@extends('administration.app.app')

@section('content')
    <div class="col-12 card">
        <div class="card-body">
            <h3 class="card-title">Создать категорию</h3>

            <form class="row forms-sample" id="profile-update-form" action="{{ asset(app()->getLocale().'/admin/settings/categories') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="category-name-ru">Название (ru)*</label>
                        <input type="text" class="form-control" id="category-name-ru" name="name_ru" placeholder="Название (ru)">
                    </div>
                    <div class="form-group">
                        <label for="category-name-ua">Название (ua)*</label>
                        <input type="text" class="form-control" id="category-name-ua" name="name_ua" placeholder="Название (ua)">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Изображение (малое)*</label>
                        <input type="file" name="image_thumb" id="image-thumb" class="file-upload-default" data-info="#image-thumb-info" accept="image/x-png,image/gif,image/jpeg">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" id="image-thumb-info" disabled placeholder="Изображение не выбрано...">
                            <span class="input-group-append">
                            <button class="file-upload-browse btn btn-info" type="button" data-input="#image-thumb">Найти</button>
                          </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Изображение (большое)</label>
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
                        <label for="category-desc-ru">Описание категории (ru)</label>
                        <textarea class="form-control" name="desc_ru" id="category-desc-ru" rows="2"></textarea>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="category-desc-ua">Описание категории (ua)</label>
                        <textarea class="form-control" name="desc_ua" id="category-desc-ua" rows="2"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mr-2" id="profile-submit-b" form="profile-update-form">Сохранить</button>
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
    </script>
@endsection