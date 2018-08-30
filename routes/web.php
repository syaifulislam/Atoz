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

Route::get('/', function () {
    return redirect('login');
}); 

Route::get('/register','UsersController@register');

Route::get('/logout','UsersController@logout');

Route::group(['prefix'=>'login'],function(){

    Route::get('/','UsersController@login');

    Route::post('/authenticate','UsersController@authenticate');

    Route::post('/register','UsersController@create');

});

// untuk memisahkan route yang harus login terlebih dahulu
Route::group(['middleware' => ['sentinelAuth'] ], function() {

    Route::get('/dashboard', function () {
        return view('welcome');
    });

    Route::group(['prefix'=>'prepaid-balance'],function(){

        Route::get('/','PrepaidController@index');

        Route::post('/submit','PrepaidController@create');

        Route::get('/result/{id}','PrepaidController@result');
    });

    Route::group(['prefix'=>'product'],function(){

        Route::get('/', 'ProductController@index');

        Route::post('/submit','ProductController@create');

        Route::get('/result/{id}', 'ProductController@result');
    });

    Route::group(['prefix'=>'payment'],function(){

        Route::get('/','PaymentController@index');

        Route::post('/submit','PaymentController@submit');

        Route::get('/submit','PaymentController@submit');

    });

    Route::group(['prefix'=>'order'],function(){

        Route::get('/','OrderController@index');
    });
});