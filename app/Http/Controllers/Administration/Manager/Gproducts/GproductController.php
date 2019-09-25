<?php

namespace App\Http\Controllers\Administration\Manager\Gproducts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;
// static functions
use App\Models\StaticFunctions\SF;
// models
use App\Models\Gproduct;
use App\Models\TreshImage;
use App\Models\Subcategory;
use App\Models\Param;
use App\Models\Pvalue;
use App\Models\Gpparam;
use App\Models\Gpvalue;
use App\Models\Gpimage;
use App\Models\Product;



class GproductController extends Controller
{
    public function index(Request $request, $alias){
        // settings
        $array_titles = ['ru'=>'Группы товаров', 'ua'=>'Групи товарів'];

        $gproducts = Gproduct::orderBy('category_id', 'desc')->paginate(10);
        $gproducts->load('category:id,name_ru,name_ua');
        $gproducts->load('subcategory:id,name_ru,name_ua');

        return view('administration.manager.gproducts.index.index', compact('gproducts'))->withTitle($array_titles[app()->getLocale()]);
    }

    public function create(Request $request, $alias){
        // settings
        $array_titles = ['ru'=>'Создание товара', 'ua'=>'Створення товару'];

        $subcategories = Subcategory::orderBy('category_id', 'asc')->get();
        $subcategories->load('category');

        return view('administration.manager.gproducts.create.create', compact( 'subcategories'))->withTitle($array_titles[app()->getLocale()]);
    }

    public function store(Request $request, $alias){

        //check subcategory_id
        $subcategory = Subcategory::select(['id', 'category_id'])->where('id', $request->subcategory_id)->first();
        if(!$subcategory){
            $sub_array_errors = ['ru'=>'Не выбрана подкатегория товара!','ua'=>'Не обрана категорія товару!'];
            return response()->json([
                'status' => 'validation',
                'errors' => [
                    'subcategory_id' => [
                        0 => $sub_array_errors[app()->getLocale()]
                    ]
                ]
            ], 200);
        }

        $validator = Validator::make($request->all(), [
            'item_code' => ['required', 'string', 'unique:gproducts,item_code'],
            'name_ru' => ['required', 'string', 'max:50'],
            'name_ua' => ['required', 'string', 'max:50'],
            'gallery' => ['required', 'string'],
            'desc_ru' => ['required', 'string'],
            'desc_ua' => ['required', 'string'],
            'barcode' => ['required', 'string'],
            'weight' => ['required', 'numeric'],
            'g_price' => ['required', 'numeric'],
            'total_sum' => ['required', 'numeric'],
            'sale' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 'validation',
                'errors' => $validator->getMessageBag()->toArray()
            ], 200);
        }


        $gproduct_alias = SF::str2url($request->name_ru.'_artikul_'.$request->item_code);

        $new_gproduct = Gproduct::create([
            'alias' => $gproduct_alias,
            'item_code' => $request->item_code,
            'category_id' => $subcategory->category_id,
            'subcategory_id' => $subcategory->id,
            'name_ru' => $request->name_ru,
            'name_ua' => $request->name_ua,
            'desc_ru' => $request->desc_ru,
            'desc_ua' => $request->desc_ua,
            'new_on' => 0,
            'topsale_on' => 0,
            'sprice_on' => 0
        ]);

        $product = new Product();
        $product->barcode = $request->input('barcode');
        $product->gproduct_id = $new_gproduct->id;
        $product->size = $request->input('size');
        $product->weight = $request->input('weight');
        $product->g_price = $request->input('g_price');
        $product->sale = $request->input('sale');
        $product->total_sum = $request->input('total_sum');
        if($request->input('status')){
            $product->status = $request->input('status');
        }

        $product->save();

        $gallery_array = explode (',',$request->gallery );
        self::createNewGpimages($new_gproduct->id, $gallery_array);

        self::deleteTrashImages($gallery_array);

        if(isset($request->param)){
            self::createGpParamsAndPvalues($new_gproduct->id, $request->param);
        }

        $new_gp_msg_array = ['ru'=>'Товар успешно создан!','ua'=>'Товар успішно створений!'];
        return response()->json([
            'status' => 'success',
            'msg' => $new_gp_msg_array[app()->getLocale()],
            'redirect' => $request->redirect,
            'gproduct' => $new_gproduct
        ]);
    }

    private function createNewGpimages($gproduct_id, $images){
        foreach ($images as $image){
            Gpimage::create([
                'gproduct_id' => $gproduct_id,
                'image_path' => $image
            ]);
        }
    }

    private function deleteTrashImages($images){
        foreach ($images as $image){
            $trash_image = TreshImage::where('image_path', $image)->first();
            if($trash_image){
                $trash_image->delete();
            }
        }
    }

    private function createGpParamsAndPvalues($gproduct_id, $params){
        foreach ($params as $param_id => $param_values){
            $find_param = Param::find($param_id);
            if($find_param && count($param_values) > 0){
                $new_gpparam = Gpparam::create([
                    'param_id' => $find_param->id,
                    'gproduct_id' => $gproduct_id
                ]);

                foreach ($param_values as $param_value){
                    $find_pvalue = Pvalue::find($param_value);
                    if($find_pvalue){
                        Gpvalue::create([
                            'gproduct_id' => $gproduct_id,
                            'gpparam_id' => $new_gpparam->id,
                            'pvalue_id' => $find_pvalue->id
                        ]);
                    }
                }
            }
        }
    }

    public function edit(Request $request, $locale, $alias){
//                \DB::listen(function($query){
//            dump($query->sql);
//        });
        $subcategories = Subcategory::all();
        $subcategories->load('params');

        $gproduct = Gproduct::where('alias', $alias)
            ->with([
                'gpparams.param.pvalues',
                'gpparams.gpvalues.pvalue:id,type_value,name_ru,name_ua',
                'gpimages:id,gproduct_id,image_path'
            ])
            ->first();

        $params = null;
        foreach ($subcategories as $subcategory){
            if($subcategory->id == $gproduct->subcategory_id){
                $params = $subcategory->params;
            }
        }

        $collection = collect($gproduct->gpimages);
        $input_images_path =$collection->implode('image_path', ',');

        $render_params_selectors = self::renderParamsSelectors($gproduct->gpparams);

        $dropzone_images = [];
        $array_db_images = $gproduct->gpimages;
        foreach ($array_db_images as $array_db_image){
            $dropzone_images[] = [
                'name' => substr(strrchr($array_db_image->image_path, "/"), 1),
                'size' => round(filesize(public_path($array_db_image->image_path))),
                'accepted' => true,
                'kind' => 'image',
                'upload' => [
                                'filename' => substr(strrchr($array_db_image->image_path, "/"), 1)
                            ],
                'dataURL' => asset($array_db_image->image_path)
            ];
        }
        $dropzone_images = json_encode($dropzone_images);

        $array_title = ['ru'=> 'Редактирование товара: ', 'ua'=> 'Редагування товару: ',];
        return view('administration.manager.gproducts.edit.edit', compact('subcategories', 'gproduct', 'params', 'render_params_selectors', 'dropzone_images', 'input_images_path'))->withTitle($array_title[app()->getLocale()].$gproduct->getNameTran().'. Артикул: '.$gproduct->item_code);
    }

    private function renderParamsSelectors($gp_params){
        $render_string = '';
        foreach ($gp_params as $gp_param){
            if($gp_param->param->type_param == 'list'){
                $render_string .= view('administration.manager.gproducts.edit.layouts.render_db_selectors.list_select', compact('gp_param'))->render();
            }elseif($gp_param->param->type_param == 'tab'){
                $json_array_params = self::createJsonArrayForRenderingSelectors($gp_param);
                $render_string .= view('administration.manager.gproducts.edit.layouts.render_db_selectors.tab_select', compact('gp_param', 'json_array_params'))->render();
            }
        }

        return $render_string;
    }

    private function createJsonArrayForRenderingSelectors($gp_param){
        $array_gpvalues = $gp_param->gpvalues;
        $array_pvalues_ids = [];
        foreach ($array_gpvalues as $array_gpvalue){
            $array_pvalues_ids[] = $array_gpvalue->pvalue_id;
        }

        $json_pvalues_array = [];
        foreach ($gp_param->param->pvalues as $pvalue){
            if(in_array($pvalue->id, $array_pvalues_ids)){
                $json_pvalues_array[] =[
                    'label' => $pvalue->getNameTran(),
                    'title' => $pvalue->getNameTran(),
                    'value' => $pvalue->id,
                    'selected' => true
                ];
            }else{
                $json_pvalues_array[] =[
                    'label' => $pvalue->getNameTran(),
                    'title' => $pvalue->getNameTran(),
                    'value' => $pvalue->id
                ];
            }
        }

        return json_encode($json_pvalues_array);
    }

    public function update(Request $request, $locale, $id){

        $gproduct = Gproduct::find($id);

        $validator = Validator::make($request->all(), [
            'item_code' => ['required', 'string', 'unique:gproducts,item_code,'.$gproduct->id],
            'name_ru' => ['required', 'string', 'max:50'],
            'name_ua' => ['required', 'string', 'max:50'],
            'gallery' => ['required', 'string'],
            'desc_ru' => ['required', 'string'],
            'desc_ua' => ['required', 'string']
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 'validation',
                'errors' => $validator->getMessageBag()->toArray()
            ], 200);
        }

        $gproduct_alias = SF::str2url($request->name_ru.'_artikul_'.$request->item_code);
        $data = ['name_ru' => $gproduct_alias];
        $validator = Validator::make($data, [
            'name_ru' => ['required', 'string', 'max:50', 'unique:gproducts,alias,'.$gproduct->id],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'validation',
                'errors' => $validator->getMessageBag()->toArray()
            ], 200);
        }

        $subcategory = Subcategory::find($request->subcategory_id);

        $gproduct->alias = $gproduct_alias;
        $gproduct->item_code = $request->item_code;
        $gproduct->category_id = $subcategory->category_id;
        $gproduct->subcategory_id = $subcategory->id;
        $gproduct->name_ru = $request->name_ru;
        $gproduct->name_ua = $request->name_ua;
        $gproduct->desc_ru = $request->desc_ru;
        $gproduct->desc_ua = $request->desc_ua;
        $gproduct->save();


        Gpimage::where('gproduct_id', $gproduct->id)->delete();
        $gallery_array = explode (',',$request->gallery );
        self::createNewGpimages($gproduct->id, $gallery_array);

        self::deleteTrashImages($gallery_array);

        Gpparam::where('gproduct_id', $gproduct->id)->delete();
        if(isset($request->param)){
            self::createGpParamsAndPvalues($gproduct->id, $request->param);
        }

        $new_gp_msg_array = ['ru'=>'Товар успешно изменен!','ua'=>'Товар успішно змінено!'];
        return response()->json([
            'status' => 'success',
            'msg' => $new_gp_msg_array[app()->getLocale()],
            'redirect' => $request->redirect,
            'gproduct' => $gproduct
        ]);
    }

    public function show(Request $request, $alias){

    }

    /* public method for gproduct's actions */
    // select trait for action
    public function actions(Request $request, $locale, $id, $action){
        // array exist traits for actions
        $actions_array = ['param_attach', 'param_detach'];

        if(!in_array($action, $actions_array)){
            return response()->json([
                'status' => 'error',
                'msg' => 'Метод отсутсвует!'
            ]);
        }

        $action_trait = 'trait'.str_replace(' ', '', ucwords(str_replace('_', ' ', $action)));

        return self::$action_trait($request, $id);
    }

    /* actions traits*/
    // create subcategory relation to param
    private function traitParamAttach($request, $id){
        $subcategory = Subcategory::find($id);

        $subcategory->params()->attach($request->param_id);
        $param = Param::find($request->param_id);

        return response()->json([
            'status' => 'success',
            'msg' => 'Параметр успешно подключен!',
            'render' => view('administration.admin.settings.subcategories.show.layouts.pram_ralation_change_block', compact('param','subcategory'))->render()
        ]);
    }


}
