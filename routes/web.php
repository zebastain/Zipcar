<?php

use Illuminate\Support\Facades\Route;

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



//-----------orders
Route::get('/order', 'OrderController@index')->name('order')->middleware('auth');
Route::post('/order/create', 'OrderController@create')->name('order.create')->middleware('auth');
Route::delete('/order/{id}/cancel', 'OrderController@delete')->name('order.delete')->middleware('auth');