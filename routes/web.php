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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () { 
    Route::get('/dashboard', 'OrderController@index')->name('dashboard');
    Route::get('/order', 'OrderController@order')->name('order');
    Route::get('order/edit/{id}', 'OrderController@edit')->name('order.edit');
    Route::get('order/delete/{id}', 'OrderController@destroy')->name('order.delete');
    Route::post('order/update/{id}/{cid}', 'OrderController@update')->name('order.update');
    Route::get('order/selesai/{id}', 'OrderController@selesai')->name('order.selesai');
    Route::get('order/history', 'OrderController@history')->name('order.history');
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');    
});


