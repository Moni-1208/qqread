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
	

// 获取用户信息接口
Route::get('test/prevent','Test\PreventController@prevent');

Route::get('test/tests','Test\PreventController@tests');
Route::post('test/md5post','Test\PreventController@md5post');