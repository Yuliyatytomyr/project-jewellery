<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;

// models
use App\Models\FavoritesProduct;

class LoginController extends Controller
{


    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        return app()->getLocale() . '/';
    }

    public function showLoginForm()
    {
        $data['title'] = '404';
        $data['name'] = 'Page not found';
        return response()
            ->view('errors.404',$data,404);
    }


    public function login(\Illuminate\Http\Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'email' => 'required|string',
                'password' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'validation',
                    'errors' => $validator->getMessageBag()->toArray()
                ], 200);
            }

            if ($this->attemptLogin($request)) {
                return $this->sendLoginResponse($request);
            }

            return $this->sendFailedLoginResponse($request);
        }

    }

    protected function authenticated(Request $request, $user)
    {
        if ($request->ajax()){

            $redirect_page = $request->redirect;

            if(Auth::user()->isAdmin()){
                $redirect_page =  asset(app()->getLocale().'/admin');
            }elseif(Auth::user()->isManager()){
                $redirect_page = asset(app()->getLocale().'/manager');
            }

            // перенос избранных товаров из сессии в базу данных
            if(session('products.favorites')){
                $user_id = Auth::user()->id;
                foreach(session('products.favorites') as $item){
                    FavoritesProduct::firstOrCreate([
                        'user_id' => $user_id,
                        'gproduct_id' => $item
                    ]);
                }
                $request->session()->forget('products.favorites');
            }

            return response()->json([
                'status' => 'success',
                'user' => $user,
                'redirect' => $redirect_page,
            ]);
        }
    }


    protected function sendLoginResponse(Request  $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
            ?: redirect()->intended($this->redirectPath());

    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];

        if ($request->expectsJson()) {
            return response()->json([
                'status' => 'validation',
                'errors' => $errors
            ], 200);
        }
    }

}
