<?php

namespace App\Http\Controllers\User\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// models
use App\Models\Gproduct;
use App\Models\FavoritesProduct;

class FavoritesProductController extends Controller
{
    public function index(Request $request, $locale){

        // редирект авторизованого пользователя на страницу избранное в личном кабинете
        if(!\Auth::guest()){
            return redirect(app()->getLocale().'/customer/profile?page_type=favorites');
        }

        // settings
        $array_titles = ['ru' => 'Избранное', 'ua' => 'Обране'];

        if(session('products.favorites')){

            // удаление из сессии избранное если товар не в наличии при переходе на страницу избранное
            $gproducts_has_not = Gproduct::whereIn('id', session('products.favorites'))->whereDoesntHave('productsNew')->get();
            if(count($gproducts_has_not) > 0){
                $products = session()->pull('products.favorites', []); // Second argument is a default value
                foreach ($gproducts_has_not as $gp_has_not){
                    if(($key = array_search($gp_has_not->id, $products)) !== false) {
                        unset($products[$key]);
                    }
                    $request->session()->put('products.favorites', $products);
                }
            }

            $gproducts = Gproduct::whereIn('id', session('products.favorites'))->whereHas('productsNew')->get();
        }else{
            $gproducts = Gproduct::whereIn('id', [0])->get();
        }

        return view('user.favorites.index.index', compact('gproducts'))->withTitle($array_titles[app()->getLocale()]);
    }

    public function store(Request $request, $locale){

        // msg
        $array_msg = [
            'add' => ['ru' => 'Товар добавлен в "избранное"', 'ua' => 'Товар доданий в "обране"'],
            'remove' => ['ru' => 'Товар удален из "избранное"', 'ua' => 'Товар вилучений з "обране"'],
            'not_found' => ['ru' => 'Изделия нет в наличии!', 'ua' => 'Вироба немає в наявності!']
        ];
        $action = '';

        if(\Auth::guest()){
            // проверка наличия изделий у выбранного товара
            if(self::checkAvailGproduct($request->gproduct_id)){
                // объявляем массив избранных товаров
                $array_favorites_products = (session('products.favorites')) ? session('products.favorites') : [];

                // проверка на наличие данного товара в сессии
                if(!in_array($request->gproduct_id, $array_favorites_products)){
                    // добавляем в сессию товар
                    $request->session()->push('products.favorites', $request->gproduct_id);
                    $action = 'add';
                }else{
                    // удаляем из сессии товар
                    $products = session()->pull('products.favorites', []); // Second argument is a default value
                    if(($key = array_search($request->gproduct_id, $products)) !== false) {
                        unset($products[$key]);
                    }
                    $request->session()->put('products.favorites', $products);
                    $action = 'remove';
                }

                return json_encode([
                    'status' => 'success',
                    'msg' => $array_msg[$action][app()->getLocale()],
                    'count' => count(session('products.favorites'))
                ]);

            }else{
                $action = 'not_found';
                return json_encode([
                    'status' => 'error',
                    'msg' => $array_msg[$action][app()->getLocale()],
                ]);
            }

        }else{

            if(self::checkAvailGproduct($request->gproduct_id)){

                $user = \Auth::user();
                $favorite_product_db = FavoritesProduct::where('user_id', $user->id)->where('gproduct_id', $request->gproduct_id)->first();
                if(!$favorite_product_db){
                    FavoritesProduct::create([
                        'user_id' => $user->id,
                        'gproduct_id' => $request->gproduct_id
                    ]);
                    $action = 'add';
                }else{
                    $favorite_product_db->delete();
                    $action = 'remove';
                }

                $count_favorites = count(\Auth::user()->favorites_products);
                return json_encode([
                    'status' => 'success',
                    'msg' => $array_msg[$action][app()->getLocale()],
                    'count' => $count_favorites
                ]);

            }else{
                $action = 'not_found';
                return json_encode([
                    'status' => 'error',
                    'msg' => $array_msg[$action][app()->getLocale()],
                ]);
            }
        }
    }

    public function destroy(Request $request, $locale, $id){

        if(\Auth::guest()){
            $products = session()->pull('products.favorites', []); // Second argument is a default value
            if(($key = array_search($id, $products)) !== false) {
                unset($products[$key]);
            }
            $request->session()->put('products.favorites', $products);

            return json_encode([
                'status' => 'success',
                'userType' => 'guest',
                'count' => count(session('products.favorites')),
                'id' => $id,
                'render' => view('user.favorites.index.layouts.clean_favorite_block')->render()
            ]);
        }else{
            $user = \Auth::user();

            FavoritesProduct::where('user_id', $user->id)->where('gproduct_id', $id)->delete();

            $gproducts_ids = \Auth::user()->favorites_products->pluck('id');
            $gproducts = Gproduct::whereIn('id', $gproducts_ids)->paginate(1)->appends(['page_type' =>'favorites']);
            $gproducts->withPath(asset(app()->getLocale().'/customer/profile'));

            $count_favorites = count(\Auth::user()->favorites_products);
            return json_encode([
                'status' => 'success',
                'userType' => 'auth',
                'request' => $request->all(),
                'count' => $count_favorites,
                'id' => $id,
                'render' => view('user.profile.index.layouts.profile_content.favorites', compact('gproducts'))->render()
            ]);
        }
    }

    private function checkAvailGproduct($id){

        $gproduct = Gproduct::where('id', $id)->whereHas('productsNew')->first();
        if($gproduct){
            return true;
        }
        return false;
    }


}
