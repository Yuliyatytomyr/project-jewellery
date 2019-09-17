@extends('administration.app.app')

@section('content')
    <div class="col-12 card">
        <div class="card-body">
            <h3 class="w-100 text-center mb-5">{{ $title }}</h3>
            <hr>

            <form class="row forms-sample" id="blog-post-edit-form" action="{{ asset(app()->getLocale().'/admin/blog/posts/'.$btpost->id) }}" enctype="multipart/form-data" method="post">
                @csrf
                {{ method_field('PUT') }}
                <input type="hidden" id="edited-btpost-id" name="btpost_id" value="{{ $btpost->id }}">
                <h4 class="w-100 text-center">Общие данные новости</h4>
                <div class="col-12">
                    <div class="form-group">
                        <label for="btheme-id">Тематика новостей</label>
                        <select name="btheme_id" class="form-control" id="btheme-id">
                            @forelse($themes as $theme)
                                <option value="{{ $theme->id }}" @if($theme->id == $btpost->btheme_id) selected @endif>{{ $theme->getNameTran() }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <div class="form-check form-check-flat">
                            <label class="form-check-label">
                                <input type="checkbox" name="show_on" class="form-check-input" @if($btpost->show_on == 1) checked @endif> Опубликовать <i class="input-helper"></i>
                            </label>
                        </div>
                    </div>
                </div>

                <h4 class="w-100 text-center">Карточка новости</h4>
                <div class="col-12">
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
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="btpost-title-ru">Заголовок новости (ru)*</label>
                                <input type="text" class="form-control" id="btpost-title-ru" name="title_ru" value="{{ $btpost->title_ru }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="btpost-s-desc-ru">Краткое описание новости (ru)*</label>
                                <textarea class="form-control" rows="5" id="btpost-s-desc-ru" name="s_desc_ru">{{ $btpost->s_desc_ru }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="btpost-title-ua">Заголовок новости (ua)*</label>
                                <input type="text" class="form-control" id="btpost-title-ua" name="title_ua" value="{{ $btpost->title_ua }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="btpost-s-desc-ua">Краткое описание новости (ua)*</label>
                                <textarea class="form-control" rows="5" id="btpost-s-desc-ua" name="s_desc_ua">{{ $btpost->s_desc_ua }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <h4 class="w-100 text-center">Контент новости</h4>
                <div class="col-12">
                    <div class="form-group">
                        <label for="btpost-content-ru">Содержание новости (ru)*</label>
                        <textarea class="form-control" id="btpost-content-ru" name="content_ru">{{ $btpost->content_ru }}</textarea>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="btpost-content-ua">Содержание новости (ua)*</label>
                        <textarea class="form-control" id="btpost-content-ua" name="content_ua">{{ $btpost->content_ua }}</textarea>
                    </div>
                </div>

                <div class="col-md-6 offset-md-3 mt-4">
                    <button type="button" class="btn btn-success w-100" id="blog-post-edit-submit" form="blog-post-edit-form">Редактировать новость</button>
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

        $(document).ready(function() {
            $('#btpost-content-ru').summernote({
                lang: 'ru-RU',
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript']],
                    ['fontstyle', ['fontsize', 'height','fontname','color']],
                    ['pragraf', ['ul', 'ol', 'paragraph']],
                    ['insert', ['table', 'link', 'picture', 'video', 'hr']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
                callbacks: {
                    onImageUpload: function(files) {
                        let url = baseUrl+'/summernote/uploadFiles';
                        let token = $('meta[name="csrf-token"]').attr('content');
                        let formData = new FormData();
                        formData.append("_token",token);
                        formData.append("image", files[0]);
                        sendAction(url, formData, (data) => {
                            toastr.success(data.msg);
                            var image = $('<img>').attr('src', data.image);
                            $('#btpost-content-ru').summernote("insertNode", image[0]);
                            updateContent();
                        });
                    },

                    onMediaDelete : function(target) {
                        let url = baseUrl+'/summernote/deleteFiles';
                        let token = $('meta[name="csrf-token"]').attr('content');
                        let formData = new FormData();
                        formData.append("_token",token);
                        formData.append("public_path", target[0].src);
                        sendAction(url, formData, (data) => {
                            if(data.status == 'success'){
                                toastr.success(data.msg);
                                updateContent();
                            }
                        });
                    }
                }
            });

            $('#btpost-content-ua').summernote({
                lang: 'ru-RU',
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript']],
                    ['fontstyle', ['fontsize', 'height','fontname','color']],
                    ['pragraf', ['ul', 'ol', 'paragraph']],
                    ['insert', ['table', 'link', 'picture', 'video', 'hr']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
                callbacks: {
                    onImageUpload: function(files) {
                        let url = baseUrl+'/summernote/uploadFiles';
                        let token = $('meta[name="csrf-token"]').attr('content');
                        let formData = new FormData();
                        formData.append("_token",token);
                        formData.append("image", files[0]);
                        sendAction(url, formData, (data) => {
                            toastr.success(data.msg);
                            var image = $('<img>').attr('src', data.image);
                            $('#btpost-content-ua').summernote("insertNode", image[0]);
                            updateContent();
                        });
                    },

                    onMediaDelete : function(target) {
                        let url = baseUrl+'/summernote/deleteFiles';
                        let token = $('meta[name="csrf-token"]').attr('content');
                        let formData = new FormData();
                        formData.append("_token",token);
                        formData.append("public_path", target[0].src);
                        sendAction(url, formData, (data) => {
                            if(data.status == 'success'){
                                toastr.success(data.msg);
                                updateContent();
                            }
                        });
                    }
                }
            });

            function updateContent(){
                let token = $('meta[name="csrf-token"]').attr('content');
                let url = baseUrl+'/summernote/updateContentEdit';
                let id = $('#edited-btpost-id').val();
                let contentRU = $('#btpost-content-ru').val();
                let contentUA = $('#btpost-content-ua').val();
                let formData = new FormData();
                formData.append("_token",token);
                formData.append("btpost_id", id);
                formData.append("content_ru",contentRU);
                formData.append("content_ua",contentUA);
                sendAction(url, formData, (data) => {
                    if(data.status == 'success'){
                        console.log(data.msg);
                    }
                });
            }


            $('.card').on('click', '#blog-post-edit-submit', function (e) {
                let form = $('#'+$(this).attr('form'));

                let url = form.attr('action');
                let data = form.serializeArray();
                let imagefileTumb = document.querySelector('#image-thumb');
                let formData = new FormData();

                $.each(data, function (i, v) {
                    formData.append(v.name, v.value);
                });

                if($('#image-thumb').val() != ''){
                    formData.append("image_thumb", imagefileTumb.files[0]);
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



        });
    </script>
@endsection