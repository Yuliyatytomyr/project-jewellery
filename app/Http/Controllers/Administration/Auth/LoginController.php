<?php

namespace App\Http\Controllers\Administration\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        if(Auth::user()->isAdmin()){
            return app()->getLocale() . '/admin';
        }elseif(Auth::user()->isManager()){
            return app()->getLocale() . '/manager';
        }else{
            return app()->getLocale() . '/';
        }
    }

    public function showLoginForm()
    {
        return view('administration.auth.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

    protected function authenticated(Request $request, $user)
    {
        if(Auth::user()->isAdmin()){
            return redirect(app()->getLocale().'/admin');
        }elseif(Auth::user()->isManager()){
            return redirect(app()->getLocale().'/manager');
        }

        return redirect(app()->getLocale().'/');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect(app()->getLocale().'/administration');
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
