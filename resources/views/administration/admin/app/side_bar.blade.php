<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="profile-image">
                    @if(auth()->user()->photo != null)
                        <img class="img-xs rounded-circle" src="{{ asset(auth()->user()->photo) }}" alt="Profile image">
                    @else
                        <i class="fa fa-user-circle fa-2x"></i>
                    @endif
                    <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                    <p class="profile-name">{{ Auth::user()->name.' '.Auth::user()->surname }}</p>
                    @if(app()->getLocale() == 'ru')
                        <p class="designation">{{ Auth::user()->roles[0]->label_ru }}</p>
                    @elseif(app()->getLocale() == 'ua')
                        <p class="designation">{{ Auth::user()->roles[0]->label_ua }}</p>
                    @endif
                </div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ asset(app()->getLocale().'/admin') }}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Сводка</span>
            </a>
        </li>
        <li class="nav-item nav-category">Настройки сайта</li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-content" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Контент</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-content">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ asset(app()->getLocale().'/admin/settings/content/home') }}">Главная страница</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ asset(app()->getLocale().'/admin/blog') }}">
                <i class="menu-icon typcn typcn-th-large-outline"></i>
                <span class="menu-title">Новости</span>
            </a>
        </li>
        <li class="nav-item nav-category">Настройки товаров</li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Продукция</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ asset(app()->getLocale().'/admin/settings/categories') }}">Категории</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ asset(app()->getLocale().'/admin/settings/subcategories') }}">Подкатегории</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ asset(app()->getLocale().'/admin/settings/params') }}">Характеристики товаров</a>
                    </li>
                </ul>
            </div>
        </li>

    </ul>
</nav>