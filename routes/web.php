<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', function () {
    if (Auth::check()){
        return view('home');
    } else {
        return view('welcome');
    }
});

Route::get('/home', 'HomeController@index')->name('home');

// ----- Orders -----
Route::get('/order', 'OrderController@index')->name('order')->middleware('auth');
Route::get('/order/{model}/create', 'OrderController@create')->name('order.create')->middleware('auth');
Route::post('/order/store', 'OrderController@store')->name('order.store')->middleware('auth');
Route::delete('/order/{id}/delete', 'OrderController@delete')->name('order.delete')->middleware('auth');

// ----- Catalog -----
Route::get('/catalog', 'CatalogController@index')->name('catalog');
//Route:.get('/model')

