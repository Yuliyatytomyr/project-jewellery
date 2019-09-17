@extends('user.app.app')

@section('content')
    <div class="row mt-2 mt-md-5 mb-5">
        <div class="col-12 col-lg-6 order-checkout">
            <h3 class="mt-3 mt-lg-0">Оформление заказа</h3>
            <form method="post" class="backet-form p-r w-1p d-f ai-c fd-c mt-2 mt-lg-5">
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

                <select class="custom-select form-group w-1p" name="type">
                    <option value="1">Киев</option>
                    <option value="2" selected="">Запорожье</option>
                    <option value="2" selected="">Львов</option>
                </select>

                <select class="custom-select form-group w-1p" name="type">
                    <option value="">Выбрать отделение</option>
                    <option value="1" selected="">57</option>
                    <option value="2" selected="">76</option>
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
                            <div>Оплата картой Visa/Mastercard</div>
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
                            <div>Оплата частями</div>
                        </label>
                    </div>
                </div>

                <h3 class="d-f ai-s jc-s w-1p mb-3">Комментарий к заказу</h3>
                <div class="custom-control w-1p p-0">
                    <textarea class="form-control" id="validationTextarea" placeholder="Коментарии" required></textarea>
                </div>

                <div class="d-f w-1p jc-s ai-c mt-4 mb-4 checkoutSubmit">
                    <button class="cl-w btn-profile w-a d-f">Оформить заказ</button>
                    <button class="cl-w btn-profile_border w-a d-f jc-c ml-0 ml-md-5 mt-3 mt-md-0">Вернуться в каталог</button>
                </div>
                <div class="w-1p custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheckAgree">
                    <label class="agreement control-label ml-2" for="customCheckAgree">Я соглашаюсь з <a href="">Пользовательским соглашением и условиями продажи</a></label>
                </div>
            </form>
        </div>
        <div class="col-12 col-lg-6 your-order">
            <div class="b-line pt-3 pl-3 pr-3">
                <h3>Ваш заказ</h3>
                <div class="row d-f ai-s p-r">
                    <div class="col-5 col-md-4 card-store_img-main mt-4" id="card-store_img-main">
                        <a href="http://api.project-it.top/ru/products/1">
                            <img class="productOrder_img w-1p h-1p" src="http://api.project-it.top/img/card-store1.png">
                        </a>
                    </div>
                    <div class="col-6 col-md-7 card-store_content-description p-0 p-md-2">
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
                    <div class="col-1 d-f jc-c ai-c p-0">
                        <a class="bucket-bag mt-4">
                            <img class="img-s" src="{{ asset('img/garbage.png')}}">
                        </a>
                    </div>
                </div>
                <div class="estimate-bucket row mt-2">
                    <div class="col-12">
                        <div class="row mt-2">
                            <div class="col-5 col-md-4">
                                Сумма скидки:
                            </div>
                            <div class="col-7 col-md-7 pl-0 pl-md-2">
                                2 000 грн
                            </div>
                        </div>
                        <div class="row mt-2 ai-c">
                            <div class="col-5 col-md-4">
                                Брендовая упаковка:
                            </div>
                            <div class="col-7 col-md-7 pl-0 pl-md-2">
                                в подарок
                            </div>
                        </div>
                        <div class="row mt-2 ai-c">
                            <div class="col-5 col-md-4 w-1p">
                                Добавить промокод
                            </div>
                            <div class="col-7 col-md-7 w-1p d-f ai-c jc-c pl-0 pl-md-2">
                                <div class="form-group row w-1p">
                                    <input type="text" class="form-control" value="" placeholder="Промокод">
                                </div>
                            </div>
                        </div>
                        <div class="row ai-c">
                            <div class="col-5 col-md-4 w-1p">
                                Добавить дисконт
                            </div>
                            <div class="col-7 col-md-7 w-1p d-f ai-c jc-c pl-0 pl-md-2">
                                <div class="form-group row w-1p">
                                    <input type="text" class="form-control" value="" placeholder="Дисконт">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2 mb-2">
                            <div class="col-5 col-md-4">
                                Итог к оплате:
                            </div>
                            <div class="total-amount col-7 col-md-7 pl-0 pl-md-2">
                                6 000 грн
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="borderAll-block row mt-3 w-1p m-0">
                @include('user.product.show.layouts.borderBlocks')
            </div>
        </div>
    </div>
    <div>
        @include('user.home.subscribe')
    </div>
@endsection
