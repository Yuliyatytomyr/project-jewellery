<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="{{ asset(app()->getLocale().'/admin') }}">
            {{--<img src="../../../assets/images/logo.svg" alt="logo" /> --}}
            logo
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{ asset(app()->getLocale().'/admin') }}">
            {{--<img src="../../../assets/images/logo-mini.svg" alt="logo" /> --}}
            logo
        </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav">
            {{--<li class="nav-item font-weight-semibold d-none d-lg-block">Help : +050 2992 709</li>--}}
            <li class="nav-item dropdown language-dropdown">

                @if(app()->getLocale() == 'ru')
                    <a class="nav-link dropdown-toggle px-2 d-flex align-items-center" id="LanguageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <div class="d-inline-flex mr-0 mr-md-3">
                            <div class="flag-icon-holder">
                                <i class="flag-icon flag-icon-ru"></i>
                            </div>
                        </div>
                        <span class="profile-text font-weight-medium d-none d-md-block">Рус</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-left navbar-dropdown py-2" aria-labelledby="LanguageDropdown">
                        <a class="dropdown-item" href="{{ asset('ua/'.\App\Models\StaticFunctions\SF:: getPartUrlForLocalButtons(Request::path(), Request::all() )) }}">
                            <div class="flag-icon-holder">
                                <i class="flag-icon flag-icon-ua"></i>
                            </div> Укр
                        </a>
                    </div>
                @elseif(app()->getLocale() == 'ua')
                    <a class="nav-link dropdown-toggle px-2 d-flex align-items-center" id="LanguageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <div class="d-inline-flex mr-0 mr-md-3">
                            <div class="flag-icon-holder">
                                <i class="flag-icon flag-icon-ua"></i>
                            </div>
                        </div>
                        <span class="profile-text font-weight-medium d-none d-md-block">Укр</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-left navbar-dropdown py-2" aria-labelledby="LanguageDropdown">
                        <a class="dropdown-item" href="{{ asset('ru/'.\App\Models\StaticFunctions\SF:: getPartUrlForLocalButtons(Request::path(), Request::all() )) }}">
                            <div class="flag-icon-holder">
                                <i class="flag-icon flag-icon-ru"></i>
                            </div> Рус
                        </a>
                    </div>
                @endif

            </li>
        </ul>
        {{--<form class="ml-auto search-form d-none d-md-block" action="#">--}}
            {{--<div class="form-group">--}}
                {{--<input type="search" class="form-control" placeholder="Search Here">--}}
            {{--</div>--}}
        {{--</form>--}}
        <ul class="navbar-nav ml-auto">
            {{--<li class="nav-item dropdown">--}}
                {{--<a class="nav-link count-indicator" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">--}}
                    {{--<i class="mdi mdi-bell-outline"></i>--}}
                    {{--<span class="count">7</span>--}}
                {{--</a>--}}
                {{--<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">--}}
                    {{--<a class="dropdown-item py-3">--}}
                        {{--<p class="mb-0 font-weight-medium float-left">You have 7 unread mails </p>--}}
                        {{--<span class="badge badge-pill badge-primary float-right">View all</span>--}}
                    {{--</a>--}}
                    {{--<div class="dropdown-divider"></div>--}}
                    {{--<a class="dropdown-item preview-item">--}}
                        {{--<div class="preview-thumbnail">--}}
                            {{--<img src="../../../assets/images/faces/face10.jpg" alt="image" class="img-sm profile-pic"> </div>--}}
                        {{--<div class="preview-item-content flex-grow py-2">--}}
                            {{--<p class="preview-subject ellipsis font-weight-medium text-dark">Marian Garner </p>--}}
                            {{--<p class="font-weight-light small-text"> The meeting is cancelled </p>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                    {{--<a class="dropdown-item preview-item">--}}
                        {{--<div class="preview-thumbnail">--}}
                            {{--<img src="../../../assets/images/faces/face12.jpg" alt="image" class="img-sm profile-pic"> </div>--}}
                        {{--<div class="preview-item-content flex-grow py-2">--}}
                            {{--<p class="preview-subject ellipsis font-weight-medium text-dark">David Grey </p>--}}
                            {{--<p class="font-weight-light small-text"> The meeting is cancelled </p>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                    {{--<a class="dropdown-item preview-item">--}}
                        {{--<div class="preview-thumbnail">--}}
                            {{--<img src="../../../assets/images/faces/face1.jpg" alt="image" class="img-sm profile-pic"> </div>--}}
                        {{--<div class="preview-item-content flex-grow py-2">--}}
                            {{--<p class="preview-subject ellipsis font-weight-medium text-dark">Travis Jenkins </p>--}}
                            {{--<p class="font-weight-light small-text"> The meeting is cancelled </p>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</li>--}}
            {{--<li class="nav-item dropdown">--}}
                {{--<a class="nav-link count-indicator" id="notificationDropdown" href="#" data-toggle="dropdown">--}}
                    {{--<i class="mdi mdi-email-outline"></i>--}}
                    {{--<span class="count bg-success">3</span>--}}
                {{--</a>--}}
                {{--<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">--}}
                    {{--<a class="dropdown-item py-3 border-bottom">--}}
                        {{--<p class="mb-0 font-weight-medium float-left">You have 4 new notifications </p>--}}
                        {{--<span class="badge badge-pill badge-primary float-right">View all</span>--}}
                    {{--</a>--}}
                    {{--<a class="dropdown-item preview-item py-3">--}}
                        {{--<div class="preview-thumbnail">--}}
                            {{--<i class="mdi mdi-alert m-auto text-primary"></i>--}}
                        {{--</div>--}}
                        {{--<div class="preview-item-content">--}}
                            {{--<h6 class="preview-subject font-weight-normal text-dark mb-1">Application Error</h6>--}}
                            {{--<p class="font-weight-light small-text mb-0"> Just now </p>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                    {{--<a class="dropdown-item preview-item py-3">--}}
                        {{--<div class="preview-thumbnail">--}}
                            {{--<i class="mdi mdi-settings m-auto text-primary"></i>--}}
                        {{--</div>--}}
                        {{--<div class="preview-item-content">--}}
                            {{--<h6 class="preview-subject font-weight-normal text-dark mb-1">Settings</h6>--}}
                            {{--<p class="font-weight-light small-text mb-0"> Private message </p>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                    {{--<a class="dropdown-item preview-item py-3">--}}
                        {{--<div class="preview-thumbnail">--}}
                            {{--<i class="mdi mdi-airballoon m-auto text-primary"></i>--}}
                        {{--</div>--}}
                        {{--<div class="preview-item-content">--}}
                            {{--<h6 class="preview-subject font-weight-normal text-dark mb-1">New user registration</h6>--}}
                            {{--<p class="font-weight-light small-text mb-0"> 2 days ago </p>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</li>--}}
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
                <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">

                    @if(auth()->user()->photo != null)
                        <img class="img-xs rounded-circle" src="{{ asset(auth()->user()->photo) }}" alt="Profile image">
                    @else
                        <i class="fa fa-user-circle fa-2x"></i>
                    @endif

                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="dropdown-header text-center">

                        @if(auth()->user()->photo != null)
                            <img class="img-md rounded-circle" src="{{ asset(auth()->user()->photo) }}" alt="Profile image">
                        @else
                            <i class="fa fa-user-circle fa-3x"></i>
                        @endif

                        <p class="mb-1 mt-3 font-weight-semibold">{{ auth()->user()->name.' '.auth()->user()->surname }}</p>
                        <p class="font-weight-light text-muted mb-0">{{ auth()->user()->email }}</p>
                    </div>
                    <a class="dropdown-item" href="{{ asset(app()->getLocale().'/administration/profile') }}">Личный кабинет</a>
                    {{--<a class="dropdown-item">Messages</a>--}}
                    {{--<a class="dropdown-item">Activity</a>--}}
                    {{--<a class="dropdown-item">FAQ</a>--}}
                    <a class="dropdown-item" href="{{ asset(app()->getLocale().'/administration/logout') }}">Выйти</a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>