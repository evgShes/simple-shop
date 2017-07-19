<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'auth'], function () {
    Route::get('/{city?}', [
        'as' => 'products',
        'uses' => 'ProductController@getProducts'
    ])->where(['city' => '[0-9]+']);

    Route::get('test', [
        'as' => 'test',
        'uses' => 'ProductController@test'
    ]);


    Route::group(['prefix' => 'cart'], function () {
        Route::get('add/{id}', [
            'as' => 'product.addToCart',
            'uses' => 'ProductController@getAddToCart'
        ]);

        Route::get('view', [
            'as' => 'cart.view',
            'uses' => 'ProductController@getCartView'

        ]);

        Route::get('reduce-one/{id}', [
            'as' => 'cart.reduce.one',
            'uses' => 'ProductController@getCartReduce'

        ]);

        Route::get('increase-one/{id}', [
            'as' => 'cart.increase.one',
            'uses' => 'ProductController@getCartIncrease'

        ]);

        Route::get('reduce-all/{id}', [
            'as' => 'cart.reduce.all',
            'uses' => 'ProductController@getCartRemove'
        ]);

        Route::get('destroy', [
            'as' => 'cart.destroy',
            'uses' => 'ProductController@getCartDestroy'
        ]);

        Route::get('buy', [
            'as' => 'cart.buy',
            'uses' => 'ProductController@getBuy'
        ]);

        Route::get('history', [
            'as' => 'cart.history',
            'uses' => 'ProductController@getShowHistory'
        ]);
    });

    Route::group(['prefix' => 'admin'], function () {
        Route::get('product', [
            'as' => 'adm.prod',
            'uses' => 'HomeController@getViewProdEdit'
        ]);
        Route::post('product', [
            'as' => 'adm.prod.save',
            'uses' => 'HomeController@postSaveProd'
        ]);
    });
});


Auth::routes();
Route::get('logout', [
    'as'=>'logout',
    'uses'=>'Auth\LoginController@logout'
]);
Route::get('/home', 'HomeController@index')->name('home');
