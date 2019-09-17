@extends('user.app.app')

@section('content')
    <div class="row mt-3 mb-4">
        {{-- Название страницы --}}
        <h3 class="w-100 text-center">{{ $title }}</h3>
    </div>

    <div class="row mb-5" id="customer-favorites-place">
           @include('user.favorites.index.layouts.favorites_block')
    </div>

@endsection

@section('script2')
    <script>
        let swiper2 = new Swiper('.card-slider', {
            observer: true,
            observeParents: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    </script>
@endsection