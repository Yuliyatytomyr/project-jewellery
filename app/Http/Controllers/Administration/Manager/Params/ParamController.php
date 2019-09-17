<?php

namespace App\Http\Controllers\Administration\Manager\Params;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// models
use App\Models\Param;

class ParamController extends Controller
{
    /* public method for param's actions */
    // select trait for action
    public function actions(Request $request, $locale, $action){
        // array exist traits for actions
        $actions_array = ['get_select_for_gp_create','get_select_for_gp_edit'];

        if(!in_array($action, $actions_array)){
            return response()->json([
                'status' => 'error',
                'msg' => 'Метод отсутсвует!'
            ]);
        }

        $action_trait = 'trait'.str_replace(' ', '', ucwords(str_replace('_', ' ', $action)));

        return self::$action_trait($request, $request->param_id);
    }

    /* actions traits*/
    // add input param to gp create
    private function traitGetSelectForGpCreate($request, $id){

        $param = Param::where('id', $id)->with('pvalues:id,param_id,name_ru,name_ua')->first();
        // data
        $type_param = $param->type_param;
        $pvalues = $param->pvalues;

        if($type_param == 'tab'){
            $json_pvalues_array = [];
            foreach ($pvalues as $pvalue){
                $json_pvalues_array[] =[
                    'label' => $pvalue->getNameTran(),
                    'title' => $pvalue->getNameTran(),
                    'value' => $pvalue->id
                ];
            }
            $pvalues = json_encode($json_pvalues_array);
        }

        return response()->json([
            'status' => 'success',
            'msg' => $param->type_param,
            'render' => view('administration.manager.gproducts.create.layouts.rendering_selectors.'.$type_param.'_select', compact('pvalues', 'param'))->render()

        ]);
    }
    // add input param to gp edit
    private function traitGetSelectForGpEdit($request, $id){

        $param = Param::where('id', $id)->with('pvalues:id,param_id,name_ru,name_ua')->first();
        // data
        $type_param = $param->type_param;
        $pvalues = $param->pvalues;

        if($type_param == 'tab'){
            $json_pvalues_array = [];
            foreach ($pvalues as $pvalue){
                $json_pvalues_array[] =[
                    'label' => $pvalue->getNameTran(),
                    'title' => $pvalue->getNameTran(),
                    'value' => $pvalue->id
                ];
            }
            $pvalues = json_encode($json_pvalues_array);
        }

        return response()->json([
            'status' => 'success',
            'msg' => $param->type_param,
            'render' => view('administration.manager.gproducts.edit.layouts.rendering_selectors.'.$type_param.'_select', compact('pvalues', 'param'))->render()

        ]);
    }
}
