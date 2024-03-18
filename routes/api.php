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

Route::group(['namespace' => 'Api'] , function (){
    /**
     * products API routes
     */
    Route::group(['prefix' => 'products' ] , function (){
        Route::get('/' ,['as' => 'api.products' , 'uses' => 'OrderController@getIndex']);
        Route::get('/{slug}' ,['as' => 'api.products' , 'uses' => 'OrderController@getSingleProduct']);
    });

    /**
     * Make and order API Route
     */
    Route::post('/save-order' ,['as' => 'api.order' ,'uses' => 'OrderController@postSave']);
    Route::post('/checkout/{id}' ,['as' => 'api.checkout' ,'uses' => 'OrderController@postSaveCheckout']);

    /**
     * content API
     */
    Route::get('/content' ,['as' => 'api.content' ,'uses' => 'OrderController@getContent']);

    /**
     * subscribe API
     */
    Route::post('/subscribe' ,['as' => 'api.subscribe' ,'uses' => 'OrderController@postSubscribe']);

    /**
     * messages API
     */
    Route::post('/contact-us' ,['as' => 'api.contact' ,'uses' => 'OrderController@postIndex']);
});