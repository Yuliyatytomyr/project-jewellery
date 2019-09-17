<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'silver style' }}</title>

    <link rel="stylesheet" href="{{asset('admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/iconfonts/ionicons/css/ionicons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/iconfonts/typicons/src/font/typicons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/iconfonts/font-awesome/css/font-awesome.min.css')}}">

    {{--<link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css')}}">--}}
    {{--<link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.addons.css')}}">--}}

    @section('stylesheet')
        <link href="{{ asset('/admin/css/app.css') }}" rel="stylesheet">
    @show


    @section('script1')
        <script>
            const baseUrl = "{{ url('/') }}";
        </script>
        <script src="{{ asset('/admin/js/manifest.js') }}"></script>
        <script src="{{ asset('/admin/js/vendor.js') }}"></script>
        <script src="{{ asset('/admin/js/admin.js') }}"></script>

    @show

</head>
<body>
<div class="container-scroller">

    {{-- nav bar --}}
    @admin
        @include('administration.admin.app.nav_bar')
    @endadmin

    @manager
        @include('administration.manager.app.nav_bar')
    @endmanager

    <div class="container-fluid page-body-wrapper">

        {{-- side bar --}}
        @admin
            @include('administration.admin.app.side_bar')
        @endadmin

        @manager
            @include('administration.manager.app.side_bar')
        @endmanager


        <div class="main-panel">
            <div class="content-wrapper">

                {{-- content --}}
                @yield('content')

            </div>

            {{-- footer --}}
            @admin
                @include('administration.admin.app.footer')
            @endadmin

            @manager
                @include('administration.manager.app.footer')
            @endmanager


        </div>
    </div>


</div>

@yield('script2')
@include('administration.app.layouts.session_alerts')


{{--<script src="{{asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>--}}
{{--<script src="{{asset('admin/vendors/js/vendor.bundle.addons.js')}}"></script>--}}

{{--<script src="{{asset('admin/test/assets/js/shared/off-canvas.js')}}"></script>--}}
{{--<script src="{{asset('admin/test/assets/js/shared/misc.js')}}"></script>--}}

{{--<script src="{{asset('admin/test/assets/js/demo_1/dashboard.js')}}"></script>--}}

</body>
</html>