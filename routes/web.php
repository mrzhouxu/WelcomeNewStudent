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
    return view('index');
});
Route::get('/getInfo/{id}', 'Admin\StudentController@getInfo');
Route::post('/login', 'Index\IndexController@login');  //绑定提示页面

Route::group(['prefix' => 'admin'], function (){
    Route::get('/index', 'Admin\StudentController@index');
    Route::get('/count', 'Admin\StudentController@count');
    Route::get('/logout', 'Admin\LoginController@logout');
});

Route::get('/admin/login', 'Admin\LoginController@index');
Route::post('/admin/login', 'Admin\LoginController@login');
