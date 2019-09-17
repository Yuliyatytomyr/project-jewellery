<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\BadResponseException;

class Novaposhta extends Model
{

    private function getApiKey(){
        return "6046c4b9073a04b67e7ae118bc272b6a";
    }

    private function responseNovaposhta($response){
        return $response;
    }

    public static function getTest(){

        $data = [
            "modelName" => "AddressGeneral",
            "calledMethod" => "getWarehouses",
            "methodProperties" => [
                "Language" => "ru"
            ],
            "apiKey" => self::getApiKey()
        ];
        $client = new GuzzleClient([
            'headers' => ['Content-Type' => 'application/json']
        ]);
        $request = $client->get('https://api.novaposhta.ua/v2.0/json/',
            ['body' => json_encode($data)]
        );
        $response = $request->getBody();

        return json_decode($response);
    }

    public function searchSettlements($request, $limit){
        $data = [
            'apiKey' => self::getApiKey(),
            'modelName' => 'Address',
            'calledMethod' => 'searchSettlements',
            'methodProperties' => [
                'CityName' => $request,
                'Limit' => $limit
            ]
        ];
        $client = new GuzzleClient([
            'headers' => ['Content-Type' => 'application/json']
        ]);

        try {
            $request = $client->post('https://api.novaposhta.ua/v2.0/json/',
                ['body' => json_encode($data)]
            );
        } catch (\Exception $e) {
           return [
               'status' => 'error',
               'msg' => 'Ошибка соединения с АПИ Новой Почты!'
           ];
        }

        $response = self::responseNovaposhta($request->getBody());

        return json_decode($response);
    }

    public static function getWarehouses($request){
        $data = [
            'apiKey' => self::getApiKey(),
            'modelName' => 'Address',
            'calledMethod' => 'getWarehouses',
            'methodProperties' => [
                'CityRef' => $request
            ]
        ];
        $client = new GuzzleClient([
            'headers' => ['Content-Type' => 'application/json']
        ]);

        try {
            $request = $client->post('https://api.novaposhta.ua/v2.0/json/',
                ['body' => json_encode($data)]
            );
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'msg' => 'Ошибка соединения с АПИ Новой Почты!'
            ];
        }

//        $response = self::responseNovaposhta($request->getBody());
//
        return json_decode($request->getBody());
    }

    public static function getCities($request){
        $data = [
            'apiKey' => self::getApiKey(),
            'modelName' => 'Address',
            'calledMethod' => 'getCities',
            'methodProperties' => [
                'FindByString' => $request,
                'Limit' => 100
            ]
        ];
        $client = new GuzzleClient([
            'headers' => ['Content-Type' => 'application/json']
        ]);

        try {
            $request = $client->post('https://api.novaposhta.ua/v2.0/json/',
                ['body' => json_encode($data)]
            );
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'msg' => 'Ошибка соединения с АПИ Новой Почты!'
            ];
        }

//        $response = self::responseNovaposhta($request->getBody());
//
        return json_decode($request->getBody());
    }
}
