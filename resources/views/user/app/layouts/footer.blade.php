<footer class="footer-block p-r mt-0 mt-lg-5">
    <div class="footer-block_top pt-4 pb-4">
        <div class="container">
            <div class="row footer-block_top-header cl-w pb-3 d-f ai-s jc-b">
                <div class="col-12 col-lg-3 logoFoot-mob">
                    <img class="h-1p footer-logo pb-2" src="{{ asset('img/logo_4.png') }}">
                    <div class="footer-font_m d-b dlg-n mt-3 cl-w">0 800 211 999</div>
                </div>
                <div class="col-12 col-lg-3 mt-3 mt-lg-0">
                    <div class="t-u footer-font_b">
                        <p class="d-n dlg-b">Каталог</p>
                        <div class="d-b dlg-n">
                            <div class="sel-cust">
                                <div class="select-custFoot d-f ai-s jc-b footerCategoryMob">
                                    <div class="nav-item">
                                        <div class="select-custFoot_hide o-h">
                                            <div class="active no-a">
                                                <a class="header-list p-0 mainArticleFooter" href="#">
                                                    Каталог
                                                </a>
                                            </div>
                                            <div class="active-option fd-c">
                                                @foreach($market_nav_categories as $key => $category)
                                                    <a href="{{ asset(app()->getLocale().'/categories/'.$category->alias) }}" class="header-list p-0 menu_link cl-w">
                                                        {{ $category->getNameTran() }}
                                                    </a>
                                                @endforeach
                                                <a href="#" class="header-list p-0 menu_link cl-w">
                                                    @lang('user_footer.foot10')
                                                </a>
                                                <a href="#" class="header-list p-0 menu_link cl-w">
                                                    @lang('user_footer.foot11')
                                                </a>
                                                <a href="#" class="header-list p-0 menu_link cl-w">
                                                    @lang('user_footer.foot13')
                                                </a>
                                                <a href="#" class="header-list p-0 menu_link cl-r t-u">
                                                    sale %
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="header_iconFoot">
                                        <svg viewBox="0 0 256 256">
                                            <polyline fill="none" stroke-width="16" stroke-linejoin="round" stroke-linecap="round" points="16,72 128,184 240,72"></polyline>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3"></div>
                <div class="col-12 col-lg-3 mt-3 mt-lg-0">
                    <div class="t-u footer-font_b">
                        <p class="d-n dlg-b footerCategoryMob">@lang('user_footer.foot2')</p>
                        <div class="d-b dlg-n">
                            <div class="sel-cust">
                                <div class="select-custFoot d-f ai-s jc-b footerCategoryMob">
                                    <div class="nav-item">
                                        <div class="select-custFoot_hide o-h">
                                            <div class="active no-a">
                                                <a class="header-list p-0 mainArticleFooter" href="#">
                                                    @lang('user_footer.foot2')
                                                </a>
                                            </div>
                                            <div class="active-option fd-c">
                                                <a href="#" class="header-list p-0 menu_link cl-w">
                                                    @lang('user_footer.foot14')
                                                </a>
                                                <a href="{{ asset(app()->getLocale().'/shipping-and-payment') }}" class="header-list p-0 menu_link cl-w">
                                                    @lang('user_footer.foot15')
                                                </a>
                                                <a href="{{ asset(app()->getLocale().'/exchange-and-return') }}" class="header-list p-0 menu_linkcl-w">
                                                    @lang('user_footer.foot16')
                                                </a>
                                                <a href="{{ asset(app()->getLocale().'/question-and-answer') }}" class="header-list p-0 menu_link cl-w">
                                                    @lang('user_footer.foot17')
                                                </a>
                                                <a href="{{ asset(app()->getLocale().'/news') }}" class="header-list p-0 menu_link cl-w">
                                                    @lang('user_footer.foot18')
                                                </a>
                                                <a href="{{ asset(app()->getLocale().'/terms-of-use') }}" class="header-list p-0 menu_link cl-w">
                                                    @lang('user_footer.foot23')
                                                </a>
                                                <a href="{{ asset(app()->getLocale().'/contacts') }}" class="header-list p-0 menu_link cl-w">
                                                    @lang('user_footer.foot24')
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="header_iconFoot">
                                        <svg viewBox="0 0 256 256">
                                            <polyline fill="none" stroke-width="16" stroke-linejoin="round" stroke-linecap="round" points="16,72 128,184 240,72"></polyline>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row cl-w pb-3 d-f ai-s jc-b">
                <div class="col-3 cl-w">
                    <div class="footer-font_m d-n dlg-b d-n dlg-b">0 800 211 999</div>
                    <div class="mt-3 mb-2 footer-font_b d-n dlg-b">
                        @lang('user_footer.foot1')
                    </div>
                    <div class="footer-font_m d-n dlg-b">
                        Пн-Сб 09:00-19:00;<br>
                        Вс 09:00-19:00
                    </div>
                </div>
                <div class="col-12 d-b dlg-n">
                    <div class="d-f ai-c jc-c">
                        <a class="m-3" href="#">
                            <i class="fab fa-2x fa-facebook-square cl-w"></i>
                        </a>
                        <a class="m-3" href="#">
                            <i class="fab fa-2x fa-instagram cl-w"></i>
                        </a>
                    </div>
                </div>
                <div class="col-12 d-b dlg-n">
                    <div class="sel-cust">
                        <div class="select-custFoot d-f ai-s jc-b footerCategoryMob">
                            @if(app()->getLocale() == 'ru')
                                <li class="nav-item">
                                    <div class="select-custFoot_hide o-h">
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
                                    <div class="select-custFoot_hide o-h">
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
                            <div class="header_iconFoot">
                                <svg viewBox="0 0 256 256">
                                    <polyline fill="none" stroke-width="16" stroke-linejoin="round" stroke-linecap="round" points="16,72 128,184 240,72"></polyline>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($market_nav_categories->chunk(7) as $key => $chunk)
                <div class="col-3 cl-w">
                    <ul class="menu submenu p-0 d-f ai-s jc-c fd-c cl-w">
                        @foreach($chunk as $category)
                            <li class="menu_item">
                                <a href="{{ asset(app()->getLocale().'/categories/'.$category->alias) }}" class="menu_link cl-w">
                                    {{ $category->getNameTran() }}
                                </a>
                            </li>
                        @endforeach
                        @if($key == 1)
                            <li class="menu_item">
                                <a href="#" class="menu_link cl-w">
                                   @lang('user_footer.foot10')
                                </a>
                            </li>
                            <li class="menu_item">
                                <a href="#" class="menu_link cl-w">
                                 @lang('user_footer.foot11')
                                </a>
                            </li>
                            <li class="menu_item">
                                <a href="#" class="menu_link cl-w">
                                   @lang('user_footer.foot13')
                                </a>
                            </li>
                            <br>
                            <li class="menu_item">
                                <a href="#" class="menu_link cl-r t-u">
                                    sale %
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
                @endforeach
                <div class="col-3 cl-w">
                    <ul class="menu submenu p-0 d-f ai-s jc-c fd-c cl-w">
                        <li class="menu_item">
                            <a href="#" class="menu_link cl-w">
                                @lang('user_footer.foot14')
                            </a>
                        </li>
                        <li class="menu_item">
                            <a href="{{ asset(app()->getLocale().'/shipping-and-payment') }}" class="menu_link cl-w">
                                @lang('user_footer.foot15')
                            </a>
                        </li>
                        <li class="menu_item">
                            <a href="{{ asset(app()->getLocale().'/exchange-and-return') }}" class="menu_link cl-w">
                                @lang('user_footer.foot16')
                            </a>
                        </li>
                        <li class="menu_item">
                            <a href="{{ asset(app()->getLocale().'/question-and-answer') }}" class="menu_link cl-w">
                                @lang('user_footer.foot17')
                            </a>
                        </li>
                        <li class="menu_item">
                            <a href="{{ asset(app()->getLocale().'/news') }}" class="menu_link cl-w">
                                @lang('user_footer.foot18')
                            </a>
                        </li>
                        <li class="menu_item">
                            <a href="{{ asset(app()->getLocale().'/terms-of-use') }}" class="menu_link cl-w">
                                @lang('user_footer.foot23')
                            </a>
                        </li>
                        <li class="menu_item">
                            <a href="{{ asset(app()->getLocale().'/contacts') }}" class="menu_link cl-w">
                                @lang('user_footer.foot24')
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-block_bottom container pt-4 pb-4 d-b dlg-n">
        <div class="row">
            <div class="col-12 d-f ai-c jc-b fd-r">
                <a class="" href="#">
                    <img class="w-8p m-2" src="{{ asset('img/svg/np.svg') }}">
                </a>
                <a class="" href="#">
                    <img class="w-8p m-2" src="{{ asset('img/svg/pb.svg') }}">
                </a>
                <a class="" href="#">
                    <img class="w-8p m-2" src="{{ asset('img/svg/visa.svg') }}">
                </a>
                <a class="" href="#">
                    <img class="w-8p m-2" src="{{ asset('img/svg/mc.svg') }}">
                </a>
                <a class="" href="#">
                    <img class="w-8p m-2" src="{{ asset('img/svg/lqp.svg') }}">
                </a>
            </div>
        </div>
    </div>
    <div class="footer-block_bottom container pt-4 pb-4 d-n dlg-b">
        <div class="row cl-w pb-3 d-f ai-s jc-b w-1p">
            <div class="col-4 col-lg-3 cl-g footer-font_m d-f fd-c">
                <div class="d-f">
                    <span>@lang('user_footer.foot19')</span>
                </div>
                <div class="d-f ai-c jc-s iconFoot-mob">
                    <a class="pl-2 pr-2" href="#">
                        <img src="{{ asset('img/svg/np.svg') }}">
                    </a>
                    <a class="pl-2 pr-2" href="#">
                        <img src="{{ asset('img/svg/pb.svg') }}">
                    </a>
                </div>
            </div>
            <div class="col-4 col-lg-3 cl-g footer-font_m d-f fd-c">
                <div class="d-f">
                    <span>@lang('user_footer.foot20')</span>
                </div>
                <div class="d-f ai-c jc-s iconFoot-mob">
                    <a class="pl-2 pr-2" href="#">
                        <img src="{{ asset('img/svg/visa.svg') }}">
                    </a>
                    <a class="pl-2 pr-2" href="#">
                        <img src="{{ asset('img/svg/mc.svg') }}">
                    </a>
                </div>
            </div>
            <div class="col-4 col-lg-3 cl-g footer-font_m d-f fd-c">
                <div class="d-f">
                    <span>@lang('user_footer.foot21')</span>
                </div>
                <div class="d-f ai-c jc-s iconFoot-mob">
                    <a class="pl-2 pr-2" href="#">
                        <img src="{{ asset('img/svg/lqp.svg') }}">
                    </a>
                </div>
            </div>
            <div class="col-lg-3 cl-g footer-font_m d-f fd-c">
                <div class="d-f">
                    <span>@lang('user_footer.foot22')</span>
                </div>
                <div class="d-f ai-c jc-s">
                    <a class="pl-2 pr-2 d-n dlg-b" href="#">
                        <i class="fab fa-2x fa-facebook-square cl-b"></i>
                    </a>
                    <a class="pl-2 pr-2 d-n dlg-b" href="#">
                        <img class="soc-net_insta" src="{{ asset('img/instagram.png') }}">
                    </a>
                    <a class="pl-2 pr-2 d-n dlg-b" href="#">
                        <i class="fab fa-2x fa-youtube-square cl-r"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
