@extends('administration.app.app')

@section('content')
    <div class="col-12 card">
        <div class="card-body">
            <h4 class="w-100 text-center mb-5">{{ $title }}</h4>

            <form class="row forms-sample" id="blog-theme-create-form" action="{{ asset(app()->getLocale().'/admin/blog/themes') }}" enctype="multipart/form-data" method="post">
                @csrf
                <input type="hidden" name="redirect" value="{{ asset(app()->getLocale().'/admin/blog') }}">
                <div class="col-md-6 col-12">

                    <div class="form-group">
                        <label for="theme-name-ru">Тема новостей (ru)*</label>
                        <input type="text" class="form-control" id="theme-name-ru" name="name_ru">
                    </div>

                </div>
                <div class="col-md-6 col-12">

                    <div class="form-group">
                        <label for="theme-name-ua">Тема новостей (ua)*</label>
                        <input type="text" class="form-control" id="theme-name-ua" name="name_ua">
                    </div>

                </div>

                <div class="col-12">
                    <div class="form-group">
                        <div class="form-check form-check-flat">
                            <label class="form-check-label">
                                <input type="checkbox" name="show_on" class="form-check-input"> Опубликовать <i class="input-helper"></i>
                            </label>
                        </div>
                    </div>
                </div>


                <div class="col-md-6 offset-md-3 mt-4">
                    <button type="button" class="btn btn-success w-100" id="blog-theme-create-submit" form="blog-theme-create-form">Создать тему новостей</button>
                </div>

            </form>
        </div>
    </div>
@endsection

@section('script2')
    <script>

        $('.card').on('click', '#blog-theme-create-submit', function (e) {
            let form = $('#'+$(this).attr('form'));
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