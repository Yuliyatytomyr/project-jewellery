<?php

namespace App\Http\Controllers\Administration\Admin\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// models
use App\Models\Btheme;
use App\Models\Btpost;

class BlogController extends Controller
{
    public function index(Request $request, $locale){
        // setting
        $array_titles = ['ru' => 'Блог новостей', 'ua' => 'Блог новин'];
        $bthemes = Btheme::all();
        $bthemes->load('btposts:id,btheme_id');

        return view('administration.admin.blog.index', compact('bthemes'))->withTitle($array_titles[app()->getLocale()]);
    }
}
