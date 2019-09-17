@extends('administration.app.app')

@section('content')



    <div class="row mb-5">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="w-100 text-center mb-4">Слайдер ниже основного меню</h4>

                    <table class="table table-hover table-bordered">

                        <thead class="text-center">
                            <tr>
                                <th>№ слайда</th>
                                <th>Название</th>
                                <th>Публикация</th>
                                <th>Изображения</th>
                                <th>Действия</th>
                            </tr>
                        </thead>

                        <tbody>
                        @forelse($sliders as $slider)
                            <tr class="text-center">
                                <td>
                                    {{ $slider->id }}
                                </td>

                                <td>
                                    {{ $slider->alt }}
                                </td>

                                <td id="f-s-toggle-{{ $slider->id }}">
                                    @include('administration.admin.settings.content.home.index.layouts.p_f_s_toggle')
                                </td>

                                <td>
                                    <img src="{{ asset($slider->image_thumb) }}" alt="{{ $slider->alt }}">
                                    <img src="{{ asset($slider->image_full) }}" alt="{{ $slider->alt }}">
                                </td>

                                <td  id="f-s-actions-{{ $slider->id }}">
                                    @include('administration.admin.settings.content.home.index.layouts.p_f_s_actions')
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Слайды не найдены</td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>
                <a href="{{  asset(app()->getLocale().'/admin/settings/content/home/f-sliders/create') }}" class="btn btn-primary">+ Добавить слайд</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12 grid-margin stretch-card">

            <div class="card">
                <div class="card-body">
                    <h4 class="w-100 text-center mb-4">Мозайка ссылок на главной странице</h4>

                    <table class="table table-hover table-bordered">

                        <thead class="text-center">
                        <tr>
                            <th>Название</th>
                            <th>Текст (ru)</th>
                            <th>Текст (ua)</th>
                            <th>Изображения</th>
                            <th>Ссылка</th>
                            <th>Действия</th>
                        </tr>
                        </thead>

                        <tbody>
                        @forelse($mozaiks as $mozaik)
                            <tr class="text-center">
                                <td>
                                    {{ $mozaik->alt }}
                                </td>
                                <td>
                                    {{ $mozaik->name_ru }}
                                </td>
                                <td>
                                    {{ $mozaik->name_ua }}
                                </td>
                                <td>
                                    <img src="{{ asset($mozaik->image_thumb) }}" alt="{{ $mozaik->alt }}">
                                    @if($mozaik->show_on)
                                        <img src="{{ asset($mozaik->image_full) }}" alt="{{ $mozaik->alt }}">
                                    @endif
                                </td>
                                <td>
                                    <a class="text-info" href="{{ $mozaik->link }}" title="{{ $mozaik->link }}" target="_blank"><i class="fa fa-eye fa-2x"></i></a>
                                </td>
                                <td>
                                    <a class="text-warning" href="{{ asset(app()->getLocale().'/admin/settings/content/home/mozaiks/'.$mozaik->id.'/edit') }}" title="Редактировать мозайку"><i class="fa fa-edit fa-2x"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Элементы мозайки не найдены</td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
@endsection

@section('script2')
    <script>
        $('.card').on('click', '.f-slider-toggle', function (e) {
            e.preventDefault();

            let url = $(this).data('url');
            let formData = new FormData();

            sendActionGet(url, formData, (data) => {
                if(data.status == 'success') {
                    toastr.info(data.msg);
                    let sliderId = data.sliderId;
                    $('#f-s-toggle-'+sliderId).html(data.renders.toggle);
                    $('#f-s-actions-'+sliderId).html(data.renders.actions);
                }
            });
        });
        
    </script>
@endsection