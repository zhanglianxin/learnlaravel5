<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/', 'HomeController@index'); // 前台主页

Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'HomeController@index'); // 后台主页
//    Route::get('article', 'ArticleController@index'); // 文章管理
    Route::resource('article', 'ArticleController'); // 资源路由
});

Route::get('article/{id}', 'ArticleController@show'); // 前台文章展示

Route::post('comment', 'CommentController@store'); // 前台评论存储



