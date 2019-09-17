<nav class="pt-2 pb-2 d-n dlg-b navDesk">
    <div class="container">
        <div class="menu submenu">
            <ul class="col-12 d-f ai-c jc-b p-0">
                <li class="menu_item">
                    <span class="cl-w d-f ai-c">
                        <i class="mr-2 fas fa-map-marker-alt"></i>
                        <div class="geoposition" data-toggle="modal" data-target="#exampleModalCenter">@lang('user_nav.nav1')</div>
                        <div class="ml-2 header_icon">
                            <svg viewBox="0 0 256 256">
                                <polyline fill="none" stroke-width="16" stroke-linejoin="round" stroke-linecap="round" points="16,72 128,184 240,72"></polyline>
                            </svg>
                        </div>
                    </span>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">ВАШ РЕГИОН ДОСТАВКИ</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div id="set-auto-city" class="form-group">
                                        <input class="form-control" value="" type="text" placeholder="Введите название населённого пункта">
                                    </div>
                                    <div id="js-set-auto-city" class="geo__set-city-auto"><span>Определить автоматически</span></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary bg-g b-c_g" data-dismiss="modal">Отменить</button>
                                    <button type="button" class="btn btn-primary bg-g b-c_g">Запомнить выбор</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="menu_item">
                    <a href="#" class="menu_link p-r">
                        <img class="truck-icon mr-1" src="{{ asset('img/truck-white.png') }}">
                        @lang('user_nav.nav5')

                        <div class="header__top-item-tip">
                            Бесплатная доставка по
                            всей Украине при
                            заказе от
                            750 гривен.
                            <div class="header__top-item-tip-link mt-2">
                                <span class="">
                                    Подробнее
                                </span>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="menu_item">
                    <svg class="header__top-item-icon" viewBox="0 0 40 40">
                        <g fill="none" fill-rule="evenodd" stroke="#FFF" stroke-linecap="round" stroke-width="1.5">
                            <path d="M20 9C13.925 9 9 13.925 9 20a10.98 10.98 0 0 0 4.213 8.658M20 31c6.075 0 11-4.925 11-11 0-3.49-1.625-6.6-4.16-8.615"></path>
                            <path d="M26.5 15v-4h4M13.5 25v4h-4" stroke-linejoin="round"></path>
                        </g>
                    </svg>
                    <a href="#" class="menu_link p-r">
                        @lang('user_nav.nav6')
                        <div class="header__top-item-tip header__top-item-tip">
                            Вы всегда можете вернуть неподошедший
                            товар почтой в
                            течение 14 дней с
                            полным возмещением денег.
                            <div class="header__top-item-tip-link mt-2">
                                <span class="">
                                    Подробнее
                                </span>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="menu_item">
                    <a href="{{ asset(app()->getLocale().'/shipping-and-payment') }}" class="menu_link">
                        @lang('user_nav.nav3')
                    </a>
                </li>
                <li class="menu_item">
                    <a href="#" class="menu_link t-u">
                        @lang('user_nav.nav2')
                    </a>
                </li>
                <li class="menu_item">
                    <a href="#" class="menu_link">
                        @lang('user_nav.nav4')
                    </a>
                </li>
                <div class="sel-cust">
                    <div class="select-cust d-f ai-s jc-c">
                        <div class="mr-2 header_icon">
                            <svg viewBox="0 0 256 256">
                                <polyline fill="none" stroke-width="16" stroke-linejoin="round" stroke-linecap="round" points="16,72 128,184 240,72"></polyline>
                            </svg>
                        </div>
                        @if(app()->getLocale() == 'ru')
                            <li class="nav-item">
                                <div class="select-cust_hide o-h">
                                    <div class="active no-a">
                                        <a class="header-list p-0" href="#">
                                            Рус
                                        </a>
                                    </div>
                                    <div class="active-option">
                                        <a class="header-list p-0" href="{{ asset('ua/'.\App\Models\StaticFunctions\SF:: getPartUrlForLocalButtons(Request::path(), Request::all())) }}">
                                            Укр
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @elseif(app()->getLocale() == 'ua')
                            <li class="nav-item">
                                <div class="select-cust_hide o-h">
                                    <div class="active no-a">
                                        <a class="header-list p-0" href="#">
                                            Укр
                                        </a>
                                    </div>
                                    <div class="active-option">
                                        <a class="header-list p-0" href="{{ asset('ru/'.\App\Models\StaticFunctions\SF:: getPartUrlForLocalButtons(Request::path(), Request::all())) }}">
                                            Рус
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @endif
                    </div>
                </div>
            </ul>
        </div>
        <div class="logo-block row p-r ">
            <div class="menu-search">
                <form class="search" action="{{ asset(app()->getLocale().'/search/submit') }}" method="get" id="full-search-form">
                    {{--search input--}}

                    <input id="search" form="full-search-form" type="text" name="search" class="search-input search-toggle" data-block="quick-search-block" data-url="{{ asset(app()->getLocale().'/search/full') }}" maxlength="128" autocomplete="off" placeholder="Поиск" value="{{ $search ?? '' }}">
                    <img class="search-icon" src="{{ asset('img/magnifying-glass.png') }}">
                </form>
            </div>

            <div class="quick-search-block hideSearchBlock" id="quick-search-block">
                
            </div>

            <div class="logo h-1p p-r w-1p">
                <a href="{{ asset(app()->getLocale()) }}" class="logo-link d-f ai-c jc-c p-a w-1p">
                    <img class="h-1p"  src="{{ asset('img/logo_4.png') }}">
                </a>
            </div>
            <div class="logo-list_header d-f ai-c jc-e p-a ">
                <div class="contact-header cl-w d-n dlg-b">
                    <div class="d-f ai-c jc-c">
                        <div class="mr-2 contact-header_icon">
                            <svg viewBox="0 0 256 256">
                                <polyline fill="none" stroke-width="16" stroke-linejoin="round" stroke-linecap="round" points="16,72 128,184 240,72"></polyline>
                            </svg>
                        </div>
                        <div class="contact-header_number">
                            0 800 211 999
                        </div>
                    </div>
                    <div class="contact-header_hide d-n">
                        <div class="mt-1 contact-header_number-content">Режим работы:</div>
                        <div class="contact-header_number-content">
                            Пн-Сб 09:00-19:00;<br>
                            Вс 09:00-19:00
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-f ai-c jc-b p-r header-block_navigation">
            <div class="col-12 d-f ai-c jc-b w-1p">
                @if(Route::currentRouteName() == 'home')
                <div class="menu d-f ai-s jc-s">
                    <button class="menu-toggle mr-3 p-a">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <div class="menu-txt cl-w p-a">Каталог</div>
                    </button>
                    @include('user.app.layouts.nav-shablon.nav-static')
                </div>
                @else
                <div class="menu d-f ai-s jc-s">
                    <button class="menu-toggle active mr-3 p-a">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <div class="menu-txt cl-w p-a">Каталог</div>
                    </button>
                    @include('user.app.layouts.nav-shablon.nav-dinamic')
                </div>
                @endif
                    <div class="d-f ai-c jc-e p-r">
                    @auth
                        <div class="header-nav-right d-f ai-b jc-e p-r">

                            <div class="contact-header header-nav-right_log cl-w t-c">
                                <div class="d-f ai-c jc-c">
                                    <div class="mr-2 contact-header_icon">
                                        <svg viewBox="0 0 256 256">
                                            <polyline fill="none" stroke-width="16" stroke-linejoin="round" stroke-linecap="round" points="16,72 128,184 240,72"></polyline>
                                        </svg>
                                    </div>
                                    <div class="d-f ai-c jc-c">
                                        <div>
                                            {{ (isset(Auth::user()->name)) ? Auth::user()->name .' '.Auth::user()->surname : Auth::user()->email }}
                                        </div>
{{--                                        <div class="p-2">--}}
{{--                                            @if(Auth::user()->photo == null)--}}
{{--                                                <i class="fas fa-user-circle pl-2 pr-2"></i>--}}
{{--                                            @else--}}
{{--                                                <img class="img-profile img-profile_small" src="{{ asset(Auth::user()->photo) }}" alt="">--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
                                <div class="header-nav-right_log-hide d-n">
                                    <a class="" href="{{ asset(app()->getLocale().'/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        @lang('user_nav.nav9')
                                    </a>
                                    <form id="logout-form" action="{{ route('logout', app()->getLocale()) }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                    <a class="pl-2" href="{{ asset(app()->getLocale().'/customer/profile') }}" >
                                        @lang('user_nav.nav10')
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <a class="h-line_w cl-w mr-2" href="#" data-toggle="modal" data-target="#login-modal-r">
                            @lang('user_nav.nav8')
                        </a>
                    @endauth
                        <div class="d-f ai-b favorit-prod">
                            <a href="{{ asset(app()->getLocale().'/customer/favorites') }}" class="nav-img d-f ai-b ml-3">
                                <svg viewBox="0 0 28 28" id="heart"><path d="M24.903 5.335l.026.028a8.55 8.55 0 0 1-.647 11.831c-.817.78-2.285 2.037-4.274 3.679l-.293.24c-.855.704-1.756 1.438-2.76 2.25l-1.948 1.572c-.483.435-1.218.435-1.658.034-2.732-1.994-7.931-6.087-9.554-7.638a8.377 8.377 0 0 1-.51-11.996C6.151 2.442 10.75 2.21 13.878 4.79a.36.36 0 0 0 .431.011 7.866 7.866 0 0 1 10.594.535"></path></svg>
                            </a>
                            <div class="favorit-prod_amount cl-w ml-1">
                                @auth
                                    {{ count(Auth::user()->favorites_products) }}
                                @else
                                    @if(session('products.favorites'))
                                        {{ count(session('products.favorites'))}}
                                    @else
                                        0
                                    @endif
                                @endauth
                            </div>
                        </div>
                        <div class="d-f ai-b basket-prod">
                            <a href="{{ asset(app()->getLocale().'/bucket') }}" class="nav-img d-f ai-b ml-3">
                                <svg viewBox="0 0 28 28" id="bag"><path d="M8.466 8c1.913-6.5 9.155-6.5 11.068 0H23.5a.51.51 0 0 1 .5.5v15a.51.51 0 0 1-.5.5h-19a.51.51 0 0 1-.5-.5v-15a.51.51 0 0 1 .5-.5h3.966zm1.05 0h8.968c-1.72-5.167-7.248-5.167-8.968 0z"></path></svg>
    {{--                        <div class="basket-prod_name t-u cl-w p-a">--}}
    {{--                            @lang('user_nav.nav11')--}}
    {{--                        </div>--}}
    {{--                        <img src="{{ asset('img/shopping-bag.png') }}">--}}
    {{--                        <i class="fas fa-2x fa-shopping-bag cl-w"></i>--}}
    {{--                        <svg id="bag" viewBox="0 -10 490 550">--}}
    {{--                            <path d="m440.1 422.7l-28-315.3c-0.6-7-6.5-12.3-13.4-12.3h-57.6c-0.8-52.6-43.8-95.1-96.6-95.1s-95.8 42.5-96.6 95.1h-57.6c-7 0-12.8 5.3-13.4 12.3l-28 315.3c0 0.4-0.1 0.8-0.1 1.2 0 35.9 32.9 65.1 73.4 65.1h244.6c40.5 0 73.4-29.2 73.4-65.1 0-0.4 0-0.8-0.1-1.2zm-195.6-395.7c37.9 0 68.8 30.4 69.6 68.1h-139.2c0.8-37.7 31.7-68.1 69.6-68.1zm122.3 435h-244.6 0 0 0 0"></path>--}}
    {{--                        </svg>--}}
                            </a>
                            <div class="basket-prod_amount cl-w ml-1">0</div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<nav class="float_top_menu d-n">
    <div class="container">
        <div class="row d-f ai-c jc-b p-r header-block_navigation py-2">
            <div class="col-12 d-f ai-c jc-b w-1p">
                <div class="menu d-f ai-s jc-s">
                    <button class="menu-toggle active mr-3 p-a">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <div class="menu-txt cl-w p-a">Каталог</div>
                    </button>
                    @include('user.app.layouts.nav-shablon.nav-dinamic')
                </div>
                <div class="d-f jc-c logo">
                    <div class="h-1p p-r">
                        <a href="{{ asset(app()->getLocale()) }}" class="logo-link d-f ai-c jc-c p-a">
                            <img class="h-1p"  src="{{ asset('img/logo_4.png') }}">
                        </a>
                    </div>
                </div>
                <div class="d-f ai-c jc-e p-r">
                    @auth
                        <div class="header-nav-right d-f ai-b jc-e p-r">
                            <div class="contact-header header-nav-right_log cl-w t-c">
                                <div class="d-f ai-c jc-c">
                                    <div class="mr-2 contact-header_icon">
                                        <svg viewBox="0 0 256 256">
                                            <polyline fill="none" stroke-width="16" stroke-linejoin="round" stroke-linecap="round" points="16,72 128,184 240,72"></polyline>
                                        </svg>
                                    </div>
                                    <div class="d-f ai-c jc-c">
                                        <div>
                                            {{ (isset(Auth::user()->name)) ? Auth::user()->name .' '.Auth::user()->surname : Auth::user()->email }}
                                        </div>
                                    </div>
                                </div>
                                <div class="header-nav-right_log-hide d-n">
                                    <a class="" href="{{ asset(app()->getLocale().'/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        @lang('user_nav.nav9')
                                    </a>
                                    <a class="pl-2" href="{{ asset(app()->getLocale().'/customer/profile') }}" >
                                        @lang('user_nav.nav10')
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <a class="h-line_w cl-w mr-2" href="#" data-toggle="modal" data-target="#login-modal-r">
                            @lang('user_nav.nav8')
                        </a>
                    @endauth
                    <div class="d-f ai-b favorit-prod">
                        <a href="{{ asset(app()->getLocale().'/customer/favorites') }}" class="nav-img d-f ai-b ml-3">
                            <svg viewBox="0 0 28 28" id="heart"><path d="M24.903 5.335l.026.028a8.55 8.55 0 0 1-.647 11.831c-.817.78-2.285 2.037-4.274 3.679l-.293.24c-.855.704-1.756 1.438-2.76 2.25l-1.948 1.572c-.483.435-1.218.435-1.658.034-2.732-1.994-7.931-6.087-9.554-7.638a8.377 8.377 0 0 1-.51-11.996C6.151 2.442 10.75 2.21 13.878 4.79a.36.36 0 0 0 .431.011 7.866 7.866 0 0 1 10.594.535"></path></svg>
                        </a>
                        <div class="favorit-prod_amount cl-w ml-1">
                            @auth
                                {{ count(Auth::user()->favorites_products) }}
                            @else
                                @if(session('products.favorites'))
                                    {{ count(session('products.favorites'))}}
                                @else
                                    0
                                @endif
                            @endauth
                        </div>
                    </div>
                    <div class="d-f ai-b basket-prod">
                        <a href="{{ asset(app()->getLocale().'/bucket') }}" class="nav-img d-f ai-b ml-3">
                            <svg viewBox="0 0 28 28" id="bag"><path d="M8.466 8c1.913-6.5 9.155-6.5 11.068 0H23.5a.51.51 0 0 1 .5.5v15a.51.51 0 0 1-.5.5h-19a.51.51 0 0 1-.5-.5v-15a.51.51 0 0 1 .5-.5h3.966zm1.05 0h8.968c-1.72-5.167-7.248-5.167-8.968 0z"></path></svg>
                        </a>
                        <div class="basket-prod_amount cl-w ml-1">0</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<nav class="pt-2 pb-2 d-b dlg-n navMob">
    <div class="container">
        <div class="row menu py-2">
            <div class="col-2">
                <div id="menuMob_fun" class="menu d-f ai-s jc-s">
                    <button class="menu-toggle active">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <svg class="menu-toggle-cross d-n m-1" viewBox="0 0 28 28" id="cross">
                        <path d="M27 3.619L24.381 1 14 11.381 3.619 1 1 3.619 11.381 14 1 24.381 3.619 27 14 16.619 24.381 27 27 24.381 16.619 14z" fill="white"></path>
                    </svg>
                </div>
            </div>
            <div class="col-2 d-f ai-c jc-s p-0">
                <img class="search-icon" src="{{ asset('img/magnifying-glassWtn.png') }}">
            </div>
            <div class="col-4 d-f ai-c jc-c">
                <div class="logo">
                    <a href="{{ asset(app()->getLocale()) }}">
                        <img class="h-1p"  src="{{ asset('img/logo_4.png') }}">
                    </a>
                </div>
            </div>
            <div class="col-2 d-f ai-c favorit-prod">
                <a href="{{ asset(app()->getLocale().'/customer/favorites') }}" class="nav-img ml-3 p-r">
                    <svg viewBox="0 0 28 28" id="heart"><path d="M24.903 5.335l.026.028a8.55 8.55 0 0 1-.647 11.831c-.817.78-2.285 2.037-4.274 3.679l-.293.24c-.855.704-1.756 1.438-2.76 2.25l-1.948 1.572c-.483.435-1.218.435-1.658.034-2.732-1.994-7.931-6.087-9.554-7.638a8.377 8.377 0 0 1-.51-11.996C6.151 2.442 10.75 2.21 13.878 4.79a.36.36 0 0 0 .431.011 7.866 7.866 0 0 1 10.594.535"></path></svg>
                    <div class="amountIconHead favorit-prod_amount cl-w p-a">
                        @auth
                            {{ count(Auth::user()->favorites_products) }}
                        @else
                            @if(session('products.favorites'))
                            {{ count(session('products.favorites'))}}
                            @else
                                0
                            @endif
                        @endauth
                    </div>
                </a>
            </div>
            <div class="col-2 d-f jc-c ai-c basket-prod">
{{--                <a href="{{ asset(app()->getLocale().'/bucket') }}" class="nav-img p-r">--}}
                <div id="bucketMob_fun" class="nav-img p-r">
                    <svg viewBox="0 0 28 28" id="bag"><path d="M8.466 8c1.913-6.5 9.155-6.5 11.068 0H23.5a.51.51 0 0 1 .5.5v15a.51.51 0 0 1-.5.5h-19a.51.51 0 0 1-.5-.5v-15a.51.51 0 0 1 .5-.5h3.966zm1.05 0h8.968c-1.72-5.167-7.248-5.167-8.968 0z"></path></svg>
                    <div class="amountIconHead basket-prod_amount cl-w p-a">0</div>
                </div>
                {{--                </a>--}}
            </div>
        </div>
    </div>
    <div class="d-b dlg-n">
        <div id="menuMobSearch" class="menu-search hideSearchBlock">
            <form class="searchMob" action="{{ asset(app()->getLocale().'/search/submit') }}" method="get" id="mobile-search-form">
                {{--search input--}}
                <input style="z-index: 500" form="mobile-search-form" id="searchMob" type="text" name="search" class="search-inputMob search-toggle"  data-block="quick-search-blockMob" data-url="{{ asset(app()->getLocale().'/search/mobile') }}" maxlength="128" autocomplete="off" placeholder="Поиск"  value="{{ $search ?? '' }}">
                <img style="z-index: 500" class="search-iconMob" src="{{ asset('img/magnifying-glass.png') }}">
            </form>
            <div class="quick-search-block hideSearchBlock" id="quick-search-blockMob"></div>
        </div>
    </div>
</nav>
