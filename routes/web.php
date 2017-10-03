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
    return view('users.pages.home');
});
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
//////////
Route::get('/logout', 'Auth\LoginController@getLogout');
Route::get('social/redirect', 'Auth\SocialController@redirectToProvider');
Route::get('social/callback', 'Auth\SocialController@handleProviderCallback');

//test
Route::get("abc", function () {
    return view("users.pages.tao-cong-thuc");
});

//Admin
Route::group(["prefix" => "admin", "middleware" => 'auth'], function () {
    Route::get("dashboard", [
        'as' => 'dashboard',
        'uses' => 'Admin\DashboardController@getList'
    ]);
    Route::group(["prefix" => "cate"], function () {

    });
});
