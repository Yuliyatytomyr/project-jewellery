<div class="container demo">
    <div class="modal left fade" id="modal-mobile-menu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog w-100" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="nav flex-sm-column flex-column">
                        <a class="nav-item nav-link active" href="#">Home left</a>
                        <a href="#" class="nav-item nav-link">Link</a>
                        <a href="#" class="nav-item nav-link">Link</a>
                        <a href="#" class="nav-item nav-link">Link</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal right fade" id="modal-mobile-busket"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog w-100" role="document">
            <div class="modal-content">
{{--                <div data-dismiss="modal"><i class="fas fa-times"></i></div>--}}
                <div class="modal-body">
                    <div class="nav flex-sm-column flex-row">
                        <a class="nav-item nav-link active" href="#">Home left</a>
                        <a href="#" class="nav-item nav-link">Link</a>
                        <a href="#" class="nav-item nav-link">Link</a>
                        <a href="#" class="nav-item nav-link">Link</a>
                    </div>
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
