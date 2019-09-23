@extends('user.app.app')

@section('content')
    @php
        if(isset($remove_pvalues)) {
            $array_pvalues_rem = $remove_pvalues->pluck('id')->toArray();
        }
    @endphp
    <div class="row mt-2">
{{--         хлебные крошки--}}
        <div class="col-12 breadcrumbs">
            <a href="{{ asset(app()->getLocale()) }}">Главная</a>
            <span>&nbsp;>&nbsp;</span>
            <a>{{ $category->getNameTran() }}</a>
        </div>

        <div class="col-12">
            <h4 class="mb-3 mt-3">{{ $title }}</h4>
        </div>
        <div class="col-3 backet-form filter-item d-n dlg-b">
            @include('user.category.show.layouts.sidebar_filter')
        </div>
        <div class="col-12 col-lg-9">
            @if(isset($remove_pvalues))
                <div class="row">
                    <div class="col-12">
                        @foreach($remove_pvalues as $remove_pvalue)
                            @php
                            $array_pvalues_rem_without = array_diff($array_pvalues_rem, [$remove_pvalue->id]);
                            $new_gpvalues_param = implode(',', $array_pvalues_rem_without);
                            @endphp
                            <div class="filter-tags__item m-2">
                                <p class="name-filter m-0 mr-2">{{ $remove_pvalue->getNameTran() }}</p>
                                <a href="{{ asset(app()->getLocale().'/categories/'.$category->alias.'?gpvalues='.$new_gpvalues_param) }}" class="del-filter" rel="nofollow">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                         viewBox="0 0 50 50">
                                        <g id="surface1"><path d="M 7.71875 6.28125 L 6.28125 7.71875 L 23.5625 25 L 6.28125 42.28125 L 7.71875 43.71875 L 25 26.4375 L 42.28125 43.71875 L 43.71875 42.28125 L 26.4375 25 L 43.71875 7.71875 L 42.28125 6.28125 L 25 23.5625 Z "></path></g>
                                    </svg>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-12 dlg-n mb-4">
                    <button id="filterMob" class="cl-w btn-profile mr-md-3 mr-0">Фильтр</button>
                </div>
            </div>
            <div class="row">
                @forelse($gproducts as $gproduct)
                    <div class="col-6 col-lg-4 card-catalog-height">
                        @include('user.category.show.layouts.new_product_card')
                    </div>
                @empty
                @endforelse
            </div>
            <div class="row">
                <div class="col-12 d-f jc-c">
                    {{ $gproducts->links('vendor.pagination.pagination_catalog') }}
                </div>
            </div>
        </div>
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

        $('body').on('change', '.catalog-filter-item', function(e){
            window.location.href = $(this).data('url');

        });
    </script>
@endsection
