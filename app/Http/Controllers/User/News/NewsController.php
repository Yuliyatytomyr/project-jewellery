<?php

namespace App\Http\Controllers\User\News;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// models
use App\Models\Btheme;
use App\Models\Btpost;

class NewsController extends Controller
{
    public function indexPosts(Request $request, $locale){
        // settings
        $array_titles = ['ru' => 'Новости', 'ua' => 'Новини'];
        $bthemes = Btheme::where('show_on', 1)->get();
        $btposts = Btpost::select(['id','alias','btheme_id','title_ru','title_ua','s_desc_ru','s_desc_ua','image_path','show_on','created_at','updated_at'])
            ->where('show_on', 1)
            ->with('btheme:id,alias')
            ->paginate(10);

        return view('user.news.indexPosts.index', compact('bthemes', 'btposts'))->withTitle($array_titles[app()->getLocale()]);
    }

    public function showThemePosts(Request $request, $locale, $theme){
        $blog_theme = Btheme::where('show_on', 1)->where('alias', $theme)->first();
        if(!$blog_theme){ abort('404'); }

        // settings
        // $array_titles = ['ru' => '', 'ua' => ''];
        $bthemes = Btheme::where('show_on', 1)->get();
        $btposts = Btpost::select(['id','alias','btheme_id','title_ru','title_ua','s_desc_ru','s_desc_ua','image_path','show_on','created_at','updated_at'])
            ->where('show_on', 1)
            ->where('btheme_id', $blog_theme->id)
            ->with('btheme:id,alias')
            ->paginate(10);

        return view('user.news.showTheme.show', compact('bthemes', 'btposts', 'blog_theme'))->withTitle($blog_theme->getNameTran());
    }

    public function showPost(Request $request, $locale, $theme, $post){

        $btpost_theme = Btheme::where('show_on', 1)->where('alias', $theme)->first();
        $btpost = Btpost::where('show_on', 1)->where('alias', $post)->first();

        if(!$btpost_theme || !$btpost){
            abort('404');
        }

        // settings
        $array_titles = ['ru' => 'Новость: ', 'ua' => 'Новина: '];
        $bthemes = Btheme::where('show_on', 1)->get();

        return view('user/news/showPost/show', compact('btpost_theme', 'btpost', 'bthemes'))->withTitle($array_titles[app()->getLocale()].$btpost->getTitleTran());

    }
}
