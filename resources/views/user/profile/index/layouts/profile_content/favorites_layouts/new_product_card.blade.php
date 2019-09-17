<div class="card-catalog-prod">
    <div class="card-store_content-class d-f w-1p jc-s pl-2">
        {{-- Проверка на новизну товара--}}
        @if($gproduct->new_on)
            <div class="btn-class btn-class_new d-f ai-c jc-c h-1p p-1">
                Новинка
            </div>
        @else
            <div class="btn-class_empty">
            </div>
        @endif

        <div class="card-hover d-n">
            <div class="card-hover_nolike" data-id="{{ $gproduct->id }}">
                <svg viewBox="0 0 28 28" id="trash"><path d="M18.444 5.333H23.5a.722.722 0 010 1.445H4.722a.722.722 0 010-1.445h5.056V3.89a1.3 1.3 0 011.444-1.445H17a1.3 1.3 0 011.444 1.445v1.444zm-1.444 0V3.89h-5.778v1.444H17zm4.333 3.611v15.167a1.3 1.3 0 01-1.444 1.445H8.333A1.3 1.3 0 016.89 24.11V8.944a.722.722 0 011.444 0v15.167H19.89V8.944a.722.722 0 111.444 0zM17 10.1v10.111a.722.722 0 01-1.444 0V10.1a.722.722 0 111.444 0zm-4.333 0v10.111a.722.722 0 01-1.445 0V10.1a.722.722 0 011.445 0z" fill="currentColor"></path></svg>
            </div>
        </div>
    </div>
    <a href="{{ asset(app()->getLocale().'/products/'.$gproduct->alias) }}" class="card-catalog-link">
        <div class="card-catalog-static">
            <div class="swiper-container card-slider">
                <div class="swiper-wrapper mt-4 mb-4">
                    @foreach($gproduct->gpimages as $gpimage)
                        <div class="swiper-slide card-static_img d-f ai-c jc-c w-1p">
                            <img class="" src="{{ asset($gpimage->image_path)}}" alt="{{ $gproduct->getNameTran().' img-'.$gpimage->id }}">
                        </div>
                    @endforeach
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
            <div class="card-static_txt">
                <span>{{$gproduct->getNameTran()}}</span>
            </div>
            <div class="d-f ai-c jc-c mt-1 mb-1">
                <?
                $first_product = $gproduct->productsNew->first();
                ?>
                <div class="card-static_sale-price">
                    {{ $first_product->g_price }} <span class="">грн</span>
                </div>
                <div class="card-static_sale p-r">
                    <div class="card-cost">-{{ $first_product->sale }}%</div>
                    <div class="card-static_sale-left"></div>
                    <div class="card-static_sale-right"></div>
                </div>
            </div>
            <div class="card-static_price">{{ $first_product->total_sum }} <span class="">грн</span></div>
        </div>
    </a>
    <div class="card-hover">
        <div class="card-hover_btn mt-2 mb-2">
            <a href="#">Купить</a>
        </div>
    </div>
</div>
