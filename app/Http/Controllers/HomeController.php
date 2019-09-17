<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NewEvent;
// models
use App\Models\Category;
use App\Models\Settings\Content\ContentHomeSlider;
use App\Models\Settings\Content\ContentHomeMozaik;
use App\Models\Btpost;

class HomeController extends Controller
{
    public function index(Request $request, $locale)
    {
        //settings
        $array_titles  = ['ru'=>'Главная','ua'=>'Головна'];
        $f_sliders = ContentHomeSlider::select(['id', 'alt', 'link', 'image_thumb', 'image_full'])
            ->where('show_on', 1)->get();
        $mozaiks = ContentHomeMozaik::all();
        $btposts = Btpost::select(['id', 'alias', 'btheme_id', 'title_ru', 'title_ua', 's_desc_ru', 's_desc_ua', 'image_path', 'updated_at'])
            ->where('show_on', 1)->orderBy('updated_at', 'desc')->limit(8)->with('btheme:id,alias')->get();

        return view('user.home.home', compact('f_sliders', 'mozaiks', 'btposts'))->withTitle($array_titles[app()->getLocale()]);
    }


    /*
     * other pages
     * */
    public function shippingAndPaymentPage(Request $request, $locale){
        // settings
        $array_titles = ['ru' => 'Доставка и оплата', 'ua' => 'Доставка та оплата'];

        return view('user.other.shipping_and_payment.shipping_and_payment')->withTitle($array_titles[app()->getLocale()]);
    }

    public function exchangeAndReturnPage(Request $request, $locale){
        // settings
        $array_titles = ['ru' => 'Обмен и возврат', 'ua' => 'Обмін та повернення'];

        return view('user.other.exchange_and_return.exchange_and_return')->withTitle($array_titles[app()->getLocale()]);
    }

    public function questionAndAnswerPage(Request $request, $locale){
        // settings
        $array_titles = ['ru' => 'Вопрос и ответ', 'ua' => 'Питання та відповідь'];

        return view('user.other.question_and_answer.question_and_answer')->withTitle($array_titles[app()->getLocale()]);
    }

    public function termsOfUsePage(Request $request, $locale){
        // settings
        $array_titles = ['ru' => 'Пользовательское соглашение', 'ua' => 'Угода користувача'];

        return view('user.other.terms_of_use.terms_of_use')->withTitle($array_titles[app()->getLocale()]);
    }

    public function contactsPage(Request $request, $locale){
        // settings
        $array_titles = ['ru' => 'Контакты', 'ua' => 'Контакти'];

        return view('user.other.contacts.contacts')->withTitle($array_titles[app()->getLocale()]);
    }

    // Старые методы, можно удалить
//    public function chartData(){
//        return [
//            'labels' => ['mart', 'april', 'may', 'june'],
//            'datasets' => array([
//                'label' => 'selles',
//                'backgroundColor' => '#F26202',
//                'data' => [12000, 4000, 8000, 20000]
//            ])
//
//        ];
//    }
//
//    public function chartDataRand(){
//        return [
//            'labels' => ['mart', 'april', 'may', 'june'],
//            'datasets' => [
//                [
//                'label' => 'selles',
//                'backgroundColor' => '#F'.rand(11111, 99999),
//                'data' => [rand(1000, 50000), rand(1000, 50000), rand(1000, 50000), rand(1000, 50000)]
//                ],
//                [
//                    'label' => 'selles2',
//                    'backgroundColor' => '#F'.rand(11111, 99999),
//                    'data' => [rand(1000, 50000), rand(1000, 50000), rand(1000, 50000), rand(1000, 50000)]
//                ],
//                [
//                    'label' => 'selles3',
//                    'backgroundColor' => '#F'.rand(11111, 99999),
//                    'data' => [rand(1000, 50000), rand(1000, 50000), rand(1000, 50000), rand(1000, 50000)]
//                ],
//                [
//                    'label' => 'selles4',
//                    'backgroundColor' => '#F'.rand(11111, 99999),
//                    'data' => [rand(1000, 50000), rand(1000, 50000), rand(1000, 50000), rand(1000, 50000)]
//                ],
//            ]
//
//        ];
//    }
//
//    public function newEvent(Request $request){
//        $result = [
//            'labels' => ['mart', 'april', 'may', 'june'],
//            'datasets' => [
//                [
//                    'label' => 'selles',
//                    'backgroundColor' => '#F26202',
//                    'data' => [12000, 4000, 8000, 20000],
//                ]
//            ]
//        ];
//
//        if($request->has('label')){
//            $result['labels'][] = $request->label;
//            $result['datasets'][0]['data'][] = (int) $request->sale;
//
//            if($request->has('realtime')){
//                if(filter_var($request->realtime, FILTER_VALIDATE_BOOLEAN)){
//                    event(new NewEvent($result));
//                }
//            }
//        }
//
//        return $result;
//    }
}
