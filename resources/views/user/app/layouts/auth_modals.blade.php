<div class="container demo">
    <div class="dlg-n modal left fade" id="modal-mobile-menu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog w-100" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <ul class="nav-prod nav-Mobprod d-f ai-s jc-c fd-c p-0">
                        @forelse($market_nav_categories as $step_cat => $category)
                            <li class="menu_itemMob">
                                <svg class="itemMob" viewBox="0 0 256 256">
                                    <polyline fill="none" stroke="#000" stroke-width="16" stroke-linejoin="round" stroke-linecap="round" points="16,72 128,184 240,72"></polyline>
                                </svg>
                                <a class="menu_link @if($step_cat == 0)  @endif">
                                    {{ $category->getNameTran() }}
                                </a>
                                <div class="mega-submenu d-n">
                                    <div class="submenu-content w-1p h-1p d-f ai-s jc-c">
                                        @if(count($category->subcategories) > 5)
                                            @foreach($category->subcategories->chunk(6) as $step_chunk => $chunk)
                                                <div class="section links">
                                                    <ul>
                                                        @foreach($chunk as $subcategory)
                                                            <li>
                                                                <a class="d-f ai-c jc-e fd-rr" href="{{ asset(app()->getLocale().'/subcategories/'.$subcategory->alias) }}">{{ $subcategory->getNameTran() }}
                                                                    @if($subcategory->image_thumb != null)
                                                                        <img src="{{ asset($subcategory->image_thumb) }}" alt="{{ $subcategory->getNameTran() }}">
                                                                    @else
                                                                        <img src="{{ asset('images/no_foto.png') }}" alt="no image found">
                                                                    @endif
                                                                </a>
                                                            </li>
                                                        @endforeach

                                                        @if($step_chunk == 1)
                                                            <li><a class="d-f ai-c jc-c fd-rr p-3 all-prod" href="{{ asset(app()->getLocale().'/categories/'.$category->alias) }}">Все товары</a></li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="section links">
                                                <ul>
                                                    @foreach($category->subcategories as $subcategory)
                                                        <li>
                                                            <a class="d-f ai-c jc-e fd-rr" href="{{ asset(app()->getLocale().'/subcategories/'.$subcategory->alias) }}">{{ $subcategory->getNameTran() }}
                                                                @if($subcategory->image_thumb != null)
                                                                    <img src="{{ asset($subcategory->image_thumb) }}" alt="{{ $subcategory->getNameTran() }}">
                                                                @else
                                                                    <img src="{{ asset('images/no_foto.png') }}" alt="no image found">
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                    <li><a class="d-f ai-c jc-c fd-rr p-3 all-prod" href="{{ asset(app()->getLocale().'/categories/'.$category->alias) }}">Все товары</a></li>
                                                </ul>
                                            </div>
                                            <div class="section links"></div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            @if($step_cat == 6)
                                <li class="menu_itemMob">
                                    <a class="menu_link">
                                        <svg class="itemMob" viewBox="0 0 256 256">
                                            <polyline fill="none" stroke="#000" stroke-width="16" stroke-linejoin="round" stroke-linecap="round" points="16,72 128,184 240,72"></polyline>
                                        </svg>
                                        @lang('user_menu.menu8')
                                    </a>
                                    <div class="mega-submenu d-n">
                                        <div class="submenu-content w-1p h-1p d-f ai-s jc-c">
                                            <div class="section links">
                                                <ul>
                                                    <li><a class="d-f ai-c jc-e fd-rr" href="#">Бриллиант
                                                            <img src="https://i2.zolotoyvek.ua/media/catalog/product/cache/cat_resized/142x14210159_3-new.jpg" alt="category img">
                                                        </a>
                                                    </li>
                                                    <li><a class="d-f ai-c jc-e fd-rr" href="#">Сапфир
                                                            <img src="https://i2.zolotoyvek.ua/media/catalog/product/cache/cat_resized/142x14210159_3-new.jpg" alt="category img">
                                                        </a>
                                                    </li>
                                                    <li><a class="d-f ai-c jc-e fd-rr" href="#">Агат
                                                            <img src="https://i2.zolotoyvek.ua/media/catalog/product/cache/cat_resized/142x14210159_3-new.jpg" alt="category img">
                                                        </a>
                                                    </li>
                                                    <li><a class="d-f ai-c jc-e fd-rr" href="#">Аметист
                                                            <img src="https://i2.zolotoyvek.ua/media/catalog/product/cache/cat_resized/142x14210159_3-new.jpg" alt="category img">
                                                        </a>
                                                    </li>
                                                    <li><a class="d-f ai-c jc-e fd-rr" href="#">Гранат
                                                            <img src="https://i2.zolotoyvek.ua/media/catalog/product/cache/cat_resized/142x14210159_3-new.jpg" alt="category img">
                                                        </a>
                                                    </li>
                                                    <li><a class="d-f ai-c jc-e fd-rr" href="#">Топаз swiss
                                                            <img src="https://i2.zolotoyvek.ua/media/catalog/product/cache/cat_resized/142x14210159_3-new.jpg" alt="category img">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="section links">
                                                <ul>
                                                    <li><a class="d-f ai-c jc-e fd-rr" href="#">Кварц зеленый
                                                            <img src="https://i2.zolotoyvek.ua/media/catalog/product/cache/cat_resized/142x14210159_3-new.jpg" alt="category img">
                                                        </a>
                                                    </li>
                                                    <li><a class="d-f ai-c jc-e fd-rr" href="#">Кварц голубой
                                                            <img src="https://i2.zolotoyvek.ua/media/catalog/product/cache/cat_resized/142x14210159_3-new.jpg" alt="category img">
                                                        </a>
                                                    </li>
                                                    <li><a class="d-f ai-c jc-e fd-rr" href="#">Жемчуг
                                                            <img src="https://i2.zolotoyvek.ua/media/catalog/product/cache/cat_resized/142x14210159_3-new.jpg" alt="category img">
                                                        </a>
                                                    </li>
                                                    <li><a class="d-f ai-c jc-c fd-rr p-3 all-prod" href="#">Все товары</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="menu_itemMob">
                                    <a class="menu_link">
                                        <svg class="itemMob" viewBox="0 0 256 256">
                                            <polyline fill="none" stroke="#000" stroke-width="16" stroke-linejoin="round" stroke-linecap="round" points="16,72 128,184 240,72"></polyline>
                                        </svg>
                                        @lang('user_menu.menu9')
                                    </a>
                                    <div class="mega-submenu d-n">
                                        <div class="submenu-content w-1p h-1p d-f ai-s jc-c">
                                            <div class="section links">
                                                <ul>
                                                    <li><a class="d-f ai-c jc-e fd-rr" href="#">Кольца
                                                            <img src="https://i2.zolotoyvek.ua/media/catalog/product/cache/cat_resized/142x14210159_3-new.jpg" alt="category img">
                                                        </a>
                                                    </li>
                                                    <li><a class="d-f ai-c jc-e fd-rr" href="#">Серьги
                                                            <img src="https://i2.zolotoyvek.ua/media/catalog/product/cache/cat_resized/142x14210159_3-new.jpg" alt="category img">
                                                        </a>
                                                    </li>
                                                    <li><a class="d-f ai-c jc-e fd-rr" href="#">Кулоны
                                                            <img src="https://i2.zolotoyvek.ua/media/catalog/product/cache/cat_resized/142x14210159_3-new.jpg" alt="category img">
                                                        </a>
                                                    </li>
                                                    <li><a class="d-f ai-c jc-e fd-rr" href="#">Все товары
                                                            <img src="https://i2.zolotoyvek.ua/media/catalog/product/cache/cat_resized/142x14210159_3-new.jpg" alt="category img">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="section links"></div>
                                        </div>
                                    </div>
                                </li>
                            @endif
                            @if($step_cat == 7)
                                <li class="menu_itemMob">
                                    <a class="menu_link">
                                        <svg class="itemMob" viewBox="0 0 256 256">
                                            <polyline fill="none" stroke="#000" stroke-width="16" stroke-linejoin="round" stroke-linecap="round" points="16,72 128,184 240,72"></polyline>
                                        </svg>
                                        @lang('user_menu.menu11')
                                    </a>
                                    <div class="mega-submenu d-n">
                                        <div class="submenu-content w-1p h-1p d-f ai-s jc-c">
                                            <div class="section links">
                                                <ul>
                                                    <li><a class="d-f ai-c jc-e fd-rr" href="#">1
                                                            <img src="https://i2.zolotoyvek.ua/media/catalog/product/cache/cat_resized/142x14210159_3-new.jpg" alt="category img">
                                                        </a>
                                                    </li>
                                                    <li><a class="d-f ai-c jc-e fd-rr" href="#">2
                                                            <img src="https://i2.zolotoyvek.ua/media/catalog/product/cache/cat_resized/142x14210159_3-new.jpg" alt="category img">
                                                        </a>
                                                    </li>
                                                    <li><a class="d-f ai-c jc-e fd-rr" href="#">3
                                                            <img src="https://i2.zolotoyvek.ua/media/catalog/product/cache/cat_resized/142x14210159_3-new.jpg" alt="category img">
                                                        </a>
                                                    </li>
                                                    <li><a class="d-f ai-c jc-e fd-rr" href="#">4
                                                            <img src="https://i2.zolotoyvek.ua/media/catalog/product/cache/cat_resized/142x14210159_3-new.jpg" alt="category img">
                                                        </a>
                                                    </li>
                                                    <li><a class="d-f ai-c jc-e fd-rr" href="#">5
                                                            <img src="https://i2.zolotoyvek.ua/media/catalog/product/cache/cat_resized/142x14210159_3-new.jpg" alt="category img">
                                                        </a>
                                                    </li>
                                                    <li><a class="d-f ai-c jc-e fd-rr" href="#">6
                                                            <img src="https://i2.zolotoyvek.ua/media/catalog/product/cache/cat_resized/142x14210159_3-new.jpg" alt="category img">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="section links">
                                                <ul>
                                                    <li><a class="d-f ai-c jc-e fd-rr" href="#">7
                                                            <img src="https://i2.zolotoyvek.ua/media/catalog/product/cache/cat_resized/142x14210159_3-new.jpg" alt="category img">
                                                        </a>
                                                    </li>
                                                    <li><a class="d-f ai-c jc-e fd-rr" href="#">8
                                                            <img src="https://i2.zolotoyvek.ua/media/catalog/product/cache/cat_resized/142x14210159_3-new.jpg" alt="category img">
                                                        </a>
                                                    </li>
                                                    <li><a class="d-f ai-c jc-e fd-rr" href="#">9
                                                            <img src="https://i2.zolotoyvek.ua/media/catalog/product/cache/cat_resized/142x14210159_3-new.jpg" alt="category img">
                                                        </a>
                                                    </li>
                                                    <li><a class="d-f ai-c jc-e fd-rr" href="#">10
                                                            <img src="https://i2.zolotoyvek.ua/media/catalog/product/cache/cat_resized/142x14210159_3-new.jpg" alt="category img">
                                                        </a>
                                                    </li>
                                                    <li><a class="d-f ai-c jc-e fd-rr" href="#">11
                                                            <img src="https://i2.zolotoyvek.ua/media/catalog/product/cache/cat_resized/142x14210159_3-new.jpg" alt="category img">
                                                        </a>
                                                    </li>
                                                    <li><a class="d-f ai-c jc-c fd-rr p-3 all-prod" href="#">Все товары</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="menu_itemMob">
                                    <svg class="itemMob" viewBox="0 0 256 256">
                                        <polyline fill="none" stroke="#000" stroke-width="16" stroke-linejoin="round" stroke-linecap="round" points="16,72 128,184 240,72"></polyline>
                                    </svg>
                                    <a class="menu_link cl-r td-u_cl-r t-u">Sale %</a>
                                    <div class="mega-submenu d-n">
                                        <div class="submenu-content w-1p h-1p d-f ai-s jc-c">
                                            <div class="section links">
                                                <ul>
                                                    <li><a class="d-f ai-c jc-e fd-rr" href="#">Кольца
                                                            <img src="https://i2.zolotoyvek.ua/media/catalog/product/cache/cat_resized/142x14210159_3-new.jpg" alt="category img">
                                                        </a>
                                                    </li>
                                                    <li><a class="d-f ai-c jc-e fd-rr" href="#">Серьги
                                                            <img src="https://i2.zolotoyvek.ua/media/catalog/product/cache/cat_resized/142x14210159_3-new.jpg" alt="category img">
                                                        </a>
                                                    </li>
                                                    <li><a class="d-f ai-c jc-e fd-rr" href="#">Кулоны
                                                            <img src="https://i2.zolotoyvek.ua/media/catalog/product/cache/cat_resized/142x14210159_3-new.jpg" alt="category img">
                                                        </a>
                                                    </li>
                                                    <li><a class="d-f ai-c jc-e fd-rr" href="#">Цепочки
                                                            <img src="https://i2.zolotoyvek.ua/media/catalog/product/cache/cat_resized/142x14210159_3-new.jpg" alt="category img">
                                                        </a>
                                                    </li>
                                                    <li><a class="d-f ai-c jc-e fd-rr" href="#">Браслеты
                                                            <img src="https://i2.zolotoyvek.ua/media/catalog/product/cache/cat_resized/142x14210159_3-new.jpg" alt="category img">
                                                        </a>
                                                    </li>
                                                    <li><a class="d-f ai-c jc-e fd-rr" href="#">Шармы
                                                            <img src="https://i2.zolotoyvek.ua/media/catalog/product/cache/cat_resized/142x14210159_3-new.jpg" alt="category img">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="section links">
                                                <ul>
                                                    <li><a class="d-f ai-c jc-e fd-rr" href="#">С натуральными камнями
                                                            <img src="https://i2.zolotoyvek.ua/media/catalog/product/cache/cat_resized/142x14210159_3-new.jpg" alt="category img">
                                                        </a>
                                                    </li>
                                                    <li><a class="d-f ai-c jc-c fd-rr p-3 all-prod" href="#">Все товары</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @empty
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="dlg-n modal right fade" id="modal-mobile-busket"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog w-100" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-f flex-sm-column flex-row">
                        <a class="bucket_itemMob" href="{{ asset(app()->getLocale().'/bucket') }}">Перейти в корзину</a>
                    </div>
                    <div class="nav flex-sm-column flex-row d-f jc-c">
                        @auth
                            <div class="header-nav-right d-f ai-b jc-e p-r w-1p">
                                <div class="contact-header header-nav-right_log t-c w-1p p-0">
                                    <div class="d-f ai-c jc-c mt-4">
                                        <div class="d-f ai-c jc-c">
                                            <div>
                                                {{ (isset(Auth::user()->name)) ? Auth::user()->name .' '.Auth::user()->surname : Auth::user()->email }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="header-nav-right_log-hide d-f fd-c">
                                        <a class="bucket_itemMob d-f" href="{{ asset(app()->getLocale().'/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            @lang('user_nav.nav9')
                                        </a>
                                        <form id="logout-form" action="{{ route('logout', app()->getLocale()) }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                        <a class="bucket_itemMob d-f" href="{{ asset(app()->getLocale().'/customer/profile') }}" >
                                            @lang('user_nav.nav10')
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <a class="bucket_itemMob h-line_w" href="#" data-toggle="modal" data-target="#login-modal-r">
                                @lang('user_nav.nav8')
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container demo">
    <div class="dlg-n modal left fade" id="modal-mobile-filter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog w-100" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    Фильтры
                </div>
                <div class="modal-body">
{{--                    @include('user.category.show.layouts.sidebar_filter')--}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Login form modal--}}
<div class="container demo">
    <div class="modal right fade" id="login-modal-r" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-content_header cl-g d-f ai-c jc-c fd-c p-5">
                    <h3>Вход в аккаунт</h3>
                    {{--                    <p class="pt-3 mb-1">Войти с помощью соцсети:</p>--}}
                    {{--                    <div class="d-f ai-c jc-c">--}}
                    {{--                        <i class="fab fa-2x fa-facebook-square mr-1 cl-b"></i>--}}
                    {{--                        <i class="fab fa-2x fa-google-plus-square ml-1 cl-r"></i>--}}
                    {{--                    </div>--}}
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login', app()->getLocale()) }}" id="login-form">
                            @csrf
                            <input type="hidden" name="redirect" value="{{\Request::fullUrl()}}">
                            <div class="form-group row">
                                <input type="email" class="form-control" name="email" value="test@gmail.com" required autocomplete="email" autofocus placeholder="E-mail">
                            </div>

                            <div class="form-group row">
                                <input type="password" class="form-control" name="password" required autocomplete="current-password" value="11111111" placeholder="Пароль">
                                <button type="button" class="btn btn-primary p-a btn-password" data-toggle="modal" data-target="#reset-p-modal-r">
                                    Я забыл пароль
                                </button>
                            </div>

                            <div class="form-group row">
                                <div class="d-ib w-1p">
                                    <div class="form-check p-0">
                                        <button type="button" class="btn btn-primary w-1p t-u auth-submit bg-g b-c_g" form="login-form">
                                            Войти
                                        </button>
                                    </div>
{{--                                    <div class="mt-3 d-f ai-c jc-c fd-c">--}}
{{--                                        <div class="custom-control custom-checkbox">--}}
{{--                                            <input type="checkbox" class="custom-control-input" id="customCheck1">--}}
{{--                                            <label class="custom-control-label" for="customCheck1">Оставатся в системе</label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="d-ib w-1p">
                                    <div class="form-check p-0">
                                        <span class="d-f ai-c jc-c mt-2 mb-2">Нет аккаунта?</span>
                                        <button type="button" class="btn btn-primary w-1p t-u bg-g b-c_g"  data-toggle="modal" data-target="#reg-modal-r">
                                            Регистрация
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- reg form modal--}}
<div class="container demo">
    <div class="modal right fade" id="reg-modal-r" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card-body">
                        <form method="POST" action="{{ route('register', app()->getLocale()) }}" id="reg-form">
                            @csrf
                            <input type="hidden" name="redirect" value="{{\Request::fullUrl()}}">
                            <div class="form-group row">
                                <input type="text" class="form-control" name="name" placeholder="Имя" required>
                            </div>

                            <div class="form-group row">
                                <input type="text" class="form-control" name="surname"  placeholder="Фамилия" required>
                            </div>

                            <div class="form-group row">
                                <input type="email" class="form-control" name="email" required autocomplete="email" autofocus placeholder="E-mail">
                            </div>

                            <div class="form-group row">
                                <input type="password" class="form-control" name="password" required autocomplete="current-password"  placeholder="Пароль">
                            </div>

                            <div class="form-group row">
                                <input type="password" class="form-control" name="password_confirmation" required autocomplete="current-password"  placeholder="Повторите пароль">
                            </div>

                            <div class="form-group row mb-0">
                                <div class="w-1p">
                                    <button type="button" class="btn btn-primary w-1p t-u auth-submit bg-g b-c_g" form="reg-form">
                                        Регистрация
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- reset password form modal--}}
<div class="container demo">
    <div class="modal right fade" id="reset-p-modal-r" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card-body">

                        <form method="POST" action="{{ route('password.email', app()->getLocale()) }}" id="reset-pas-form">
                            @csrf

                            <div class="form-group row">
                                <input type="email" class="form-control" name="email" required autocomplete="email" autofocus placeholder="E-mail">
                            </div>

                            <div class="form-group row mb-0">
                                <div class="w-1p">
                                    <button type="button" class="btn btn-primary w-1p t-u auth-submit bg-g b-c_g" form="reset-pas-form">
                                        Восстановить пароль
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
