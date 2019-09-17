<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// api's models
use App\Models\Api\Novaposhta as NPapi;

class NovaposhtaController extends Controller
{
    public function index(Request $request, $locale){
        return view('user.bucket.test.index');
        $moldel = new NPapi();
        $test =  $moldel->getCities('біленьке');

        dd($test);
    }

    public function searchSettlements(Request $request, $locale){

        $moldel = new NPapi();
//        $response =  $moldel->searchSettlements($request->text, 1000);
        $response =  $moldel->getCities($request->search);
        $response_data = $response->data;
        $array_towns = [];
        foreach ($response_data as $res_data_item){
            $text_flag = 'DescriptionRu';
            if(app()->getLocale() == 'ua'){
                $text_flag = 'Description';
            }

            $array_towns[] = [
                'id' => $res_data_item->Ref,
                'text' => $res_data_item->$text_flag
            ];
        }

        return json_encode($array_towns);

    }

    public function searchWarehouses(Request $request, $locale){
        $moldel = new NPapi();
        $response =  $moldel->getWarehouses($request->ref);
        $response_data = $response->data;
        $array_warehouses = [];
        foreach ($response_data as $res_data_item){
            $text_flag = 'DescriptionRu';
            if(app()->getLocale() == 'ua'){
                $text_flag = 'Description';
            }

            $array_warehouses[] = [
                'value' => $res_data_item->Number,
                'text' => $res_data_item->$text_flag
            ];
        }

        return json_encode([
            'status' => 'success',
            'render' => view('user.bucket.test.layouts.options', compact('array_warehouses'))->render()
        ]);
    }
}
