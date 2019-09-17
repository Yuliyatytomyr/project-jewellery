@extends('user.app.app')


@section('content')
    <div class="d-n dlg-b">
        <div class="row block-slider">
            <div class="col-2"></div>
            <div class="col-10">
                <div class="swiper-container slider-home">
                    <div class="swiper-wrapper">
                        @forelse($f_sliders as $f_slider)
                            <div class="swiper-slide">
                                <a class="w-1p h-1p" href="{{ $f_slider->link }}">
                                    <img class="w-1p" src="{{ asset($f_slider->image_full) }}" alt="{{ $f_slider->alt }}">
                                </a>
                            </div>
                        @empty
                            <div class="swiper-slide">
                                <a class="w-1p h-1p" href="#">
                                    <img class="w-1p" src="{{ asset('img/slide-1.png') }}">
                                </a>
                            </div>
                        @endforelse

                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next btn-slider-right">
                        <i class="fas fa-2x fa-chevron-right"></i>
                    </div>
                    <div class="swiper-button-prev btn-slider-left">
                        <i class="fas fa-2x fa-chevron-left"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-b dlg-n p-0">
        <div class="row">
            <div class="swiper-container slider-home">
                <div class="swiper-wrapper">
                    @forelse($f_sliders as $f_slider)
                        <div class="swiper-slide">
                            <a class="w-1p h-1p" href="{{ $f_slider->link }}">
                                <img class="w-1p sliderMob-img" src="{{ asset($f_slider->image_full) }}" alt="{{ $f_slider->alt }}">
                            </a>
                        </div>
                    @empty
                        <div class="swiper-slide">
                            <a class="w-1p h-1p" href="#">
                                <img class="w-1p sliderMob-img" src="{{ asset('img/slide-1.png') }}">
                            </a>
                        </div>
                    @endforelse
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next btn-slider-right">
                    <i class="fas fa-2x fa-chevron-right"></i>
                </div>
                <div class="swiper-button-prev btn-slider-left">
                    <i class="fas fa-2x fa-chevron-left"></i>
                </div>
            </div>
{{--            <div class="swiper-container slider-home d-b dlg-n">--}}
{{--                <div class="swiper-wrapper">--}}
{{--                    @forelse($f_sliders as $f_slider)--}}
{{--                        <div class="swiper-slide">--}}
{{--                            <a class="w-1p h-1p" href="{{ $f_slider->link }}">--}}
{{--                                <img class="w-1p sliderMob-img" src="{{ asset($f_slider->image_thumb) }}" alt="{{ $f_slider->alt }}">--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    @empty--}}
{{--                        <div class="swiper-slide">--}}
{{--                            <a class="w-1p h-1p" href="#">--}}
{{--                                <img class="w-1p sliderMob-img" src="{{ asset('img/slide-1.png') }}">--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    @endforelse--}}
{{--                </div>--}}
{{--                <!-- Add Arrows -->--}}
{{--                <div class="swiper-button-next btn-slider-right">--}}
{{--                    <i class="fas fa-2x fa-chevron-right"></i>--}}
{{--                </div>--}}
{{--                <div class="swiper-button-prev btn-slider-left">--}}
{{--                    <i class="fas fa-2x fa-chevron-left"></i>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @include('user.home.catalogMob')
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @include('user.home.popular-promotions')
        </div>
    </div>
    <div class="row">
        <div class="col-12 d-n dmd-b">
            @include('user.home.gallery-home')
        </div>
        <div class="col-12 d-b dmd-n">
            @include('user.home.gallery-homeMob')
        </div>
    </div>
    <div class="row">
        @include('user.home.blog-slider')
    </div>
    <div class="mt-5">
        @include('user.home.about-us')
    </div>
    <div>
        @include('user.home.subscribe')
    </div>
@endsection


@section('script2')
    <script>
        new Swiper ('.slider-home', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            navigation: {
                nextEl: '.btn-slider-right',
                prevEl: '.btn-slider-left',
            },
            autoplay: {
                delay: 3000,
            },
        });
    </script>
    <script>
        let swiperSmallDesk = new Swiper('.card-slider', {
            observer: true,
            observeParents: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    </script>
    <script>
        let swiperSmallMob = new Swiper('.cardMob-slider', {
            observer: true,
            observeParents: true,
            pagination: {
                el: '.small-pagination',
                clickable: true,
            },
        });
    </script>
    <script>
        let swiperMobOne = new Swiper('.swiper-container-promotions', {
            slidesPerView: 2,
            spaceBetween: 15,
            pagination: {
                el: '.pagination-promotions',
                clickable: true,
            },
            autoplay: {
                delay: 2000,
            },
        });
    </script>
    <script>
        let swiperGallery = new Swiper('.gallery-slider', {
            observer: true,
            observeParents: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    </script>
    <script>
        let swiperBlog = new Swiper('.slider-blog', {
            slidesPerView: 4,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                // when window width is >= 640px
                992: {
                    slidesPerView: 2,
                    spaceBetween: 30
                }
            }
        });
    </script>
@endsection
