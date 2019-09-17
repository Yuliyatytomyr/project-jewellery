<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'silver style' }}</title>


    @section('stylesheet')
        <link href="{{ asset('/admin/css/app.css') }}" rel="stylesheet">
    @show


    @section('script1')
        <script src="{{ asset('/admin/js/manifest.js') }}"></script>
        <script src="{{ asset('/admin/js/vendor.js') }}"></script>
    @show

</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center">
            <div class="row w-100">
                <div class="col-lg-4 mx-auto">

                        <div class="card">
                            <div class="card-header">{{ __('Login') }}</div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.auth', app()->getLocale()) }}" id="login-form">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control" name="email" value="test@gmail.com" required autocomplete="email" autofocus>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" value="11111111">

                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary w-100" id="login-form-submit">
                                                {{ __('Login') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('/admin/js/admin.js') }}"></script>

</body>
</html>