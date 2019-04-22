<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('/', 'index/layout')->name('layout');
Route::get('capture', 'login/verify')->name('capture');
Route::get('login', 'login/login')->name('login');
Route::get('geetest_show_verify', 'login/geetest_show_verify')->name('geetest_show_verify');
Route::post('login/doLogin', 'login/doLogin')->name('doLogin');
Route::get('logout', 'login/logout')->name('logout');

//首页
Route::group('index', function(){
    Route::get('home', 'index/home')->name('home');
    Route::get('fcdetail', 'index/fcdetail')->name('index.fcdetail');
    Route::get('setpwd', 'index/setpwd')->name('index.setpwd');
})->prefix('index/');

Route::group('test', function(){
    Route::get('index', 'test/index')->name('test.index');
    Route::get('test', 'test/test')->name('test.test');
});



return [

];
