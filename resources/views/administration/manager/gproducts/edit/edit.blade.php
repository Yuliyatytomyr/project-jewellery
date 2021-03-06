@extends('administration.app.app')

@section('content')
    <div class="col-12 card">
        <div class="card-body">
            <h3 class="card-title">{{ $title }}</h3>

            <form class="row forms-sample" id="gproduct-edit-form" action="{{ asset(app()->getLocale().'/manager/gproducts/'.$gproduct->id) }}" enctype="multipart/form-data" method="post">
                @csrf
                {{ method_field('PUT') }}
                <input type="hidden" name="redirect" value="{{ asset(app()->getLocale().'/manager/gproducts/') }}">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gp-subcat-id">Подкатегория товара</label>
                                <select name="subcategory_id" class="form-control" id="gp-subcat-id" data-url="{{ asset(app()->getLocale().'/manager/subcategory/get_related_params') }}">
                                    @forelse($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}" @if($subcategory->id == $gproduct->subcategory_id) selected @endif>({{ $subcategory->category->getNameTran() }}) {{ $subcategory->getNameTran() }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gp-item-code">Артикул товара</label>
                                <input type="text" class="form-control" id="gp-item-code" name="item_code" placeholder="Артикул товара" value="{{ $gproduct->item_code }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gproduct-barcode">Barcode</label>
                                <textarea class="form-control" name="barcode" id="gproduct-barcode" rows="1" required>{{ $gproduct->barcode}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gproduct-weight">Вес товара</label>
                                <input type="number" class="form-control" id="gproduct-weight" name="weight" placeholder="Вес товара" value="{{ $gproduct->weight }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gp-g_price">Старая цена</label>
                                <input type="number" class="form-control" id="gp-g_price" name="g_price" placeholder="Старая цена" value="{{ $gproduct->g_price }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gp-total_sum">Новая цена</label>
                                <input type="number" class="form-control" id="gp-total_sum" name="total_sum" placeholder="Новая цена" value ="{{ $gproduct->total_sum }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gp-sale">Скидка</label>
                                <input type="number" class="form-control" id="gp-sale" name="sale" placeholder="Скидка %" value ="{{ $gproduct->sale }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gp-status">Статус</label>
                                <select name="status" class="form-control" id="gp-status">
                                    <option value="new">New</option>
                                    <option value="reserve">Reserve</option>
                                    <option value="sold">Sold</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gp-size">Размер</label>
                                <select name="size" class="form-control" id="gp-size">
                                    <option value="null">Выберите размер</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category-name-ru">Название (ru)*</label>
                                <input type="text" class="form-control" id="category-name-ru" name="name_ru" placeholder="Название (ru)" value="{{ $gproduct->name_ru }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category-name-ua">Название (ua)*</label>
                                <input type="text" class="form-control" id="category-name-ua" name="name_ua" placeholder="Название (ua)" value="{{ $gproduct->name_ua }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="product-gallery">Галерея</label>
                        <input id="product-gallery" type="hidden" name="gallery" value="{{ $input_images_path }}">
                        <div class="dropzone" id="dropzoneFileUpload"></div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="gproduct-desc-ru">Описание товара (ru)</label>
                        <textarea class="form-control" name="desc_ru" id="gproduct-desc-ru" rows="2">{{ $gproduct->desc_ru }}</textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="gproduct-desc-ua">Описание товара (ua)</label>
                        <textarea class="form-control" name="desc_ua" id="gproduct-desc-ua" rows="2">{{ $gproduct->desc_ua }}</textarea>
                    </div>
                </div>
            </form>
            <hr>
            <div class="row" id="select-params-place">
                @include('administration.manager.gproducts.edit.layouts.select_params')
            </div>
            <hr>
            <h3 class="w-100 text-center">Характеристики товара</h3>
            <div class="row" id="gproduct-params-place">
                @if($render_params_selectors != '')
                    {!! $render_params_selectors !!}
                @else
                    <div class="col-12">
                        <p class="text-center w-100">характеристики отсутствуют</p>
                    </div>
                @endif
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <button type="button" class="btn btn-success w-100" id="gproduct-edit-submit" form="gproduct-edit-form">Создать товар</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script2')
    <script src="{{ asset('/admin/js/includes/gproducts.js') }}"></script>
    <script>

        addImagesToGpEditForm({!! $dropzone_images !!});

        $('.card').on('change', '#gp-subcat-id', function(){
            let url = $(this).data('url');
            let subcatId = $(this).val();
            let formData = new FormData();
            formData.append('id', subcatId);

            sendAction(url, formData, (data) => {
                toastr.success(data.msg);
                $('#gproduct-params-place').html('<div class="col-12"><p class="text-center w-100">характеристики отсутствуют</p></div>');
                $('#select-params-place').html(data.render);
            })
        });

        $('.card').on('click', '#add-param-gp-create-submit', function(){
            let paramId = $('#params-gps').val();
            if(paramId == 'null'){
                toastr.warning('Не выбрана характеристика товара!')
            }else {
                let flag = true;
                let paramElems = $('#gproduct-params-place').find('.gp-params');
                paramElems.each(function (i, e) {
                    let paramElemId = $(e).data('param');
                    if(paramElemId == paramId){ flag = false; }
                });

                if(flag){
                    let form = $('#'+$(this).attr('form'));
                    let url = form.attr('action');

                    let formData = new FormData();
                    formData.append('param_id', paramId);

                    sendAction(url, formData, (data) => {
                        toastr.success(data.msg);
                        $('#gproduct-params-place').append(data.render);
                    })
                }else{
                    toastr.warning('Такая характеристика товара уже есть!');
                }
            }
        });

        $('.card').on('click', '#gproduct-edit-submit', function(){
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
