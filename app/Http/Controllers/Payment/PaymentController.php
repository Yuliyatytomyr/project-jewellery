<?php

namespace App\Http\Controllers\Payment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Cloudipsp\Configuration;
use \Cloudipsp\Checkout;
use App\Models\Product;
use App\Models\PeriodProduct;
use App\Models\Gproduct;
use Illuminate\Support\Facades\Storage;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

class PaymentController extends Controller
{
    public function test(){
                
        $file_n = Storage::disk('public')->path('12345.csv');

        $file = fopen('php://memory', 'w+');

        fwrite($file, iconv('CP1251', 'UTF-8', file_get_contents($file_n)));
        rewind($file);
        $all_data = array();
        while (($row = fgetcsv($file, 1000, "|", "|")) !== false){

            $str = strip_tags($row[8]);
            
            preg_match_all("#Вставка 1: (.*)$#i", $str, $vstavkaString);

            preg_match_all('/Количество камней: [0-9]*/', $str, $amoutKamnyString);
            preg_match_all('!\d+!', implode(" ", $amoutKamnyString[0]), $amoutKamny);

            preg_match_all('/Масса: [-+]?[0-9]*\,?[0-9]+/', $str, $weightKamnyString);
            preg_match_all('/[-+]?[0-9]*\,?[0-9]+/', implode(" ", $weightKamnyString[0]), $weightKamny);
     
            preg_match_all('#Вес, грамм: [-+]?[0-9]*\,?[0-9]+#', $str, $weightStr);
            preg_match_all('/[-+]?[0-9]*\,?[0-9]+/', implode(" ", $weightStr[0]), $weight);
     
            preg_match_all('#Проба: [0-9]*#', $str, $probaString);
            preg_match_all('!\d+!', implode(" ", $probaString[0]), $proba);

            preg_match_all('#Форма огранки: Кр [0-9]*#', $str, $formaOgrankyString);
            preg_match_all('#Кр [0-9]*#', $str, $formaOgranky);

            preg_match_all("#Гр. цвета/чистоты/кл. огранки: [0-9]/[0-9][A-Z]#", $str, $GrColorString);
            preg_match_all('#[0-9]/[0-9][A-Z]#', implode(" ", $GrColorString[0]), $GrColor);

            array_push($all_data, [
                "sku" => $row[0],
                "sku_option" => $row[1],
                "name" => $row[2],
                "razmer" => $row[3],
                "ves" => $row[4],
                "price" => $row[5],
                "discount" => $row[6],
                "special_price" => $row[7],
                "description" => $row[8],
                "description_ua" => $row[9],
                "brand_new" => $row[10],
                "weight" => array_shift($weight[0]),
                "probe" => array_shift($proba[0]),
                "amountKamny" => array_shift($amoutKamny[0]),
                "weightKamny" => array_shift($weightKamny[0]),
                "formOgranky" => array_shift($formaOgranky[0]),
                "GrColor" => array_shift($GrColor[0])
            ]);

        }

        foreach($all_data as $elementKey => $element) {
            foreach($element as $valueKey => $value) {
                if($valueKey == 'sku' && $value == 'sku'){
                    unset($all_data[$elementKey]);
                } 
            }
        }

        PeriodProduct::truncate();
        foreach($all_data as $elementKey => $element){

            $findProduct = Product::where('sku_option', $element["sku_option"])->with(['gproduct'])->first();
            if($findProduct !== null){
                $findProduct->update([
                    "size" => (float)str_replace(',', '.', $element["razmer"]),
                    "sale" => (float)$element["discount"],
                    "weight" => (float)str_replace(',', '.', $element["weight"] ),
                    "total_sum" => (float)str_replace(' ', '', $element["special_price"]),
                    "g_price" => (float)str_replace(' ','', $element["price"])
                ]);
                $findProduct->gproduct->update([
                    "desc_ru" => $element["description"],
                    "desc_ua" => $element["description_ua"],
                ]);
            }
            else{
                $period_product = new PeriodProduct();
                $period_product->sku = $element["sku"];
                $period_product->sku_option = $element["sku_option"];
                $period_product->name = $element["name"];
                $period_product->razmer = $element["razmer"];
                $period_product->ves = $element["ves"];
                $period_product->price = $element["price"];
                $period_product->discount = $element["discount"];
                $period_product->special_price = $element["special_price"];
                $period_product->description = $element["description"];
                $period_product->description_ua = $element["description_ua"];
                $period_product->brand_new = $element["brand_new"];
                $period_product->weight = $element["weight"];
                $period_product->probe = $element["probe"];
                $period_product->amountKamny = $element["amountKamny"];
                $period_product->weightKamny = $element["weightKamny"];
                $period_product->formOgranky = $element["formOgranky"];
                $period_product->GrColor = $element["GrColor"];
                $period_product->save();
            }

        }
        //print_r($all_data);
        fclose($file);

        return response('Success', 200);
       
       
    }

    public function payment(Request $request){
        // print_r($request->product_id);
        // print_r(gettype($request->product_id));
        Configuration::setMerchantId(1396424);
        Configuration::setSecretKey('test');

        $data = [
                'order_desc' => 'Checkout',
                'currency' => $request->input('currency'),
                'amount' => $request->input('amount'),
                'response_url' => 'http://localhost:8000/payment/approved',
                'server_callback_url' => 'https://localhost:8000/payment/result',
                'sender_email' => $request->input('email'),
                'lang' => 'ru',
                'product_id' => $request->product_id,
                'lifetime' => 36000,
                'sender_cell_phone' => $request->sender_cell_phone,
                'merchant_data' => array(
                    'custom_data1' => 'Some string'
                )
        ];

        $url = Checkout::url($data);
        $token = Checkout::token($data);
        $data = $url->getData();
        return $data;     
        // $someArray = [
        //     [
        //     //   "gproduct_id" => 2,
        //       "size" => 18,
        //       "weight" => 18,
        //       "g_price" => 16,
        //       "sale" => 4,
        //       "total_sum" => 222
        //     ],
        //     [
        //         "size" => 17.5,
        //         "weight" => 18,
        //         "g_price" => 16,
        //         "sale" => 4,
        //         "total_sum" => 222
        //     ],
        //     [
        //         "size" => 18,
        //         "weight" => 18,
        //         "g_price" => 16,
        //         "sale" => 4,
        //         "total_sum" => 222
        //     ]
        //   ];
        // $someJSON = json_encode($someArray);

        // //Product::where('gproduct_id', 8)->update(['orderData' => $someJSON]);

        // //echo $someJSON;
        // $product = Product::where('gproduct_id', 8)->get();

        // echo $product;

    }

    public function approved(){
        try {
            
            $result = new \Cloudipsp\Result\Result();
            if ($result->getData()){
                print_r(json_encode($result->getData(), true));
                // print_r(json_encode($result->getData()["order_id"], true));
                // print_r($result->getData()["product_id"]);
                // print_r(gettype($result->getData()["product_id"]));

                // $products_id = explode( ",", $result->getData()["product_id"]);
                // print_r($products_id);
                // print_r(gettype($products_id));
                //$res = json_encode($result->getData());
                //print_r($res["order_id"]);
                //return view('payment')->with('result', $result->getData());
            }
            else{
                die('No data');
            }

        } catch (\Exception $e) {
                echo "Fail: " . $e->getMessage();
        }
    }
}
