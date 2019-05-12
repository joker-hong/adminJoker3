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

Route::group(['namespace'=>'admin'],function(){
    //登陆
    Route::get('login','LoginController@index')->name('login');
    //验证登陆提交
    Route::post('login/submit','LoginController@submit')->name('submit');
    //首页
    Route::get('main','IndexController@main')->name('main');



});
