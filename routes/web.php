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

Route::group(['prefix' => '/en', 'middleware' => []], function () {
   // ENGLISH
});


Route::group(['prefix' => '/dashboard', 'middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/', 'Dashboard\IndexDashboardController@index');
    Route::get('/logout', 'Dashboard\IndexDashboardController@doLogout');
    Route::get('/users', 'Dashboard\UsersDashboardController@index');
});

Route::get('/react-version', function () {
    return view('react-version');
});

Route::group(['prefix' => 'login'], function () {
    Route::get('/', 'AuthController@getLoginView')->name('login');
    Route::post('/', 'AuthController@doLogin');
});

Route::group(['prefix' => 'register'], function () {
    Route::get('/', 'AuthController@getRegisterView');
    Route::post('/', 'AuthController@doRegistration');
});

Route::get('/logout', 'AuthController@doLogout');

Route::group(['prefix' => 'contact-us', 'middleware' => []], function () {
    Route::get('/', 'ContactController@getContactUsView');
    Route::post('/', 'ContactController@saveFeedback');
});

Route::group(['prefix' => '/', 'middleware' => []], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@getHomeView');
    Route::post('/home', 'HomeController@addToCart');
});
Route::group(['prefix' => 'shopping-cart', 'middleware' => ['auth']], function () {
    Route::get('/', 'CartController@index');
    Route::post('/delete', 'CartController@deleteItemFromCart');
    Route::post('/delete-all', 'CartController@cancelOrder');

});


Route::group(['prefix' => 'tests', 'middleware' => []], function () {
    Route::get('/upload-file', 'TestingController@getUploadFileView');
    Route::post('/upload-file', 'TestingController@doUploading');
});

// Middleware OK
// Naming Routes OK
// Upload Images OK
// Controller (Update / Delete)
// API
// Dashboard