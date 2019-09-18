<?php

 /**
  * Основные редиректы
 */
Route::redirect('/', '/'.app()->getLocale(), 301);
Route::redirect('administration', app()->getLocale().'/administration', 301);

Route::post('mailing-subscribe', 'MailingFromSiteController@subscribe');
Route::delete('mailing-unsubscribe', 'MailingFromSiteController@unsubscribe');

Route::get('mail', function () {
    $invoice = \App\User::find(1);

    return (new App\Notifications\Auth\SendResetPassword($invoice))
        ->toMail($invoice->user);
});
/*
 * routes for plugins
 */
// dropzone images controller
Route::post('/dropzone/uploadFiles', 'Dropzone\DropzoneController@uploadImage');
Route::post('/dropzone/deleteFiles', 'Dropzone\DropzoneController@deleteImage');
// summernote images controller
Route::post('/summernote/uploadFiles', 'Administration\Admin\Blog\PostController@uploadContntImage');
Route::post('/summernote/deleteFiles', 'Administration\Admin\Blog\PostController@deleteContentImage');
Route::post('/summernote/updateContentEdit', 'Administration\Admin\Blog\PostController@updateContentEdit');

Route::group(
    [
        'prefix' => '{locale}',
        'where' => ['locale' => '[a-zA-Z]{2}'],
        'middleware' => 'setlocale'
    ], function() {

        // Auth::routes();
    /**
     * Login Route(s)
     */
    Route::get('login', 'Auth\LoginController@showLoginForm');
    Route::post('login', 'Auth\LoginController@login')->name('login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    /**
     * Register Route(s)
     */
    Route::get('register', 'Auth\RegisterController@showRegistrationForm');
    Route::post('register', 'Auth\RegisterController@register')->name('register');
    /**
     * Password Reset Route(S)
     */
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
    /**
     * Email Verification Route(s)
     */
    Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
    Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
    Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

    /*
        Rotes for guest
    */
    // home page
    Route::get('/', 'HomeController@index')->name('home');

    // news rotes
    Route::group(['prefix' => 'news'], function(){
        Route::get('/', 'User\News\NewsController@indexPosts')->name('news');
        Route::get('/{theme}', 'User\News\NewsController@showThemePosts');
        Route::get('/{theme}/{post}', 'User\News\NewsController@showPost');
    });

    // other pages
    Route::get('shipping-and-payment', 'HomeController@shippingAndPaymentPage')->name('other_shipping_and_payment');
    Route::get('exchange-and-return', 'HomeController@exchangeAndReturnPage')->name('other_exchange_and_return');
    Route::get('question-and-answer', 'HomeController@questionAndAnswerPage')->name('other_question_and_answer');
    Route::get('terms-of-use', 'HomeController@termsOfUsePage')->name('other_terms_of_use');
    Route::get('contacts', 'HomeController@contactsPage')->name('other_contacts');


    /*
        Routes to shop
    */
    // category routes
    Route::resource('categories', 'User\Categories\CategoryController')->parameters([
        'categories' => 'alias'
    ])->only(['show']);
    // subcategory routes
    Route::resource('subcategories', 'User\Subcategories\SubcategoryController')->parameters([
        'subcategories' => 'alias'
    ])->only(['show']);
    // gproducts routes
    Route::resource('products', 'User\Product\ProductController');
    // search routes
    Route::any('/search/{action}', 'User\Search\SearchController@searchActions');

    /*
     * Routes customer actions with...
    */
    Route::group(['prefix' => 'customer'], function(){
        // ...favorite products
        Route::resource('favorites', 'User\Product\FavoritesProductController');
    });
    // test routes
    //Route::get('/home', 'HomeController@index')->name('home');

    Route::view('/bucket', 'user.bucket.bucket');



    /*
           Routes for auth users
    */
    Route::group(['middleware' => 'auth'], function(){

        Route::group(['prefix' => 'customer'], function(){

            /* личный кабинет пользователя */
            Route::get('profile', 'User\UserController@profile')->name('customer.profile');
            // изменение личных данных
            Route::post('profile', 'User\UserController@profileUpdate')->name('customer.profile.update');

        });


    });

    /*
           Routes for administration site(admin + manager)
    */
    Route::group(['prefix' => 'administration'], function(){


        // rotes for login and logout administration users
        Route::get('/', 'Administration\Auth\LoginController@showLoginForm')->name('admin.login');
        Route::post('/', 'Administration\Auth\LoginController@login')->name('admin.auth');
        Route::get('/logout', 'Administration\Auth\LoginController@logout')->name('admin.logout');


        Route::group(['middleware' => 'administration'], function(){

            // administration routs for profile
            Route::get('/profile', 'Administration\Profile\ProfileController@edit');
            Route::post('/profile', 'Administration\Profile\ProfileController@update');

        });

    });

    /*
       Routes only for admin
    */
    Route::group(['prefix' => 'admin','middleware' => 'admin'], function(){

        // home for admin
        Route::get('/', 'Administration\Admin\Home\HomeController@index')->name('admin.home');

        /* conrollers for blog */
        Route::group(['prefix' => 'blog'], function(){
            // page with all themes and posts
            Route::get('/', 'Administration\Admin\Blog\BlogController@index')->name('admin.blog');
            //resourse controller for blog's themes
            Route::resource('themes', 'Administration\Admin\Blog\ThemeController');
            //resourse controller for blog's posts
            Route::resource('posts', 'Administration\Admin\Blog\PostController');
        });

        /* Settings */
        Route::group(['prefix' => 'settings'], function(){

            /* settings content */
            Route::group(['prefix' => 'content'], function(){
                // home content group
                Route::group(['prefix' => 'home'], function(){
                    // page index setting home page
                    Route::get('/', 'Administration\Admin\Settings\Content\HomeController@index');
                    // resourse controller for setting first slider on home page
                    Route::resource('f-sliders', 'Administration\Admin\Settings\Content\FirstSliderController')->except(['index']);
                    // resourse controller for setting mozaiks on home page
                    Route::resource('mozaiks', 'Administration\Admin\Settings\Content\HomeMozaikController')->except(['create', 'store']);
                });
            });

            /* settings prodoction */
            // categories setting
            Route::resource('categories', 'Administration\Admin\Settings\CategoryController')->parameters([
                'categories' => 'alias'
            ])->except(['store', 'create', 'destroy']);
            // subcategories setting
            Route::resource('subcategories', 'Administration\Admin\Settings\SubcategoryController')->parameters([
                'subcategories' => 'alias'
            ])->except(['destroy']);
            Route::post('subcategories/{id}/{action}', 'Administration\Admin\Settings\SubcategoryController@actions');
            // params setting
            Route::resource('params', 'Administration\Admin\Settings\ParamController')->except(['destroy']);
            Route::post('params/{id}/{action}', 'Administration\Admin\Settings\ParamController@actions');
            // pvalues setting
            Route::resource('pvalues', 'Administration\Admin\Settings\PvalueController')->except(['show', 'index', 'destroy']);
        });
    });

    /*
      Routes only for manager
    */
    Route::group(['prefix' => 'manager','middleware' => 'manager'], function(){

        // home for manager
        Route::get('/', 'Administration\Manager\Home\HomeController@index')->name('manager.home');
        // categories routs
        Route::resource('categories', 'Administration\Manager\Categories\CategoryController')->parameters([
            'categories' => 'alias'
        ])->except(['create','store','edit','update','destroy']);
        // subcategories routs
        Route::resource('subcategories', 'Administration\Manager\Subcategories\SubcategoryController')->parameters([
            'subcategories' => 'alias'
        ])->except(['create','store','edit','update','destroy']);
        Route::post('subcategory/{action}', 'Administration\Manager\Subcategories\SubcategoryController@actions');
        // params routs
        Route::resource('params', 'Administration\Manager\Params\ParamController')->parameters([
            'params' => 'id'
        ])->except(['create','store','edit','update','destroy']);
        Route::post('param/{action}', 'Administration\Manager\Params\ParamController@actions');
        // gproducts routs
        Route::resource('gproducts', 'Administration\Manager\Gproducts\GproductController')->parameters([
            'gproducts' => 'alias'
        ]);
    });


    /*
     * API's routes
     * */
    Route::group(['prefix' => 'guzzle'], function(){

        /* novaposhta api */
        Route::group(['prefix' => 'novaposhta'], function(){
            // test routes
            Route::get('/', 'Api\NovaposhtaController@index');
            Route::post('/searchSettlements', 'Api\NovaposhtaController@searchSettlements');
            Route::post('/searchWarehouses', 'Api\NovaposhtaController@searchWarehouses');
        });
    });
});

// Тестовые роуты для Vue.js Можно удалить
//Route::get('/start/data-chart', 'HomeController@chartData');
//Route::get('/start/data-chart-rand', 'HomeController@chartDataRand');
//Route::get('ru/start/new-event', 'HomeController@newEvent');
