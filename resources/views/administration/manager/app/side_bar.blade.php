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
            <a class="nav-link" href="{{ asset(app()->getLocale().'/manager') }}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Главная</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Товары</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{asset(app()->getLocale().'/manager/categories')}}">По категориям</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{asset(app()->getLocale().'/manager/subcategories')}}">По подкатегориям</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{asset(app()->getLocale().'/manager/gproducts')}}">Все товары</a>
                    </li>
                </ul>
            </div>
        </li>

    </ul>
</nav>