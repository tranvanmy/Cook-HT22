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
        'uses' => 'Admin\DashboardController@getList'
    ])->name("dashboard");
    Route::group(["prefix" => "cate_ingre"], function () {
        Route::get("list", ["uses" => 'Admin\CateController@getList'])->name("getListCate");
        Route::post("add", ["uses" => "Admin\CateController@postAdd"])->name("postAddCate");
        Route::post("edit", ["uses" => "Admin\CateController@postEdit"])->name("postEditCate");
        Route::get("delete/{id}", ["uses" => "Admin\CateController@getDelete"])->name("getDeleteCate");
    });
    Route::group(["prefix" => "cate_foody"], function () {
        Route::get("list", ["uses" => 'Admin\FoodyController@getList'])->name("getListFoody");
        Route::post("add", ["uses" => "Admin\FoodyController@postAdd"])->name("postAddFoody");
        Route::post("edit", ["uses" => "Admin\FoodyController@postEdit"])->name("postEditFoody");
        Route::get("delete/{id}", ["uses" => "Admin\FoodyController@getDelete"])->name("getDeleteFoody");
    });
});
