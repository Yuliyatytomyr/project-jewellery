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


class PvalueController extends Controller
{
    public function create(Request $request, $locale){

        if(!isset($request->param_id)){
            return redirect(app()->getLocale().'/admin/settings/params');
        }
        $param = Param::find($request->param_id);

        if(!$param){
            return redirect(app()->getLocale().'/admin/settings/params');
        }

        // settings
        $array_titles = ['ru'=>'Создание значения для характеристики: "', 'ua'=>'Створення значення для характеристики: "'];

        return view('administration.admin.settings.pvalues.create.create', compact('param'))->withTitle($array_titles[app()->getLocale()].$param->getNameTran().'"');
    }

    public function store(Request $request, $locale){

        if(!isset($request->param_id)){
            return response()->json([
                'status' => 'error',
                'msg' => 'Сохранить не удалось, обновите страницу!'
            ]);
        }

        $param = Param::find($request->param_id);
        if(!$param){
            return response()->json([
                'status' => 'error',
                'msg' => 'Указаная характеристика не найдена в базе данных!'
            ]);
        }

        $validator = Validator::make($request->all(), [
            'name_ru' => ['required', 'string'],
            'name_ua' => ['required', 'string'],
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 'validation',
                'errors' => $validator->getMessageBag()->toArray()
            ], 200);
        }

        $new_pvalue = Pvalue::create([
            'param_id' => $param->id,
            'type_value' => $param->type_value,
            'name_ru' => $request->name_ru,
            'name_ua' => $request->name_ua,
            'desc' => ($request->desc == null || $request->desc == '') ? null : $request->desc
        ]);

        return response()->json([
            'status' => 'success',
            'msg' => 'Характеристика товара успешно создана',
            'redirect' => $request->redirect,
            'pvalue' => $new_pvalue
        ], 200);
    }

    public function edit(Request $request, $locale, $id){
        $pvalue = Pvalue::find($id);
        if(!$pvalue){ return back();}
        $pvalue->load('param');
        // settings
        $array_titles = ['ru' => 'Редактирование значения: "', 'ua' => 'Редагування значення: "'];

        return view('administration.admin.settings.pvalues.edit.edit', compact('pvalue'))->withTitle($array_titles[app()->getLocale()].$pvalue->getNameTran().'"');
    }

    public function update(Request $request, $locale, $id){
        $pvalue = Pvalue::find($id);
        if(!$pvalue){
            return response()->json([
                'status' => 'error',
                'msg' => 'Указаное значение характеристики товара не найдено в базе данных!'
            ]);
        }

        $pvalue->load('param');

        $validator = Validator::make($request->all(), [
            'name_ru' => ['required', 'string'],
            'name_ua' => ['required', 'string'],
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 'validation',
                'errors' => $validator->getMessageBag()->toArray()
            ], 200);
        }

        $pvalue->param_id = $pvalue->param->id;
        $pvalue->type_value = $pvalue->param->type_value;
        $pvalue->name_ru = $request->name_ru;
        $pvalue->name_ua = $request->name_ua;
        $pvalue->desc = ($request->desc == null || $request->desc == '') ? null : $request->desc;
        $pvalue->save();

        return response()->json([
            'status' => 'success',
            'redirect' => $request->redirect,
            'msg' => 'Значение характеристики успешно обновлено!'
        ], 200);
    }

}
