@extends('user.app.app')

@section('content')

{{--    <div id="test" style="margin-top: 500px;">{{Request::path() }}</div>--}}

    <div class="personal mt-3 mb-3">
        <h2>Личный кабинет</h2>
        <div class="row d-f ai-s jc-b mt-4 mb-4">
            <div id="private-office_sidebar" class="col-3 personal-area">
                <aside>
                    <div class="personal-area_name pt-4 pb-4 pr-2 pl-2">
                        {{ (isset(Auth::user()->name)) ? Auth::user()->name .' '.Auth::user()->surname : Auth::user()->email }}
                    </div>

                    <?
                        $current_page = \Request::only('page_type');
                        $cur_p = (isset($current_page['page_type']))?$current_page['page_type']:'profile';
                    ?>

                    <div class="personal-area_bar d-f fd-c ai-s jc-c p-0 mt-3">
                        <a class="@if($cur_p == 'profile') active @endif personal-area_bar-list p-2 w-1p d-f" href="{{ asset(app()->getLocale().'\customer\profile') }}" data-type="profile">
                            <i class="far fa-user"></i>
                            <div class="pl-3">Моя информация</div>
                        </a>
                        <a class="@if($cur_p == 'orders') active @endif personal-area_bar-list p-2 w-1p d-f" href="{{ asset(app()->getLocale().'\customer\profile?page_type=orders') }}" data-type="orders">
                            <i class="fas fa-shopping-bag"></i>
                            <div class="pl-3">Мои заказы</div>
                        </a>
                        <a class="@if($cur_p == 'favorites') active @endif personal-area_bar-list p-2 w-1p d-f" href="{{ asset(app()->getLocale().'\customer\profile?page_type=favorites') }}" data-type="favorites">
                            <i class="far fa-heart"></i>
                            <div class="pl-3">Избранное</div>
                        </a>
                        <a class="@if($cur_p == 'actions') active @endif personal-area_bar-list p-2 w-1p d-f" href="{{ asset(app()->getLocale().'\customer\profile?page_type=actions') }}" data-type="actions">
                            <i class="far fa-clock"></i>
                            <div class="pl-3">Акции</div>
                        </a>
                    </div>
                </aside>
            </div>
            <div id="private-office_content" class="personal-content col-9">

                    {!!$page_content!!}

            </div>
        </div>
    </div>

@endsection
