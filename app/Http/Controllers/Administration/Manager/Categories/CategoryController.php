<?php

namespace App\Http\Controllers\Administration\Manager\Categories;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// models
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request, $locale){
        // settings
        $array_titles = ['ru' => 'Категории товаров', 'ua' => 'Категорії товарів'];

        $categories = Category::all();
        $categories->load('subcategories:id,category_id,alias,name_ru,name_ua');
        $categories->load('gproducts:id,category_id');

        return view('administration.manager.categories.index.index', compact('categories'))->withTitle($array_titles[app()->getLocale()]);
    }

    public function show(Request $request, $locale, $alias){
        $category = Category::where('alias', $alias)->first();
        if($category){
            //settings
            $array_titles = ['ru' => 'Категория ', 'ua' => 'Категорія '];
            $category->load('subcategories.gproducts:id,subcategory_id');

            return view('administration.manager.categories.show.show', compact('category'))->withTitle($array_titles[app()->getLocale()].$category->getNameTran());
        }else{
            abort(404);
        }
    }
}
