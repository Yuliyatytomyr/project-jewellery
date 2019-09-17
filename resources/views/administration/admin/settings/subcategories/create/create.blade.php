@extends('administration.app.app')

@section('content')
    <div class="col-12 card">
        <div class="card-body">
            <h3 class="card-title">{{ $title }}</h3>

            <form class="row forms-sample" id="subcategory-create-form" action="{{ asset(app()->getLocale().'/admin/settings/subcategories') }}" enctype="multipart/form-data" method="post">
                @csrf

                @if(!request('category_alias', false))
                    <input type="hidden" name="redirect" value="{{ asset(app()->getLocale().'/admin/settings/subcategories/') }}">
                @else
                    <input type="hidden" name="redirect" value="{{ asset(app()->getLocale().'/admin/settings/categories/'.request('category_alias')) }}">
                @endif

                <div class="col-12">
                    <div class="form-group">
                        <label for="category-id">Категория </label>
                        <select class="form-control form-control-lg" name="category_id" id="category-id">
                            @foreach($categories as $category)
                                @if(!request('category_alias', false))
                                    <option value="{{ $category->id }}">
                                        @if(app()->getLocale() == 'ru')
                                            {{ $category->name_ru }}
                                        @elseif(app()->getLocale() == 'ua')
                                            {{ $category->name_ua }}
                                        @endif
                                    </option>
                                @else
                                    <option value="{{ $category->id }}" @if(request('category_alias') == $category->alias) selected @endif >
                                        @if(app()->getLocale() == 'ru')
                                            {{ $category->name_ru }}
                                        @elseif(app()->getLocale() == 'ua')
                                            {{ $category->name_ua }}
                                        @endif
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="subcategory-name-ru">Название (ru)*</label>
                        <input type="text" class="form-control" id="subcategory-name-ru" name="name_ru" placeholder="Название (ru)">
                    </div>
                    <div class="form-group">
                        <label for="subcategory-name-ua">Название (ua)*</label>
                        <input type="text" class="form-control" id="subcategory-name-ua" name="name_ua" placeholder="Название (ua)">
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
                        <label for="subcategory-desc-ru">Описание подкатегории (ru)</label>
                        <textarea class="form-control" name="desc_ru" id="subcategory-desc-ru" rows="2"></textarea>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="subcategory-desc-ua">Описание подкатегории (ua)</label>
                        <textarea class="form-control" name="desc_ua" id="subcategory-desc-ua" rows="2"></textarea>
                    </div>
                </div>
                <button type="button" class="btn btn-success mr-2" id="subcategory-create-submit" form="subcategory-create-form">Сохранить</button>
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

        $('.card').on('click', '#subcategory-create-submit', function (e) {
            let form = $("#"+$(this).attr('form'));
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