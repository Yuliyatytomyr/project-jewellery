<?php

namespace App\Http\Controllers\User\Subcategories;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// models
use App\Models\Gproduct;
use App\Models\Subcategory;
use App\Models\Gpvalue;
use App\Models\Param;
use App\Models\Pvalue;

class SubcategoryController extends Controller
{

    public function getSubcategories(){
            $subCategories = Subcategory::all('id', 'alias', 'name_ru', 'name_ua');
    
            return $subCategories;
    }

    public function show(Request $request, $locale, $alias){

//                                \DB::listen(function($query){
//            dump($query->sql);
//        });
        $array_titles = ['ua'=>'Товари підкатегорії: ', 'ru'=>'Товары подкатегории: '];

        $subcategory = Subcategory::select('id', 'category_id', 'alias', 'name_ru', 'name_ua')->where('alias', $alias)
            ->with('category.subcategories')
            ->first();
        if(!$subcategory) abort(404);

        // settings request gpvalues
        $gpvalue_flag = isset($request->gpvalues);
        $gpvalues_array = explode(',', $request->gpvalues);
        $gproducts_bilder = self::getProductsBilder($gpvalue_flag, $gpvalues_array, $subcategory->id);
        $gproducts_all = $gproducts_bilder->get();

        $res = self::getParamsAndValuesForFilterFromQuery($gproducts_all);



        $params_with_values = Param::whereHas('pvalues', function($q) use ($res){
            $q->whereIn('id',  $res[1]);
        })->with(['pvalues' => function($q) use ($res){
            $q->whereIn('id',  $res[1]);
        }])->get();
        $array_with_count = $res[0];

        if(isset($request->gpvalues)){
            $gproducts  = $gproducts_bilder->paginate(1)->appends('gpvalues', $request->gpvalues);
            $remove_pvalues = Pvalue::select(['id', 'name_ru', 'name_ua'])->whereIn('id', $gpvalues_array)->get();
            return view('user.subcategory.show.show',
                compact('subcategory', 'gproducts', 'params_with_values', 'array_with_count', 'remove_pvalues'))
                ->withTitle($array_titles[app()->getLocale()].$subcategory->getNameTran());
        }
        $gproducts  = $gproducts_bilder->paginate(1);

        return view('user.subcategory.show.show',
            compact('subcategory', 'gproducts', 'params_with_values', 'array_with_count'))
            ->withTitle($array_titles[app()->getLocale()].$subcategory->getNameTran());
    }
    private function getProductsBilder($pvalues_flag, $pvalues_array, $subcategory_id){
        if($pvalues_flag){
            $gproducts = Gproduct::where('subcategory_id', $subcategory_id)
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
            $gproducts = Gproduct::where('subcategory_id', $subcategory_id)
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
