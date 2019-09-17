@extends('user.app.app')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-12 col-md-6">
            <h2>Оформление заказа</h2>
            <form method="post" class="backet-form p-r w-1p d-f ai-c fd-c mt-5">
                <div class="form-group row w-1p">
                    <input type="text" class="form-control" name="name" value="" placeholder="Имя">
                </div>
                <div class="form-group row w-1p">
                    <input type="text" class="form-control" name="surname" value="" placeholder="Фамилия">
                </div>
                <div class="form-group row w-1p">
                    <input type="email" class="form-control" name="email" value="" placeholder="E-mail">
                </div>
                <div class="form-group row w-1p">
                    <input type="tel" class="form-control phone-mask-f" name="phone" value="" placeholder="Номер телефона">
                </div>

                <div class="custom-control custom-checkbox ml-3 mt-2 mb-3 w-1p">
                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                    <label class="control-label ml-2" for="customCheck1">Оформить заказ на другого человека</label>
                    <button type="button" class="btn-question" data-toggle="tooltip" data-placement="top" title="При оформлении заказа на другое лицо обязательно заполните Ваши личные данные.">?</button>
                </div>

                <div class="form-hide w-1p d-f ai-c jc-c fd-c">
                    <div class="form-group row w-1p">
                        <input type="text" class="form-control" name="name" value="" placeholder="Имя">
                    </div>
                    <div class="form-group row w-1p">
                        <input type="text" class="form-control" name="surname" value="" placeholder="Фамилия">
                    </div>
                    <div class="form-group row w-1p">
                        <input type="email" class="form-control" name="email" value="" placeholder="E-mail">
                    </div>
                    <div class="form-group row w-1p">
                        <input type="tel" class="form-control phone-mask-f" name="phone" value="" placeholder="Номер телефона">
                    </div>
                </div>

                <h3 class="d-f ai-s jc-s w-1p">Способ доставки</h3>
                <div class="row d-f ai-s jc-s w-1p mt-4 mb-2">
                    <div class="custom-control custom-radio mb-3 ai-e cust-radio p-0 col-12 col-md-4">
                        <input type="radio" class="control-input" id="customControlValidation1" name="radio-stacked" required>
                        <label class="bucket-label custom-control-label" for="customControlValidation1">Новая Почта:<br> Отделение</label>
                        <button type="button" class="btn-question" data-toggle="tooltip" data-placement="top" title="Отправка в отделение">?</button>
                    </div>
                    <div class="custom-control custom-radio mb-3 ai-e cust-radio p-0 col-12 col-md-4">
                        <input type="radio" class="control-input" id="customControlValidation2" name="radio-stacked" required>
                        <label class="bucket-label custom-control-label" for="customControlValidation2">Доставка курьером<br> НП</label>
                        <button type="button" class="btn-question" data-toggle="tooltip" data-placement="top" title="Отправка курьером">?</button>
                    </div>
                </div>

                <div class="form-group row w-1p">
                    <input list="towns" autocomplete="off" id="towns-list" data-url="{{ asset(app()->getLocale().'/guzzle/novaposhta/searchSettlements') }}" class="form-control" name="name" value="" placeholder="Town">
                </div>


                <select class="custom-select form-group w-1p d-b" id="search-town" name="type">

                </select>


                {{--<select class="custom-select form-group w-1p" name="type">--}}
                    {{--<option value="1">Киев</option>--}}
                    {{--<option value="2" selected="">Запорожье</option>--}}
                    {{--<option value="2" selected="">Львов</option>--}}
                {{--</select>--}}

                <select class="d-none custom-select form-group w-1p" id="warehouses-selector" name="type">

                </select>

                <div class="d-f ai-b jc-s w-1p">
                    <div>
                        <h3 class="d-f ai-s jc-s w-1p mr-3">Способ оплаты</h3>
                    </div>
                    <div>
                        <button type="button" class="btn-question" data-toggle="tooltip" data-placement="top" title="Оплата">?</button>
                    </div>
                </div>
                <div class="row d-f ai-s jc-b w-1p mt-4 mb-2">
                    <div class="custom-control custom-radio mb-3 ai-e cust-radio p-0 col-12 col-md-4">
                        <input type="radio" class="control-input" id="customControlValidation3" name="radio-stacked1" required>
                        <label class="bucket-label custom-control-label ai-s jc-c" for="customControlValidation3">
                            <img class="" src="{{ asset('img/credit-cards-payment.png')}}">
                            <div>Карта/Приват 24</div>
                        </label>
                    </div>
                    <div class="custom-control custom-radio mb-3 ai-e cust-radio p-0 col-12 col-md-4">
                        <input type="radio" class="control-input" id="customControlValidation4" name="radio-stacked1" required>
                        <label class="bucket-label custom-control-label ai-s jc-c" for="customControlValidation4">
                            <img class="" src="{{ asset('img/wallet.png')}}">
                            <div>Наличными при получении</div>
                        </label>
                    </div>
                    <div class="custom-control custom-radio mb-3 ai-e cust-radio p-0 col-12 col-md-4">
                        <input type="radio" class="control-input" id="customControlValidation5" name="radio-stacked1" required>
                        <label class="bucket-label custom-control-label ai-s jc-c" for="customControlValidation5">
                            <img class="" src="{{ asset('img/pie-chart.png')}}">
                            <div>Мгновенная рассрочка</div>
                        </label>
                    </div>
                </div>

                <h3 class="d-f ai-s jc-s w-1p mb-3">Комментарий к заказу</h3>
                <div class="custom-control w-1p p-0">
                    <textarea class="form-control" id="validationTextarea" placeholder="Коментарии" required></textarea>
                </div>

                <div class="d-f w-1p jc-s ai-c mt-4 mb-4">
                    <button class="cl-w btn-profile w-a d-f">Оформить заказ</button>
                    <button class="cl-w btn-profile_border w-a d-f ml-5">Вернуться в каталог</button>
                </div>
                <div class="d-f ai-s w-1p">
                    Нажимая на кнопку «Оформить заказ», вы соглашаетесь<br>
                    с Пользовательским соглашением и условиями продажи.
                </div>
            </form>
        </div>
        <div class="col-12 col-md-6">
            <div class="b-line pt-3 pl-3 pr-3">
                <h3>Ваш заказ</h3>
                <div class="row d-f ai-s jc-b">
                    <div class="col-12 col-md-3 card-store_img-main mt-4" id="card-store_img-main">
                        <a href="http://api.project-it.top/ru/products/1">
                            <img class="w-1p h-1p" src="http://api.project-it.top/img/card-store1.png">
                        </a>
                    </div>
                    <div class="col-12 col-md-8 card-store_content-description">
                        <div class="mt-3 mb-2">
                            <h4>Золотые серьги «Сердце» (131231)</h4>
                        </div>
                        <div class="mb-2">
                            Артикул: 131231
                        </div>
                        <div class="mb-2">
                            Размер: 15
                        </div>
                        <div class="d-f ai-c">
                            <div class="card-static_price t-lh">6 544 <span class="">грн</span></div>
                            <div class="card-static mt-2 mb-2">
                                <div class="card-static_sale p-r card-scale ml-3">
                                    <div class="card-cost">-30%</div>
                                    <div class="card-static_sale-left"></div>
                                    <div class="card-static_sale-right"></div>
                                </div>
                            </div>
                        </div>
                        <div class="d-f ai-c jc-b">
                            <div class="card-static_sale-price">
                                3 365 <span class="">грн</span>
                            </div>
                        </div>
                    </div>
                    <button class="col-12 col-md-1 bucket-bag mt-4">
                        <img class="img-s" src="{{ asset('img/garbage.png')}}">
                    </button>
                </div>
                <div class="estimate-bucket row mt-2">
                    <div class="col-12">
                        <div class="row mt-2">
                            <div class="col-3">
                                Сумма скидки:
                            </div>
                            <div class="col-8">
                                2 000 грн
                            </div>
                        </div>
                        <div class="row mt-2 ai-c">
                            <div class="col-3">
                                Брендовая упаковка:
                            </div>
                            <div class="col-8">
                                в подарок
                            </div>
                        </div>
                        <div class="row mt-2 ai-c">
                            <div class="col-3 w-1p">
                                Добавить промокод
                            </div>
                            <div class="col-8 w-1p d-f ai-c jc-c">
                                <div class="form-group row w-1p">
                                    <input type="text" class="form-control" value="" placeholder="Промокод">
                                </div>
                            </div>
                        </div>
                        <div class="row ai-c">
                            <div class="col-3 w-1p">
                                Добавить дисконт
                            </div>
                            <div class="col-8 w-1p d-f ai-c jc-c">
                                <div class="form-group row w-1p">
                                    <input type="text" class="form-control" value="" placeholder="Дисконт">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2 mb-2">
                            <div class="col-3">
                                Итог к оплате:
                            </div>
                            <div class="total-amount col-8">
                                6 000 грн
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bucket-block row mt-3 w-1p m-0">
                <div class="col-12 col-md-4 pl-0">
                    <div class="delivery-store_packaging h-1p d-f fd-c ai-c jc-c p-2 t-c">
                        Упаковка в подарок
                        <img class="w-1p pt-2 pb-2" src="http://api.project-it.top/img/u703.png">
                        <a href="">Посмотреть</a>
                    </div>
                </div>
                <div class="delivery-store_ways b-line col-12 col-md-8 h-1p pt-2 pb-2">
                    <div class="delivery-store_ways-txt d-f ai-e">
                        <img class="h-1p mr-2" src="{{ asset('img/truck.png')}}">
                        Доставка
                    </div>
                    <div class="delivery-store_ways-list pl-5">
                        - Новая Почта (отделение): <span class="cl-r">Бесплатно</span>.<br>
                        <span class="span-note">(Вы оплачиваете только стоимость товара.)</span><br>
                        - Курьером (по Украине) более 1 000 грн: <span class="cl-r">Бесплатно</span><br>
                        - Сроки доставки 1-2 дня
                    </div>
                    <div class="delivery-store_ways-txt d-f ai-e">
                        <img class="h-1p mr-2" src="{{ asset('img/credit-cards-payment.png')}}">
                        Оплата
                    </div>
                    <div class="delivery-store_ways-list pl-5">
                        - Наличными при получении<br>
                        - Оплата платежной картой VISA/Mastercard
                    </div>
                    <div class="delivery-store_ways-txt d-f ai-e">
                        <img class="h-1p mr-2" src="{{ asset('img/icon_02_2.png')}}">
                        Обмен и гарантия
                    </div>
                    <div class="pl-5">
                        <a href="">Условия оплаты и достаки</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        @include('user.home.subscribe')
    </div>
@endsection


@section('script2')

    <script>

        $('body').on('keyup', '#towns-list', function (e) {
            let url = $(this).data('url');
            let value = $(this).val();
            let token = $('meta[name="csrf-token"]').attr('content');
            let formData = new FormData();

            formData.append('_token', token);
            formData.append('text', value);

            sendAction(url, formData, (data) => {
                console.log(data);
                $('#towns').html(data.render);
            });

        });

        $(document).ready(function(){

            $("#search-town").select2({
                placeholder: 'This is my placeholder',
                language: {
                    searching: function() {
                        return "Идет поиск...";
                    },
                    noResults: function(){
                        return "Не найдено...";
                    }
                },
                ajax: {
                    url: baseUrl+"/"+baseLocale+"/guzzle/novaposhta/searchSettlements",
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            search: params.term,
                            _token: $('meta[name="csrf-token"]').attr('content')
                        };
                    },
                    processResults: function (response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            });

            $("#search-town").on('change', function (e) {
                $('#warehouses-selector').removeClass('d-block').addClass('d-none');

                let url = baseUrl+'/'+baseLocale+'/guzzle/novaposhta/searchWarehouses'
                let token = $('meta[name="csrf-token"]').attr('content');
                let value = $(this).val();
                let formData = new FormData();

                formData.append('_token', token);
                formData.append('ref', value);

                sendAction(url, formData, (data) => {
                    console.log(data);
                    $('#warehouses-selector').removeClass('d-none').addClass('d-block');
                    $('#warehouses-selector').html(data.render);
                });
            });

        });
    </script>
@endsection
