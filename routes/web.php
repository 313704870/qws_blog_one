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
Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');

Route::get('signup', 'UsersController@create')->name('signup');

//restful api 的使用
Route::resource('users', 'UsersController');

/**
Route::get('/users','UsersController@index')->name('users.index');
Route::get('/users/{user}','UsersController@show')->name('users.show');
Route::get('/users/create','UsersController@show')->name('users.create');
Route::post('/users','UsersController@store')->name('users.store');
Route::get('/users/{user}/edit','UsersController@show')->name('users.edit');
Route::patch('/users/{user}', 'UsersController@update')->name('users.update');
Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');
 **/

Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');

Route::get('signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');


//找回密码
//1、查找密码页面 2、发送邮件页面 3、修改密码页面 4、提交更新路由
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');


//微博路由
Route::resource('statuses', 'StatusesController', ['only' => ['store', 'destroy']]);

//关注人列表
Route::get('/users/{user}/followings', 'UsersController@followings')->name('users.followings');
//粉丝列表
Route::get('/users/{user}/followers', 'UsersController@followers')->name('users.followers');

//关注 、 取消关注
Route::post('/users/followers/{user}', 'FollowersController@store')->name('followers.store');
Route::delete('/users/followers/{user}', 'FollowersController@destroy')->name('followers.destroy');