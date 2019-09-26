<?php

namespace App\Http\Controllers\Payment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Cloudipsp\Configuration;
use \Cloudipsp\Checkout;

class PaymentController extends Controller
{
    public function payment(Request $request){
        
        Configuration::setMerchantId(1396424);
        Configuration::setSecretKey('test');

        $data = [
                'order_desc' => 'tests SDK',
                'currency' => 'USD',
                'amount' => 1000,
                'response_url' => 'https://localhost:8000/payment/result',
                'server_callback_url' => 'https://localhost:8000/payment/result',
                'sender_email' => $request->input('email'),
                'lang' => 'ru',
                'product_id' => 'some_product_id',
                'lifetime' => 36000,
                'merchant_data' => array(
                    'custom_data1' => 'Some string',
                    'custom_data2' => '00000000000',
                    'custom_data3' => '3!@#$%^&(()_+?"}'
                )
        ];

        $url = Checkout::url($data);
        $token = Checkout::token($data);
        $data = $url->getData();
        return $data;     
    }

    public function result(){
        try {
            
            print_r("HELLO");

        } catch (\Exception $e) {
                echo "Fail: " . $e->getMessage();
        }
    }
}
