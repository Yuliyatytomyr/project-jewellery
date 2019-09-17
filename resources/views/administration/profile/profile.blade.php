@extends('administration.app.app')


@section('content')


    <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header">
                <h3 class="page-title">{{$title}}</h3>
                <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">

                    <ul class="quick-links ml-auto">
                        <li><a href="{{ asset(app()->getLocale().'/administration/profile') }}">Профиль</a></li>
                        <li><a href="{{ asset(app()->getLocale().'/administration/profile?page=change_pas') }}">Смена пароля</a></li>
                        <li><a href="{{ asset(app()->getLocale().'/administration/profile?page=user_setting') }}">Настройки</a></li>
                    </ul>
                </div>
            </div>
        </div>
        {{--<div class="col-md-12">--}}
            {{--<div class="page-header-toolbar">--}}
                {{--<div class="btn-group toolbar-item" role="group" aria-label="Basic example">--}}
                    {{--<button type="button" class="btn btn-secondary"><i class="mdi mdi-chevron-left"></i></button>--}}
                    {{--<button type="button" class="btn btn-secondary">03/02/2019 - 20/08/2019</button>--}}
                    {{--<button type="button" class="btn btn-secondary"><i class="mdi mdi-chevron-right"></i></button>--}}
                {{--</div>--}}
                {{--<div class="filter-wrapper">--}}
                    {{--<div class="dropdown toolbar-item">--}}
                        {{--<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownsorting" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Day</button>--}}
                        {{--<div class="dropdown-menu" aria-labelledby="dropdownsorting">--}}
                            {{--<a class="dropdown-item" href="#">Last Day</a>--}}
                            {{--<a class="dropdown-item" href="#">Last Month</a>--}}
                            {{--<a class="dropdown-item" href="#">Last Year</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<a href="#" class="advanced-link toolbar-item">Advanced Options</a>--}}
                {{--</div>--}}
                {{--<div class="sort-wrapper">--}}
                    {{--<button type="button" class="btn btn-primary toolbar-item">New</button>--}}
                    {{--<div class="dropdown ml-lg-auto ml-3 toolbar-item">--}}
                        {{--<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownexport" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export</button>--}}
                        {{--<div class="dropdown-menu" aria-labelledby="dropdownexport">--}}
                            {{--<a class="dropdown-item" href="#">Export as PDF</a>--}}
                            {{--<a class="dropdown-item" href="#">Export as DOCX</a>--}}
                            {{--<a class="dropdown-item" href="#">Export as CDR</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>

    <div class="row" id="profile-content">
        {!! $render_content !!}
    </div>

@endsection