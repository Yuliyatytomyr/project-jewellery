<?php

namespace App\Http\Controllers\Administration\Admin\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(Request $request){
        $array_titles = ['ua' => 'Головна сторінка', 'ru' => 'Главная страница' ];

        return view('administration.admin.home.index')->withTitle( $array_titles[app()->getLocale()] );
    }
}
