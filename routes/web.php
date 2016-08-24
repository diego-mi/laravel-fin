<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::resource('transacao', 'TransactionController');
Route::resource('categoria', 'CategoryController');
Route::resource('origem', 'SourceController');
Route::resource('tipo-operacao', 'TypeOperationController');

Auth::routes();

Route::get('/home', 'HomeController@index');
#Route::get('/', 'TransactionController@index');