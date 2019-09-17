<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
// models
use App\Models\Category;
use App\User;




class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot()
    {
        \Blade::if('admin', function(){
            if(auth()->check()){
                return \Auth::user()->isAdmin();
            }
            return false;
        });

        \Blade::if('administration', function(){
            if(auth()->check()){
                return \Auth::user()->isAdministration();
            }
            return false;
        });

        \Blade::if('manager', function(){
            if(auth()->check()){
                return \Auth::user()->isManager();
            }
            return false;
        });

        // global data
        $market_nav_categories = Category::with('subcategories')->get();
        View::share('market_nav_categories', $market_nav_categories);
    }
}
