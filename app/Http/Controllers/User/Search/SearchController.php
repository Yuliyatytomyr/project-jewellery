<?php

namespace App\Http\Controllers\User\Search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// models
use App\Models\Gproduct;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Param;
use App\Models\Pvalue;

class SearchController extends Controller
{
    public function searchActions(Request $request, $locale, $action){

        $array_actions = ['full', 'mobile', 'submit'];

        if(in_array($action, $array_actions)){
            $action_trait = $action.'Trait';
            return self::$action_trait($request);
        }

        return response()->json([
            'status' => 'error',
            'msg' => 'Метод не найден!',
        ], 200);
    }

    private function fullTrait($request){

        $search = $request->search;

        $gproducts = Gproduct::where(function ($q) use ($search){
            $q->where('name_ru', 'like', '%'.$search.'%')->orWhere('name_ua', 'like', '%'.$search.'%');
        })->whereHas('productsNew')->orderBy('updated_at', 'asc')->limit(4)->get();
        $gproducts->load('gpimages');

        $categories = Category::where(function ($q) use ($search){
            $q->where('name_ru', 'like', '%'.$search.'%')->orWhere('name_ua', 'like', '%'.$search.'%');
        })->get();

        $gproducts_cat_ids = [];

        if(count($categories) < 1 && $gproducts){
            $gproducts_cat_ids = $gproducts->pluck('category_id')->toArray();
            $gproducts_cat_ids = array_unique($gproducts_cat_ids);
            $categories = Category::find($gproducts_cat_ids);
        }

        $subcategories = Subcategory::where(function ($q) use ($search){
            $q->where('name_ru', 'like', '%'.$search.'%')->orWhere('name_ua', 'like', '%'.$search.'%');
        })->with('category')->get();

        if(count($subcategories) < 1 && $gproducts){
            $gproducts_cat_ids = $gproducts->pluck('category_id')->toArray();
            $gproducts_cat_ids = array_unique($gproducts_cat_ids);
            $subcategories = Subcategory::find($gproducts_cat_ids);
            $subcategories->load('category');
        }

        return response()->json([
            'status' => 'success',
            'action' => 'full',
            'render' => view('user.home.search', compact('gproducts', 'categories', 'subcategories'))->render(),
            'msg' => 'Метод full!',
        ], 200);
    }

    private function mobileTrait($request){
        $search = $request->search;

        $gproducts = Gproduct::where(function ($q) use ($search){
            $q->where('name_ru', 'like', '%'.$search.'%')->orWhere('name_ua', 'like', '%'.$search.'%');
        })->whereHas('productsNew')->orderBy('updated_at', 'asc')->limit(4)->get();
        $gproducts->load('gpimages');

        $categories = Category::where(function ($q) use ($search){
            $q->where('name_ru', 'like', '%'.$search.'%')->orWhere('name_ua', 'like', '%'.$search.'%');
        })->get();

        $gproducts_cat_ids = [];

        if(count($categories) < 1 && $gproducts){
            $gproducts_cat_ids = $gproducts->pluck('category_id')->toArray();
            $gproducts_cat_ids = array_unique($gproducts_cat_ids);
            $categories = Category::find($gproducts_cat_ids);
        }

        $subcategories = Subcategory::where(function ($q) use ($search){
            $q->where('name_ru', 'like', '%'.$search.'%')->orWhere('name_ua', 'like', '%'.$search.'%');
        })->with('category')->get();

        if(count($subcategories) < 1 && $gproducts){
            $gproducts_cat_ids = $gproducts->pluck('category_id')->toArray();
            $gproducts_cat_ids = array_unique($gproducts_cat_ids);
            $subcategories = Subcategory::find($gproducts_cat_ids);
            $subcategories->load('category');
        }

        return response()->json([
            'status' => 'success',
            'action' => 'mobile',
            'render' => view('user.home.searchMob', compact('gproducts', 'categories', 'subcategories'))->render(),
            'msg' => 'Метод full!',
        ], 200);
    }

    private function submitTrait(Request $request){

        // settings
        $array_titles = [
            'true' => ['ru' => 'Результат поика по запросу: ', 'ua' => 'Результат пошуку за запитом: '],
            'false' => ['ru' => 'К сожалению, ваш запрос не дал результатов на: ', 'ua' => 'На жаль, ваш запит не дав результатів на: ']
        ];
        $search = (isset($request->search)) ? $request->search : '';
        $response_title_flag = 'true';

        if(!isset($request->search)){
            abort('404');
        }

        // settings request gpvalues
        $gpvalue_flag = isset($request->gpvalues);
        $gpvalues_array = explode(',', $request->gpvalues);
        $gproducts_bilder = self::getProductsBilder($gpvalue_flag, $gpvalues_array, $search);
        $gproducts_all = $gproducts_bilder->get();
        $count_gproducts_all = count($gproducts_all);
        if($count_gproducts_all < 1){
            $response_title_flag = 'false';
        }



        $res = self::getParamsAndValuesForFilterFromQuery($gproducts_all);

        $params_with_values = Param::whereHas('pvalues', function($q) use ($res){
            $q->whereIn('id',  $res[1]);
        })->with(['pvalues' => function($q) use ($res){
            $q->whereIn('id',  $res[1]);
        }])->get();
        $array_with_count = $res[0];

        if(isset($request->gpvalues)){
            $gproducts  = $gproducts_bilder->paginate(1)->appends('gpvalues', $request->gpvalues)->appends('search', $request->search);
            $remove_pvalues = Pvalue::select(['id', 'name_ru', 'name_ua'])->whereIn('id', $gpvalues_array)->get();

            return view('user.search.search',
                compact('gproducts', 'params_with_values', 'array_with_count', 'remove_pvalues', 'search'))
                ->withTitle($array_titles[$response_title_flag][app()->getLocale()].'"'.$search.'"');
        }
        $gproducts  = $gproducts_bilder->paginate(1)->appends('search', $request->search);


        return view('user.search.search', compact('gproducts', 'params_with_values', 'array_with_count', 'search'))->withTitle($array_titles[$response_title_flag][app()->getLocale()].'"'.$search.'"');
    }

    private function getProductsBilder($pvalues_flag, $pvalues_array, $search){

        if($pvalues_flag){
            $gproducts = Gproduct::where(function ($q) use ($search){
                $q->where('name_ru', 'like', '%'.$search.'%')->orWhere('name_ua', 'like', '%'.$search.'%');
            })
                ->with('productsNew')
                ->whereHas('productsNew')
                ->with('gpvalues')
                ->with('gpimages:id,gproduct_id,image_path');

            foreach ($pvalues_array as $value){
                $gproducts->whereHas('gpvalues', function($q) use ($value){
                    $q->where('pvalue_id',  $value);
                });
            }

        }else{
            $gproducts = Gproduct::where(function ($q) use ($search){
                $q->where('name_ru', 'like', '%'.$search.'%')->orWhere('name_ua', 'like', '%'.$search.'%');
            })
                ->with('productsNew')
                ->whereHas('productsNew')
                ->with('gpimages:id,gproduct_id,image_path');
        }

        return $gproducts;
    }

    private function getParamsAndValuesForFilterFromQuery($gproducts){
        $groducts_ids = $gproducts->pluck('id')->toArray();
        $relation_counts = \DB::table('gpvalues')->whereIn('gproduct_id', $groducts_ids)
            ->select(\DB::raw('count(*) as count_products, gpvalues.pvalue_id'))
            ->groupBy('pvalue_id')
            ->get();

        $array_ids_pvalues = $relation_counts->pluck('pvalue_id')->toArray();

        $array_with_count = [];
        foreach($relation_counts as $relation_count){
            $array_with_count[$relation_count->pvalue_id] = $relation_count->count_products;
        }

        return [$array_with_count, $array_ids_pvalues];
    }

}
