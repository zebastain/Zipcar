<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', function () {
    if (Auth::check()){
        return redirect('order');   
    } else {
        return view('welcome');
    }
});

Route::middleware('auth')->group(function(){
    Route::resource('order', 'OrderController')->only([
        'index', 'store', 'destroy'
    ]);

    Route::resource('account', 'UserController')->only([
        'index', 'update', 'destroy'
    ]);

    Route::resource('incident', 'IncidentController')->only([
        'destroy', 'update', 'store'
    ]);
});

Route::get('/cars/{model}', 'CarsController@index');
Route::get('/car/{id}', 'CarsController@show')->name('car.show');
Route::get('/catalog', 'CatalogController@index')->name('catalog');
Route::get('/model/{id}', 'CarModelController@show')->name('model.show');
