<div class="row">
    <div class="col-12 mega-menu header-block_navigation-cont overlayMenu pb-3 open-static">
    <ul class="nav-prod d-f ai-s jc-c fd-c">
        @forelse($market_nav_categories as $step_cat => $category)
            <li class="menu_item">
                <a href="{{ asset(app()->getLocale().'/categories/'.$category->alias) }}" class="menu_link @if($step_cat == 0) active @endif">
                    {{ $category->getNameTran() }}
                </a>
                <div class="mega-submenu">
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

                        <div class="section promotions p-0">
                            <a href="#" class="promo promo 1">
                                <img src="{{ asset($category->image_thumb) }}" class="thumb" alt="{{ $category->getNameTran() }}"/>
                            </a>
                        </div>
                    </div>
                </div>
            </li>

            @if($step_cat == 6)
                <li class="menu_item">
                    <a href="#" class="menu_link">
                        @lang('user_menu.menu8')
                    </a>
                    <div class="mega-submenu">
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
                            <div class="section promotions p-0">
                                <a href="#" class="promo promo 1">
                                    <img src="https://i1.zolotoyvek.ua/media/banner/image/cache/294x508-frame-255-255-255-zoom/_/2/_294_508_1.jpg" class="thumb"/>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="menu_item">
                    <a href="#" class="menu_link">
                        @lang('user_menu.menu9')
                    </a>
                    <div class="mega-submenu">
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
                            <div class="section promotions p-0">
                                <a href="#" class="promo promo 1">
                                    <img src="https://i1.zolotoyvek.ua/media/banner/image/cache/294x508-frame-255-255-255-zoom/_/2/_294_508_1.jpg" class="thumb"/>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            @endif

            @if($step_cat == 7)
                <li class="menu_item">
                    <a href="#" class="menu_link">
                        @lang('user_menu.menu11')
                    </a>
                    <div class="mega-submenu">
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
                            <div class="section promotions p-0">
                                <a href="#" class="promo promo 1">
                                    <img src="https://i1.zolotoyvek.ua/media/banner/image/cache/294x508-frame-255-255-255-zoom/_/2/_294_508_1.jpg" class="thumb"/>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="menu_item">
                    <a href="#" class="menu_link cl-r td-u_cl-r t-u">Sale %</a>
                    <div class="mega-submenu">
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
                            <div class="section promotions p-0">
                                <a href="#" class="promo promo 1">
                                    <img src="https://i1.zolotoyvek.ua/media/banner/image/cache/294x508-frame-255-255-255-zoom/_/2/_294_508_1.jpg" class="thumb"/>
                                </a>
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
