<div class="col-12">
    <div class="swiper-container gallery-slider">
        <div class="swiper-wrapper mb-4">
            @forelse($mozaiks as $mozaik)
            <div class="swiper-slide slide-gallery">
                <a class="w-1p h-1p" href="{{ $mozaik -> link}}">
                    <img class="w-1p" src="{{ asset($mozaik -> image_thumb) }}" alt="{{ $mozaik -> alt}}">
                    <div class="gallery-home_txt-img p-a cl-w">{{ $mozaik -> getNameTran()}}</div>
                </a>
            </div>
            @empty
                <div class="swiper-slide slide-gallery">
                    <a class="w-1p h-1p" href="#">
                        <img class="w-1p" src="{{ asset('img/gallary-img1.png') }}">
                    </a>
                </div>
            @endforelse
        </div>
         {{--Add Pagination --}}
        <div class="swiper-pagination"></div>
    </div>
</div>