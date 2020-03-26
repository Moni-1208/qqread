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
	
Route::prefix('login')->group(function () {
Route::get('/log','Index\LogController@log');
Route::post('/log_do','Index\LogController@log_do');
Route::get('/reg','Index\LogController@reg');
Route::post('/reg_do','Index\LogController@reg_do');
});