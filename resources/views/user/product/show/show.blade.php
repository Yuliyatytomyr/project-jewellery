@extends('user.app.app')

@section('content')
    <div class="row card-store mt-2 mt-lg-5 mb-4 mb-md-5">
        <div class="card-store_content-class col-12 d-b dlg-n">
            <div class="btn-class btn-class_new d-f ai-c jc-c">
                Новинка
            </div>
            <div class="btn-class btn-class_super d-f ai-c jc-c ml-2">
                Суперцена
            </div>
        </div>
        <div class="card-store_img col-12 col-md-6 d-f">
            <div class="card-store_img-prev d-f fd-c mt-4 mt-md-0">
                @foreach($gproduct->gpimages as $img_thumb => $gpimage)
                    <div class="mb-2">
                        <img @if($img_thumb != 1) style="border: 1px solid black;" @endif class="w-1p h-1p thumb" src="{{ asset($gpimage->image_path)}}">
                    </div>
                @endforeach
            </div>
            <div class="d-f jc-c card-store_img-main" id="card-store_img-main">
                @foreach($gproduct->gpimages as $img_key => $gpimage)
                    <a href="{{ asset($gpimage->image_path)}}" data-fancybox="images">
                        <img @if($img_key != 0) style="display: none;" @endif class="w-1p h-1p full_img" src="{{ asset($gpimage->image_path)}}">
                    </a>
                @endforeach
            </div>
        </div>
        <div class="card-store_content col-12 col-lg-6">
            <div class="card-store_content-class d-n dlg-b">
                <div class="btn-class btn-class_new d-f ai-c jc-c">
                    Новинка
                </div>
                <div class="btn-class btn-class_super d-f ai-c jc-c ml-2">
                    Суперцена
                </div>
            </div>
            <div class="card-store_content-description">
                <div class="mt-4 mb-3 ">
                    <h3 class="fw-r">{{ $gproduct->getNameTran() }}({{ $gproduct->item_code }})</h3>
                </div>
                <div class="mb-2">
                    Артикул: {{ $gproduct->item_code }}
                </div>
                <div class="d-f">
                    <div class="card-static_price t-lh">6 544 <span class="">грн</span></div>
                    <div class="card-static m-2 ml-4">
                        <div class="card-static_sale p-r">
                            <div class="card-cost">-30%</div>
                        </div>
                    </div>
                </div>
                <div class="d-f ai-c jc-b">
                    <div class="card-static_sale-price">
                        3 365 <span class="">грн</span>
                    </div>
                    <section class="rating d-f ai-c fd-c">
                        <input type="hidden" id="star_rating" value="5"/>
                        <div class="d-f ai-c jc-c">
                            <div class="stars d-f jc-c">
                                <div class="star active" data-rating="1">
                                    <label>
                                        <svg class="rating-svg" viewBox="0 0 25 25">
                                            <polygon points="9.9, 1.1, 3.3, 21.78, 19.8, 8.58, 0, 8.58, 16.5, 21.78" fill="#6c757d73"/>
                                        </svg>
                                    </label>
                                </div>
                                <div class="star active" data-rating="2">
                                    <label>
                                        <svg class="rating-svg" viewBox="0 0 25 25">
                                            <polygon points="9.9, 1.1, 3.3, 21.78, 19.8, 8.58, 0, 8.58, 16.5, 21.78" fill="#6c757d73"/>
                                        </svg>
                                    </label>
                                </div>
                                <div class="star active" data-rating="3">
                                    <label>
                                        <svg class="rating-svg" viewBox="0 0 25 25">
                                            <polygon points="9.9, 1.1, 3.3, 21.78, 19.8, 8.58, 0, 8.58, 16.5, 21.78" fill="#6c757d73"/>
                                        </svg>
                                    </label>
                                </div>
                                <div class="star active" data-rating="4">
                                    <label>
                                        <svg class="rating-svg" viewBox="0 0 25 25">
                                            <polygon points="9.9, 1.1, 3.3, 21.78, 19.8, 8.58, 0, 8.58, 16.5, 21.78" fill="#6c757d73"/>
                                        </svg>
                                    </label>
                                </div>
                                <div class="star active" data-rating="5">
                                    <label>
                                        <svg class="rating-svg" viewBox="0 0 25 25">
                                            <polygon points="9.9, 1.1, 3.3, 21.78, 19.8, 8.58, 0, 8.58, 16.5, 21.78" fill="#6c757d73"/>
                                        </svg>
                                    </label>
                                </div>
                            </div>
                            <div class="">(1 отзыв)</div>
                        </div>
                    </section>
                </div>
                <div class="size-select">
                    @include('user.product.show.layouts.sizes_block')
                    <div class="mt-2 mb-3 d-f ai-c jc-s submitProductBlock">
                        <button class="cl-w btn-profile mr-md-3 mr-0">Купить</button>
{{--                        <button class="cl-w btn-profile_border mt-2 mt-md-0">Перезвонить мне</button>--}}
                        <div class="product_likeBlock d-f ai-c mt-3 mt-md-0 jc-c">
                            <div class="mb-3 mb-md-0 product_like">
                                <svg viewBox="0 0 28 28" id="heart"><path d="M24.903 5.335l.026.028a8.55 8.55 0 0 1-.647 11.831c-.817.78-2.285 2.037-4.274 3.679l-.293.24c-.855.704-1.756 1.438-2.76 2.25l-1.948 1.572c-.483.435-1.218.435-1.658.034-2.732-1.994-7.931-6.087-9.554-7.638a8.377 8.377 0 0 1-.51-11.996C6.151 2.442 10.75 2.21 13.878 4.79a.36.36 0 0 0 .431.011 7.866 7.866 0 0 1 10.594.535"></path></svg>
                            </div>
                            <p class="mb-3 mb-md-0 ml-2 m-0">Добавить в избранное</p>
                        </div>
                    </div>
                    <div class="d-f ai-c jc-c t-c credit-privat product_likeBlock">
                        <div class="d-n dmd-b">
                            <img class="w-75" src="{{ asset('img/pie-chart.png')}}">
                        </div>
                        <div class="mb-3 mt-2">
                            <a href="" class="pay-parts cl-g">Оплата частями <br> (доступно на чек от 1000 грн.)</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="delivery-store_border-block col-12 col-lg-6">
            <div class="borderAll-block row w-1p m-0">
                @include('user.product.show.layouts.borderBlocks')
            </div>
        </div>
        <div class="delivery-store_content col-12 col-md-6 d-f fd-c mt-0">
            <div class="more">
                <div class="delivery-store_content-txt">
                    {{ $gproduct->getDescTran() }}
                </div>
                <div class="product-info row d-f ai-c mt-3">
                    <div class="product-info_name col-4">
                        Метал:
                    </div>
                    <div class="col-4">
                        Золото
                    </div>
                </div>
                <div class="product-info row d-f ai-c mt-2">
                    <div class="product-info_name col-4">
                        Проба:
                    </div>
                    <div class="col-4">
                        585
                    </div>
                </div>
                <div class="product-info row d-f ai-s mt-2">
                    <div class="product-info_name col-4">
                        Для кого:
                    </div>
                    <div class="col-4">
                        Женщины
                    </div>
                </div>
                <div class="product-info row d-f ai-s mt-2">
                    <div class="product-info_name col-4">
                        Вес, грамм:
                    </div>
                    <div class="col-4">
                        2,81
                    </div>
                </div>
                <div class="product-info row d-f ai-s mt-2">
                    <div class="product-info_name col-4">
                        Вставка 1:
                    </div>
                    <div class="col-4">
                        Фианит (куб.цирконий)
                    </div>
                </div>
                <div class="more-hide product-info row d-f ai-s mt-2">
                    <div class="product-info_name col-4">
                        Количество камней:
                    </div>
                    <div class="col-4">
                        6
                    </div>
                </div>
            </div>
            <div class="morelink all-specifications d-f ai-c mt-2">
                <div class="mr-3">Все характеристики</div>
                <div class="contact-header_icon">
                    <svg viewBox="0 0 256 256">
                        <polyline fill="none" stroke="#000" stroke-width="16" stroke-linejoin="round" stroke-linecap="round" points="16,72 128,184 240,72"></polyline>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <div class="row slider-block mt-5 d-f ai-c jc-c">
        <h3>Просмотренные товары</h3>
        <div class="slider-responsive col-12">
            <div class="swiper-container swiper-container_prev viewed-container mt-4">
                <div class="swiper-wrapper">
                    <div class="swiper-slide slider-card_height">
                        <div class="card-prod">
                            <div class="card-store_content-class d-f w-1p jc-s pl-0 pl-lg-2">
                                <div class="btn-class btn-class_new d-f ai-c jc-c h-1p p-1">
                                    Новинка
                                </div>
                                <div class="card-hover">
                                    <div class="card-hover_like">
                                        <svg viewBox="0 0 28 28" id="heart"><path d="M24.903 5.335l.026.028a8.55 8.55 0 0 1-.647 11.831c-.817.78-2.285 2.037-4.274 3.679l-.293.24c-.855.704-1.756 1.438-2.76 2.25l-1.948 1.572c-.483.435-1.218.435-1.658.034-2.732-1.994-7.931-6.087-9.554-7.638a8.377 8.377 0 0 1-.51-11.996C6.151 2.442 10.75 2.21 13.878 4.79a.36.36 0 0 0 .431.011 7.866 7.866 0 0 1 10.594.535"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="card-static">
                                <div class="swiper-container card-slider">
                                    <div class="swiper-wrapper mt-4 mb-4">
                                        <div class="swiper-slide card-static_img d-f ai-c jc-c w-1p">
                                            <img class="" src="{{ asset('img/img-card.png')}}">
                                        </div>
                                        <div class="swiper-slide card-static_img d-f ai-c jc-c w-1p">
                                            <img class="" src="{{ asset('img/img-card.png')}}">
                                        </div>
                                    </div>
                                    <!-- Add Pagination -->
                                    <div class="swiper-pagination"></div>
                                </div>
                                <div class="card-static_txt mt-3 mt-lg-0">
                                    <span>Серьги золотые с фианитами и бусинками</span>
                                </div>
                                <div class="d-b dlg-n">
                                    <div class="card-static_price mt-5">3 365 <span class="">грн</span></div>
                                    <div class="d-f ai-c jc-c mb-1">
                                        <div class="card-static_sale-price">
                                            6 633 <span class="">грн</span>
                                        </div>
                                        <div class="card-static_sale p-r">
                                            <div class="card-cost">-30%</div>
                                            <div class="card-static_sale-left"></div>
                                            <div class="card-static_sale-right"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-n dlg-b mt-5">
                                    <div class="salePrice_block d-f ai-c jc-c mt-1 mb-1">
                                        <div class="card-static_sale-price">
                                            6 633 <span class="">грн</span>
                                        </div>
                                        <div class="card-static_sale p-r">
                                            <div class="card-cost">-30%</div>
                                            <div class="card-static_sale-left"></div>
                                            <div class="card-static_sale-right"></div>
                                        </div>
                                    </div>
                                    <div class="card-static_price">3 365 <span class="">грн</span></div>
                                </div>
                            </div>
                            <div class="d-f jc-c">
                                <div class="card-hover d-f jc-c card-hover_btn mt-2 mb-2">
                                    <a href="#">Купить</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide slider-card_height">
                        <div class="card-prod">
                            <div class="card-store_content-class d-f w-1p jc-s pl-0 pl-lg-2">
                                <div class="btn-class btn-class_new d-f ai-c jc-c h-1p p-1">
                                    Новинка
                                </div>
                                <div class="card-hover">
                                    <div class="card-hover_like">
                                        <svg viewBox="0 0 28 28" id="heart"><path d="M24.903 5.335l.026.028a8.55 8.55 0 0 1-.647 11.831c-.817.78-2.285 2.037-4.274 3.679l-.293.24c-.855.704-1.756 1.438-2.76 2.25l-1.948 1.572c-.483.435-1.218.435-1.658.034-2.732-1.994-7.931-6.087-9.554-7.638a8.377 8.377 0 0 1-.51-11.996C6.151 2.442 10.75 2.21 13.878 4.79a.36.36 0 0 0 .431.011 7.866 7.866 0 0 1 10.594.535"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="card-static">
                                <div class="swiper-container card-slider">
                                    <div class="swiper-wrapper mt-4 mb-4">
                                        <div class="swiper-slide card-static_img d-f ai-c jc-c w-1p">
                                            <img class="" src="{{ asset('img/img-card.png')}}">
                                        </div>
                                        <div class="swiper-slide card-static_img d-f ai-c jc-c w-1p">
                                            <img class="" src="{{ asset('img/img-card.png')}}">
                                        </div>
                                    </div>
                                    <!-- Add Pagination -->
                                    <div class="swiper-pagination"></div>
                                </div>
                                <div class="card-static_txt mt-3 mt-lg-0">
                                    <span>Серьги золотые с фианитами и бусинками</span>
                                </div>
                                <div class="d-b dlg-n">
                                    <div class="card-static_price mt-5">3 365 <span class="">грн</span></div>
                                    <div class="d-f ai-c jc-c mb-1">
                                        <div class="card-static_sale-price">
                                            6 633 <span class="">грн</span>
                                        </div>
                                        <div class="card-static_sale p-r">
                                            <div class="card-cost">-30%</div>
                                            <div class="card-static_sale-left"></div>
                                            <div class="card-static_sale-right"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-n dlg-b mt-5">
                                    <div class="salePrice_block d-f ai-c jc-c mt-1 mb-1">
                                        <div class="card-static_sale-price">
                                            6 633 <span class="">грн</span>
                                        </div>
                                        <div class="card-static_sale p-r">
                                            <div class="card-cost">-30%</div>
                                            <div class="card-static_sale-left"></div>
                                            <div class="card-static_sale-right"></div>
                                        </div>
                                    </div>
                                    <div class="card-static_price">3 365 <span class="">грн</span></div>
                                </div>
                            </div>
                            <div class="d-f jc-c">
                                <div class="card-hover d-f jc-c card-hover_btn mt-2 mb-2">
                                    <a href="#">Купить</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide slider-card_height">
                        <div class="card-prod">
                            <div class="card-store_content-class d-f w-1p jc-s pl-0 pl-lg-2">
                                <div class="btn-class btn-class_new d-f ai-c jc-c h-1p p-1">
                                    Новинка
                                </div>
                                <div class="card-hover">
                                    <div class="card-hover_like">
                                        <svg viewBox="0 0 28 28" id="heart"><path d="M24.903 5.335l.026.028a8.55 8.55 0 0 1-.647 11.831c-.817.78-2.285 2.037-4.274 3.679l-.293.24c-.855.704-1.756 1.438-2.76 2.25l-1.948 1.572c-.483.435-1.218.435-1.658.034-2.732-1.994-7.931-6.087-9.554-7.638a8.377 8.377 0 0 1-.51-11.996C6.151 2.442 10.75 2.21 13.878 4.79a.36.36 0 0 0 .431.011 7.866 7.866 0 0 1 10.594.535"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="card-static">
                                <div class="swiper-container card-slider">
                                    <div class="swiper-wrapper mt-4 mb-4">
                                        <div class="swiper-slide card-static_img d-f ai-c jc-c w-1p">
                                            <img class="" src="{{ asset('img/img-card.png')}}">
                                        </div>
                                        <div class="swiper-slide card-static_img d-f ai-c jc-c w-1p">
                                            <img class="" src="{{ asset('img/img-card.png')}}">
                                        </div>
                                    </div>
                                    <!-- Add Pagination -->
                                    <div class="swiper-pagination"></div>
                                </div>
                                <div class="card-static_txt mt-3 mt-lg-0">
                                    <span>Серьги золотые с фианитами и бусинками</span>
                                </div>
                                <div class="d-b dlg-n">
                                    <div class="card-static_price mt-5">3 365 <span class="">грн</span></div>
                                    <div class="d-f ai-c jc-c mb-1">
                                        <div class="card-static_sale-price">
                                            6 633 <span class="">грн</span>
                                        </div>
                                        <div class="card-static_sale p-r">
                                            <div class="card-cost">-30%</div>
                                            <div class="card-static_sale-left"></div>
                                            <div class="card-static_sale-right"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-n dlg-b mt-5">
                                    <div class="salePrice_block d-f ai-c jc-c mt-1 mb-1">
                                        <div class="card-static_sale-price">
                                            6 633 <span class="">грн</span>
                                        </div>
                                        <div class="card-static_sale p-r">
                                            <div class="card-cost">-30%</div>
                                            <div class="card-static_sale-left"></div>
                                            <div class="card-static_sale-right"></div>
                                        </div>
                                    </div>
                                    <div class="card-static_price">3 365 <span class="">грн</span></div>
                                </div>
                            </div>
                            <div class="d-f jc-c">
                                <div class="card-hover d-f jc-c card-hover_btn mt-2 mb-2">
                                    <a href="#">Купить</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--                Add Pagination--}}
                <div class="swiper-pagination swiper-pagination_prev"></div>
                <!-- Add Arrows -->
                <div class="swiper-button-next btn-slider-black_right"></div>
                <div class="swiper-button-prev btn-slider-black_left"></div>
            </div>
        </div>
    </div>
    <div class="row slider-block  mt-2 mb-2 d-f ai-c jc-c">
        <h3>Похожие товары</h3>
        <div class="col-12">
            <div class="swiper-container swiper-container_similar viewed-container mt-4">
                <div class="swiper-wrapper">
                    <div class="swiper-slide slider-card_height">
                        <div class="card-prod">
                            <div class="card-store_content-class d-f w-1p jc-s pl-0 pl-lg-2">
                                <div class="btn-class btn-class_new d-f ai-c jc-c h-1p p-1">
                                    Новинка
                                </div>
                                <div class="card-hover">
                                    <div class="card-hover_like">
                                        <svg viewBox="0 0 28 28" id="heart"><path d="M24.903 5.335l.026.028a8.55 8.55 0 0 1-.647 11.831c-.817.78-2.285 2.037-4.274 3.679l-.293.24c-.855.704-1.756 1.438-2.76 2.25l-1.948 1.572c-.483.435-1.218.435-1.658.034-2.732-1.994-7.931-6.087-9.554-7.638a8.377 8.377 0 0 1-.51-11.996C6.151 2.442 10.75 2.21 13.878 4.79a.36.36 0 0 0 .431.011 7.866 7.866 0 0 1 10.594.535"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="card-static">
                                <div class="swiper-container card-slider">
                                    <div class="swiper-wrapper mt-4 mb-4">
                                        <div class="swiper-slide card-static_img d-f ai-c jc-c w-1p">
                                            <img class="" src="{{ asset('img/img-card.png')}}">
                                        </div>
                                        <div class="swiper-slide card-static_img d-f ai-c jc-c w-1p">
                                            <img class="" src="{{ asset('img/img-card.png')}}">
                                        </div>
                                    </div>
                                    <!-- Add Pagination -->
                                    <div class="swiper-pagination"></div>
                                </div>
                                <div class="card-static_txt mt-3 mt-lg-0">
                                    <span>Серьги золотые с фианитами и бусинками</span>
                                </div>
                                <div class="d-b dlg-n">
                                    <div class="card-static_price mt-5">3 365 <span class="">грн</span></div>
                                    <div class="d-f ai-c jc-c mb-1">
                                        <div class="card-static_sale-price">
                                            6 633 <span class="">грн</span>
                                        </div>
                                        <div class="card-static_sale p-r">
                                            <div class="card-cost">-30%</div>
                                            <div class="card-static_sale-left"></div>
                                            <div class="card-static_sale-right"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-n dlg-b mt-5">
                                    <div class="salePrice_block d-f ai-c jc-c mt-1 mb-1">
                                        <div class="card-static_sale-price">
                                            6 633 <span class="">грн</span>
                                        </div>
                                        <div class="card-static_sale p-r">
                                            <div class="card-cost">-30%</div>
                                            <div class="card-static_sale-left"></div>
                                            <div class="card-static_sale-right"></div>
                                        </div>
                                    </div>
                                    <div class="card-static_price">3 365 <span class="">грн</span></div>
                                </div>
                            </div>
                            <div class="d-f jc-c">
                                <div class="card-hover d-f jc-c card-hover_btn mt-2 mb-2">
                                    <a href="#">Купить</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide slider-card_height">
                        <div class="card-prod">
                            <div class="card-store_content-class d-f w-1p jc-s pl-0 pl-lg-2">
                                <div class="btn-class btn-class_new d-f ai-c jc-c h-1p p-1">
                                    Новинка
                                </div>
                                <div class="card-hover">
                                    <div class="card-hover_like">
                                        <svg viewBox="0 0 28 28" id="heart"><path d="M24.903 5.335l.026.028a8.55 8.55 0 0 1-.647 11.831c-.817.78-2.285 2.037-4.274 3.679l-.293.24c-.855.704-1.756 1.438-2.76 2.25l-1.948 1.572c-.483.435-1.218.435-1.658.034-2.732-1.994-7.931-6.087-9.554-7.638a8.377 8.377 0 0 1-.51-11.996C6.151 2.442 10.75 2.21 13.878 4.79a.36.36 0 0 0 .431.011 7.866 7.866 0 0 1 10.594.535"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="card-static">
                                <div class="swiper-container card-slider">
                                    <div class="swiper-wrapper mt-4 mb-4">
                                        <div class="swiper-slide card-static_img d-f ai-c jc-c w-1p">
                                            <img class="" src="{{ asset('img/img-card.png')}}">
                                        </div>
                                        <div class="swiper-slide card-static_img d-f ai-c jc-c w-1p">
                                            <img class="" src="{{ asset('img/img-card.png')}}">
                                        </div>
                                    </div>
                                    <!-- Add Pagination -->
                                    <div class="swiper-pagination"></div>
                                </div>
                                <div class="card-static_txt mt-3 mt-lg-0">
                                    <span>Серьги золотые с фианитами и бусинками</span>
                                </div>
                                <div class="d-b dlg-n">
                                    <div class="card-static_price mt-5">3 365 <span class="">грн</span></div>
                                    <div class="d-f ai-c jc-c mb-1">
                                        <div class="card-static_sale-price">
                                            6 633 <span class="">грн</span>
                                        </div>
                                        <div class="card-static_sale p-r">
                                            <div class="card-cost">-30%</div>
                                            <div class="card-static_sale-left"></div>
                                            <div class="card-static_sale-right"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-n dlg-b mt-5">
                                    <div class="salePrice_block d-f ai-c jc-c mt-1 mb-1">
                                        <div class="card-static_sale-price">
                                            6 633 <span class="">грн</span>
                                        </div>
                                        <div class="card-static_sale p-r">
                                            <div class="card-cost">-30%</div>
                                            <div class="card-static_sale-left"></div>
                                            <div class="card-static_sale-right"></div>
                                        </div>
                                    </div>
                                    <div class="card-static_price">3 365 <span class="">грн</span></div>
                                </div>
                            </div>
                            <div class="d-f jc-c">
                                <div class="card-hover d-f jc-c card-hover_btn mt-2 mb-2">
                                    <a href="#">Купить</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide slider-card_height">
                        <div class="card-prod">
                            <div class="card-store_content-class d-f w-1p jc-s pl-0 pl-lg-2">
                                <div class="btn-class btn-class_new d-f ai-c jc-c h-1p p-1">
                                    Новинка
                                </div>
                                <div class="card-hover">
                                    <div class="card-hover_like">
                                        <svg viewBox="0 0 28 28" id="heart"><path d="M24.903 5.335l.026.028a8.55 8.55 0 0 1-.647 11.831c-.817.78-2.285 2.037-4.274 3.679l-.293.24c-.855.704-1.756 1.438-2.76 2.25l-1.948 1.572c-.483.435-1.218.435-1.658.034-2.732-1.994-7.931-6.087-9.554-7.638a8.377 8.377 0 0 1-.51-11.996C6.151 2.442 10.75 2.21 13.878 4.79a.36.36 0 0 0 .431.011 7.866 7.866 0 0 1 10.594.535"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="card-static">
                                <div class="swiper-container card-slider">
                                    <div class="swiper-wrapper mt-4 mb-4">
                                        <div class="swiper-slide card-static_img d-f ai-c jc-c w-1p">
                                            <img class="" src="{{ asset('img/img-card.png')}}">
                                        </div>
                                        <div class="swiper-slide card-static_img d-f ai-c jc-c w-1p">
                                            <img class="" src="{{ asset('img/img-card.png')}}">
                                        </div>
                                    </div>
                                    <!-- Add Pagination -->
                                    <div class="swiper-pagination"></div>
                                </div>
                                <div class="card-static_txt mt-3 mt-lg-0">
                                    <span>Серьги золотые с фианитами и бусинками</span>
                                </div>
                                <div class="d-b dlg-n">
                                    <div class="card-static_price mt-5">3 365 <span class="">грн</span></div>
                                    <div class="d-f ai-c jc-c mb-1">
                                        <div class="card-static_sale-price">
                                            6 633 <span class="">грн</span>
                                        </div>
                                        <div class="card-static_sale p-r">
                                            <div class="card-cost">-30%</div>
                                            <div class="card-static_sale-left"></div>
                                            <div class="card-static_sale-right"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-n dlg-b mt-5">
                                    <div class="salePrice_block d-f ai-c jc-c mt-1 mb-1">
                                        <div class="card-static_sale-price">
                                            6 633 <span class="">грн</span>
                                        </div>
                                        <div class="card-static_sale p-r">
                                            <div class="card-cost">-30%</div>
                                            <div class="card-static_sale-left"></div>
                                            <div class="card-static_sale-right"></div>
                                        </div>
                                    </div>
                                    <div class="card-static_price">3 365 <span class="">грн</span></div>
                                </div>
                            </div>
                            <div class="d-f jc-c">
                                <div class="card-hover d-f jc-c card-hover_btn mt-2 mb-2">
                                    <a href="#">Купить</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--                Add Pagination--}}
                <div class="swiper-pagination swiper-pagination_similar"></div>
                <!-- Add Arrows -->
                <div class="swiper-button-next btn-slider-black_right"></div>
                <div class="swiper-button-prev btn-slider-black_left"></div>

            </div>
        </div>
    </div>
    <div>
        @include('user.home.subscribe')
    </div>
@endsection
@section('script2')
    {{--    not checking--}}
    <script>
        $('.not-available').prop('disabled',true);
    </script>

    {{--    Slider--}}
    <script>
        let swiper3 = new Swiper('.swiper-container_similar', {
            slidesPerView: 3,
            spaceBetween: 0,
            loop: true,
            observer: true,
            observeParents: true,
            loop: true,
            loopFillGroupWithBlank: true,
            navigation: {
                nextEl: '.btn-slider-black_right',
                prevEl: '.btn-slider-black_left',
            },
            pagination: {
                el: '.swiper-pagination_similar',
                clickable: true,
            },
            breakpoints: {
                // when window width is >= 640px
                992: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
            },
        });
        let swiper4 = new Swiper('.swiper-container_prev', {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            observer: true,
            observeParents: true,
            loop: true,
            loopFillGroupWithBlank: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination_prev',
                clickable: true,
            },
            breakpoints: {
                // when window width is >= 640px
                992: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
            },

        });
        let swiper2 = new Swiper('.card-slider', {
            observer: true,
            observeParents: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    </script>

{{--    Read more--}}

    <script>
        $('.more').ready(function() {
            $('.more-hide').hide();
            // let $height = $('.more').height();
            // if ($height > 350) {
            //     $('.more').height(350);
            //     $('.more').css('overflow', 'hidden');
            // }
            // $(".morelink").on('click', function () {
            //     $('.more').height('auto');
            //     $('.more').css('overflow', 'visible');
            //     $('.contact-header_icon').toggleClass('open');
            //
            //         $(".morelink").on('click', function () {
            //             $('.more').height(350);
            //             $('.more').css('overflow', 'hidden');
            //         });
            // });
            $('.morelink').on('click', function(e) {
                $('.more-hide').slideToggle(function() {
                    $('.contact-header_icon').toggleClass('open');
                });
            });
        });
    </script>
@endsection
