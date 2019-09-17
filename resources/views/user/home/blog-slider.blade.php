@if(count($btposts) != 0)
    <div class="col-12 t-c">
        <h3 class="mt-4 mb-4">Блог</h3>
    </div>
    <div class="col-12">
        <div class="swiper-container slider-blog viewed-container">
            <div class="swiper-wrapper">
                @foreach($btposts as $btpost)
                    <div class="swiper-slide slide-blog newsImage" style="background: url('{{ asset($btpost->image_path) }}')" >
                        <a class="w-1p h-1p" href="{{ asset(app()->getLocale().'/news/'.$btpost->btheme->alias.'/'.$btpost->alias) }}">
{{--                            <img class="w-1p" src="{{ asset($btpost->image_path) }}">--}}
                            <div class="articleBlogSlide">
                                <p>{{ $btpost->getTitleTran() }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination blog-pagination"></div>
        </div>
    </div>
    <div class="moreNews col-12 mt-5 mt-md-2 d-f jc-e">
        <a href="{{ asset(app()->getLocale().'/news/') }}">Смотреть все новости</a>
    </div>
@endif