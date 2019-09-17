<?php

namespace App\Http\Controllers\Administration\Admin\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
// models
use App\Models\Param;
use App\Models\Pvalue;
use App\Models\Subcategory;

class ParamController extends Controller
{

    public function index(Request $request, $locale){
        // settings
        $array_titles = ['ru'=>'Характеристики товаров', 'ua'=>'Характеристики товарів'];

        $params = Param::paginate(10);

        return view('administration.admin.settings.params.index.index', compact('params'))->withTitle($array_titles[app()->getLocale()]);
    }

    public function create(Request $request, $locale){
        // settings
        $array_titles = ['ru'=>'Создание характеристики товаров', 'ua'=>'Створення характеристики товарів'];

        return view('administration.admin.settings.params.create.create')->withTitle($array_titles[app()->getLocale()]);
    }

    public function store(Request $request, $locale){

        $validator = Validator::make($request->all(), [
            'type_param' => ['required', 'string'],
            'type_value' => ['required', 'string'],
            'name_ru' => ['required', 'string', 'max:50', 'unique:params,name_ru'],
            'name_ua' => ['required', 'string', 'max:50', 'unique:params,name_ua'],
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 'validation',
                'errors' => $validator->getMessageBag()->toArray()
            ], 200);
        }

        $new_param = Param::create([
            'special' => (isset($request->special)) ? true : false,
            'type_param' => $request->type_param,
            'type_value' => $request->type_value,
            'name_ru' => $request->name_ru,
            'name_ua' => $request->name_ua,
            'desc' => ($request->desc == null || $request->desc == '') ? null : $request->desc
        ]);

        return response()->json([
            'status' => 'success',
            'msg' => 'Характеристика товара успешно создана',
            'redirect' => $request->redirect,
            'param' => $new_param
        ]);
    }

    public function edit(Request $request, $locale, $id){
        $param = Param::find($id);
        if(!$param){ return back();}

        // settings
        $array_titles = ['ru' => 'Редактирование характеристики: "', 'ua' => 'Редагування характеристики: "'];

        return view('administration.admin.settings.params.edit.edit', compact('param'))->withTitle($array_titles[app()->getLocale()].$param->getNameTran().'"');
    }

    public function update(Request $request, $locale, $id){

        $param = Param::find($id);
        if(!$param){
            return response()->json([
                'status' => 'error',
                'msg' => 'Указаный параметр не найден в базе данных!'
            ]);
        }

        $validator = Validator::make($request->all(), [
            'type_param' => ['required', 'string'],
            'type_value' => ['required', 'string'],
            'name_ru' => ['required', 'string', 'max:50', 'unique:params,name_ru,'.$param->id],
            'name_ua' => ['required', 'string', 'max:50', 'unique:params,name_ua,'.$param->id],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'validation',
                'errors' => $validator->getMessageBag()->toArray()
            ], 200);
        }

        if($request->action == 'check'){
            if($request->type_param != $param->type_param || $request->type_value != $param->type_value){
                return response()->json([
                    'status' => 'success',
                    'action' => 'confirm',
                    'modalInfo' => 'Изменяя тип праметра или тип значения, система удалит ранее созданые значения для указанного параметра, а также удалит данную характеристику у всех товаров, где ранее она была указана при создании этих товаров! <br> Вы уверены, что хотите изменить данные настройки характеристики?'
                ], 200);
            }
        }elseif($request->action == 'edit'){
            if($param->pvalues->count() > 0){
                $param->pvalues()->delete();
            }
            self::deleteParamsAndPvaluesFromProducts($param);
        }

        $param->special = (isset($request->special)) ? true : false;
        $param->type_param = $request->type_param;
        $param->type_value = $request->type_value;
        $param->name_ru = $request->name_ru;
        $param->name_ua = $request->name_ua;
        $param->desc = ($request->desc == null || $request->desc == '') ? null : $request->desc;
        $param->save();

        return response()->json([
            'status' => 'success',
            'action' => 'updated',
            'redirect' => $request->redirect,
            'msg' => 'Параметр успешно обновлен!'
        ], 200);
    }
    private function deleteParamsAndPvaluesFromProducts($param){

    }



    public function show(Request $request, $locale, $id){
        // settings
        $array_titles = ['ru' => 'Характеристика: "', 'ua' => 'Характеристика: "'];

        $param = Param::find($id);
        if(!$param){
            return redirect(app()->getLocale().'/admin/settings/params');
        }
        $pvalues = Pvalue::where('param_id', $param->id)->paginate(10);

        return view('administration.admin.settings.params.show.show', compact('param', 'pvalues'))->withTitle($array_titles[app()->getLocale()].$param->getNameTran().'"');
    }

    /* public method for param's actions */
    // select trait for action
    public function actions(Request $request, $locale, $id, $action){
        // array exist traits for actions
        $actions_array = ['attach_all_subcats'];

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
    // create param relations with with all subcategories
    private function traitAttachAllSubcats($request, $id){
        $subcategories = Subcategory::all();
        $array_ids_subcats = [];
        foreach ($subcategories as $subcategory){
            $array_ids_subcats[] = $subcategory->id;
        }

        $param = Param::find($id);
        $param->subcategories()->detach($array_ids_subcats);
        $param->subcategories()->attach($array_ids_subcats);

        return response()->json([
            'status' => 'success',
            'msg' => 'Параметр успешно подключен, ко всем подкатегориям!',
            'test' => $id
        ]);
    }
}
