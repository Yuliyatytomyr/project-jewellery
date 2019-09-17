<?php

namespace App\Http\Controllers\Administration\Admin\Settings\Content;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// models
use App\Models\Settings\Content\ContentHomeSlider;
use App\Models\Settings\Content\ContentHomeMozaik;

class HomeController extends Controller
{
    public function index(){
        $sliders = ContentHomeSlider::all();
        $mozaiks = ContentHomeMozaik::all();

        return view('administration.admin.settings.content.home.index.index', compact('sliders', 'mozaiks'));
    }
}
