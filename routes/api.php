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

// Application Programming Interface.

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['middleware' => ['cors']], function () {
    Route::post('/login', 'AuthAPIController@doLogin');

    Route::post('/logout', 'AuthAPIController@doLogout');

    Route::group(['prefix' => 'chatting'], function () {
        Route::get('/', 'ChatsAPIController@getChats');
        Route::get('/{uID}/messages', 'ChatsAPIController@getMessages');
        Route::post('/{uID}/send', 'ChatsAPIController@sendMessage');
    });

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', 'CategoriesAPIController@index');
        Route::get('/{cID}/products', 'CategoriesAPIController@getCatProducts');
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('/{pID}/details', 'ProductsAPIController@getProductDetails');
    });
});