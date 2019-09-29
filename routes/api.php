<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('categories', 'User\Categories\CategoryController@getCategories');
Route::get('subcategories', 'User\Subcategories\SubcategoryController@getSubcategories');
Route::get('/{category}/subcategories', 'User\Subcategories\SubcategoryController@getSubcategoriesByIdCategory');

Route::group(['prefix' => 'gproducts'], function(){
    Route::get('/categories/{category}', 'GproductController@getByCategory');
    Route::get('/subcategories/{subcategory}', 'GproductController@getBySubcategory');
    Route::get('/', 'GproductController@index');
    Route::get('/{gproduct}', 'GproductController@show');
    Route::post('/', 'GproductController@store');
    Route::delete('/{gproduct}', 'GproductController@destroy');
    Route::put('/{gproduct}', 'GproductController@updateGproduct');
    // Route::put('/{gproduct}/product', 'GproductController@updateProduct');
    Route::post('/photo/{gproduct}', 'GproductController@updateGproductPhoto');
});

Route::group(['prefix' => 'period_product'], function(){
    Route::get('/', 'PeriodProductController@getAll');
    Route::get('/{period_product}', 'PeriodProductController@getById');
    Route::post('/', 'PeriodProductController@create');
});