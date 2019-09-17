<?php

namespace App\Http\Controllers\Administration\Manager\Subcategories;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// models
use App\Models\Subcategory;
use App\Models\Gproduct;

class SubcategoryController extends Controller
{
    public function index(Request $request, $locale){
        // settings
        $array_titles = ['ru'=>'Подкатегории товаров', 'ua'=>'Підкатегорії товарів'];

        $subcategories = Subcategory::orderBy('category_id', 'asc')->paginate(10);
        $subcategories->load('category:id,alias,name_ru,name_ua');
        $subcategories->load('gproducts:id,subcategory_id');

        return view('administration.manager.subcategories.index.index', compact('subcategories'))->withTitle($array_titles[app()->getLocale()]);
    }

    public function show(Request $request, $locale, $alias){
        // settings
        $array_titles = ['ru'=>'Подкатегория ', 'ua'=>'Підкатегорія '];
        $subcategory = Subcategory::where('alias', $alias)->first();
        if($subcategory){
            $gproducts = Gproduct::where('subcategory_id', $subcategory->id)->paginate(20);

            return view('administration.manager.subcategories.show.show', compact('subcategory', 'gproducts'))->withTitle($array_titles[app()->getLocale()].$subcategory->getNameTran());
        }else{

        }
    }


    /* public method for subcategory's actions */
    // select trait for action
    public function actions(Request $request, $locale, $action){
        // array exist traits for actions
        $actions_array = ['get_related_params'];

        if(!in_array($action, $actions_array)){
            return response()->json([
                'status' => 'error',
                'msg' => 'Метод отсутсвует!'
            ]);
        }

        $action_trait = 'trait'.str_replace(' ', '', ucwords(str_replace('_', ' ', $action)));

        return self::$action_trait($request, $request->id);
    }

    /* actions traits*/
    // create subcategory relation to param
    private function traitGetRelatedParams($request, $id){
        $subcategory = Subcategory::find($id);
        $params = $subcategory->params;

        return response()->json([
            'status' => 'success',
            'msg' => 'Характеристики товара обновлены!',
            'render' => view('administration.manager.gproducts.create.layouts.select_params', compact('params'))->render()
        ]);
    }
}
