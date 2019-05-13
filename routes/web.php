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
    Route::get('/','IndexController@index')->name('index');
    Route::get('index','IndexController@index')->name('index');
    //首页数据分析
    Route::get('main','IndexController@main')->name('main');
    //退出登录
    Route::get('logout','LoginController@logout')->name('logout');
    //管理员个人信息
    Route::get('info','IndexController@info')->name('myInfo');
    //修改管理员个人信息
    Route::post('update','IndexController@update')->name('update');
    //修改管理员密码
    Route::get('password','IndexController@password')->name('password');

    //用户管理
    Route::resource('user','UserController',['only'=>['index','create','store','update','edit']])->names([
       'index' => 'user'
    ]);


});
