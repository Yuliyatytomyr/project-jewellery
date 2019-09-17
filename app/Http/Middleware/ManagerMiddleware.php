<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ManagerMiddleware
{
    public function handle($request, Closure $next, $guard = null)
    {
        $auth = Auth::guard($guard);
        if(!$auth->user() || !$auth->user()->isManager()){
            if($request->ajax()){
                return response()->json([
                    'status' => 'error',
                    'msg' => 'В доступе отказано'
                ], 200);
            }else{
                if(!Auth::guest() && $auth->user()->isAdmin()){
                    return redirect()->route('admin.home', app()->getLocale())->with('error_alert', 'В доступе отказано!');
                }
                return redirect()->route('home', app()->getLocale())->with('error_alert', 'В доступе отказано!');
            }
        }

        return $next($request);
    }
}
