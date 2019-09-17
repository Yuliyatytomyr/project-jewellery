<div class="col-4 card-height">
    <div class="card-prod active">
        <div class="card-store_content-class d-f w-1p jc-s pl-2">
            <div class="btn-class btn-class_new d-f ai-c jc-c h-1p p-1">
                Новинка
            </div>
            <div class="btn-class btn-class_top d-f ai-c jc-c ml-1 h-1p p-1">
                Топ продаж
            </div>
            <div class="card-hover d-n">
                <div class="card-hover_like">
                    <svg viewBox="0 0 28 28" id="heart"><path d="M24.903 5.335l.026.028a8.55 8.55 0 0 1-.647 11.831c-.817.78-2.285 2.037-4.274 3.679l-.293.24c-.855.704-1.756 1.438-2.76 2.25l-1.948 1.572c-.483.435-1.218.435-1.658.034-2.732-1.994-7.931-6.087-9.554-7.638a8.377 8.377 0 0 1-.51-11.996C6.151 2.442 10.75 2.21 13.878 4.79a.36.36 0 0 0 .431.011 7.866 7.866 0 0 1 10.594.535"></path></svg>
                </div>
            </div>
        </div>
        <div class="card-static">
            <div class="swiper-container card-slider">
                <div class="swiper-wrapper mt-4 mb-4">
                    @forelse($gproduct->gpimages as $gpimage)
                        <div class="swiper-slide card-static_img d-f ai-c jc-c w-1p">
                            <img class="" src="{{ asset($gpimage->image_path)}}">
                        </div>
                    @empty
                        <div class="swiper-slide card-static_img d-f ai-c jc-c w-1p">
                            <img class="" src="{{ asset('images/noimagefound.jpg')}}" alt="image not found">
                        </div>
                    @endforelse
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>

            <div class="card-static_txt">
                <span>
                    {{ $gproduct->getNameTran() }}
                </span>
            </div>
            <div class="d-f ai-c jc-c mt-1 mb-1">
                <?
                    $first_product = $gproduct->productsNew->first();
                    $old_price = $first_product->weight * $first_product->g_price;
                    $new_price = $first_product->weight * $first_product->g_price / 100 *( 100 - $first_product->sale);
                ?>
                <div class="card-static_sale-price">
                    {{ $old_price }} <span class="">грн</span>
                </div>
                <div class="card-static_sale p-r">
                    <div class="card-cost">-{{ $first_product->sale }}%</div>
                    <div class="card-static_sale-left"></div>
                    <div class="card-static_sale-right"></div>
                </div>
            </div>
            <div class="card-static_price">{{ $new_price }} <span class="">грн</span></div>
        </div>
        <div class="card-hover">
            <div class="card-hover_btn mt-2 mb-2">
                <a href="#">Купить</a>
            </div>
        </div>
    </div>
</div>