<?php

namespace App\Http\Controllers\User\Categories;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// models
use App\Models\Category;
use App\Models\Gproduct;
use App\Models\Gpvalue;
use App\Models\Param;
use App\Models\Pvalue;

class CategoryController extends Controller
{
    public function show(Request $request, $locale, $alias){
//                        \DB::listen(function($query){
//            dump($query->sql);
//        });
        //settings
        $array_titles = ['ua'=>'Товари категорії: ', 'ru'=>'Товары категории: '];

        $category = Category::select('id', 'alias', 'name_ru', 'name_ua')->where('alias', $alias)
            ->with('subcategories:id,category_id,name_ru,name_ua')
            ->first();
        if(!$category) abort(404);

        // settings request gpvalues
        $gpvalue_flag = isset($request->gpvalues);
        $gpvalues_array = explode(',', $request->gpvalues);
        $gproducts_bilder = self::getProductsBilder($gpvalue_flag, $gpvalues_array, $category->id);
        $gproducts = $gproducts_bilder->get();

        $res = self::getParamsAndValuesForFilterFromQuery($gproducts);

        $params_with_values = Param::whereHas('pvalues', function($q) use ($res){
            $q->whereIn('id',  $res[1]);
        })->with(['pvalues' => function($q) use ($res){
            $q->whereIn('id',  $res[1]);
        }])->get();

        if(isset($request->gpvalues)){
            $gproducts  = $gproducts_bilder->paginate(3)->appends('gpvalues', $request->gpvalues);
            $remove_pvalues = Pvalue::select(['id', 'name_ru', 'name_ua'])->whereIn('id', $gpvalues_array)->get();
            return view('user.category.show.show', compact('category', 'gproducts', 'params_with_values', 'remove_pvalues'))->withTitle($array_titles[app()->getLocale()].$category->getNameTran());
        }
        $gproducts  = $gproducts_bilder->paginate(3);

       return view('user.category.show.show', compact('category', 'gproducts', 'params_with_values'))
           ->withTitle($array_titles[app()->getLocale()].$category->getNameTran());
    }


    private function getProductsBilder($pvalues_flag, $pvalues_array, $category_id){
        if($pvalues_flag){
            $gproducts = Gproduct::where('category_id', $category_id)
                ->with('productsNew')
                ->whereHas('productsNew')
                ->with('gpvalues')
                ->whereHas('gpvalues', function($q) use ($pvalues_array){
                    $q->whereIn('pvalue_id',  $pvalues_array);
                })
                ->with('gpimages:id,gproduct_id,image_path');
        }else{
            $gproducts = Gproduct::where('category_id', $category_id)
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
