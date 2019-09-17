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
        <div class="card-hover">
            <div class="card-hover_like" data-id="{{ $gproduct->id }}">
                <svg viewBox="0 0 28 28" id="heart"><path d="M24.903 5.335l.026.028a8.55 8.55 0 0 1-.647 11.831c-.817.78-2.285 2.037-4.274 3.679l-.293.24c-.855.704-1.756 1.438-2.76 2.25l-1.948 1.572c-.483.435-1.218.435-1.658.034-2.732-1.994-7.931-6.087-9.554-7.638a8.377 8.377 0 0 1-.51-11.996C6.151 2.442 10.75 2.21 13.878 4.79a.36.36 0 0 0 .431.011 7.866 7.866 0 0 1 10.594.535"></path></svg>
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
            <div class="card-static_txt mt-3 mt-lg-0">
                <span>{{$gproduct->getNameTran()}}</span>
            </div>
            <div class="d-b dlg-n">
                @php
                $first_product = $gproduct->productsNew->first();
                @endphp
                <div class="card-static_price mt-5">{{ $first_product->total_sum }} <span class="">грн</span></div>
                <div class="d-f ai-c jc-c mb-1">
                    <div class="card-static_sale-price">
                        {{ $first_product->g_price }} <span class="">грн</span>
                    </div>
                    <div class="card-static_sale p-r">
                        <div class="card-cost">-{{ $first_product->sale }}%</div>
                        <div class="card-static_sale-left"></div>
                        <div class="card-static_sale-right"></div>
                    </div>
                </div>
            </div>
            <div class="d-n dlg-b">
                @php
                $first_product = $gproduct->productsNew->first();
                @endphp
                <div class="salePrice_block d-f ai-c jc-c mt-1 mb-1">
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
        </div>
    </a>
    <div class="d-f jc-c mt-0 mt-lg-3">
        <div class="card-hover d-f jc-c card-hover_btn mt-2 mb-2">
            <a href="#">Купить</a>
        </div>
    </div>
</div>
