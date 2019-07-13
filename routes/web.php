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

// Route::get('/', function () {
//     return view('');
// });

Auth::routes();
Route::get('/formOrder/{id}', 'FrontController@form')->name('order');
Route::get('/', 'FrontController@index')->name('pageone');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'OrderController@index')->name('dashboard');
Route::get('/order', 'OrderController@order')->name('order');
Route::get('formOrder/insert/{id}', 'FrontController@insert')->name('form.insert');
