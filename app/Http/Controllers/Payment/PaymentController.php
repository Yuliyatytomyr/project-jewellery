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

        // $Data = [
        //       "date_from" => date('d.m.Y H:i:s', time() - 3600),
        //       "date_to" => date('d.m.Y H:i:s'),
        // ];
        // $reports = \Cloudipsp\Payment::reports($Data);
        // $data = $reports->getData();
        // print_r($data);
        $data = [
                'order_desc' => 'tests SDK',
                'currency' => 'USD',
                'amount' => 1000,
                'response_url' => 'http://site.com/responseurl',
                'server_callback_url' => 'http://site.com/callbackurl',
                'sender_email' => 'test@fondy.eu',
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
        print_r($data);
        
        // $recurringData = [
        //     'currency' => 'USD',
        //     'amount' => 1000,
        //     'rectoken' => $token
        // ];
        // $recurring_order = \Cloudipsp\Payment::recurring($recurringData);
        // print_r($recurring_order->getData());

        // $url = Checkout::url($data);
        // $data = $url->getData();
        // print_r($data);
        //     $data = [
        //         'order_desc' => 'tests SDK',
        //         'currency' => 'USD',
        //         'amount' => 1000,
        //         'merchant_data' => [
        //             'custom_data1' => 'Some string'
        //         ]
        //     ];
        //    $form = \Cloudipsp\Checkout::form($data);
        //    print_r($data);
    }
}
