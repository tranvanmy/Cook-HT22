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
    Route::group(["prefix" => "ingredient"], function () {
        Route::get("list", ["uses" => 'Admin\IngredientController@getList'])->name("getListIngredient");
        Route::post("add", ["uses" => "Admin\IngredientController@postAdd"])->name("postAddIngredient");
        Route::post("edit", ["uses" => "Admin\IngredientController@postEdit"])->name("postEditIngredient");
        Route::get("delete/{id}", ["uses" => "Admin\IngredientController@getDelete"])->name("getDeleteIngredient");
    });
    Route::group(["prefix" => "receipt"], function () {
        Route::get("list", ["uses" => 'Admin\ReceiptController@getList'])->name("getListReceipt");
        Route::post("edit", ["uses" => "Admin\ReceiptController@postEdit"])->name("postEditReceipt");
        Route::get("delete/{id}", ["uses" => "Admin\ReceiptController@getDelete"])->name("getDeleteReceipt");
    });
    Route::group(["prefix" => "unit"], function () {
        Route::get("list", ["uses" => 'Admin\UnitController@getList'])->name("getListUnit");
        Route::post("add", ["uses" => "Admin\UnitController@postAdd"])->name("postAddUnit");
        Route::get("delete/{id}", ["uses" => "Admin\UnitController@getDelete"])->name("getDeleteUnit");
    });
});

//Users
Route::get("create-receipt", ["uses" => 'Users\SubmitReceiptController@index'])->middleware("auth");
Route::post("addReceipt", ["uses" => 'Users\SubmitReceiptController@postReceipt']);
Route::post("addIngredient", ["uses" => 'Users\SubmitReceiptController@postAddIngredient']);
Route::post("editIngredient", ["uses" => 'Users\SubmitReceiptController@postEditIngredient']);
Route::post("delIngredient", ["uses" => 'Users\SubmitReceiptController@postDelIngredient']);
Route::post("addStep", ["uses" => 'Users\SubmitReceiptController@postAddStep']);
Route::post("editStep", ["uses" => 'Users\SubmitReceiptController@postEditStep']);
Route::post("delStep", ["uses" => 'Users\SubmitReceiptController@postDelStep']);
Route::post("addReceiptCate", ["uses" => 'Users\SubmitReceiptController@postReceiptCate'])->name("addReceiptCate");
Route::post("createReceipt", ["uses" => 'Users\SubmitReceiptController@createReceipt'])->name("createReceipt");
Route::post("cancelReceipt", ["uses" => 'Users\SubmitReceiptController@cancelReceipt'])->name("cancelReceipt");
Route::get("detail/{id}", ["uses" => 'Users\DetailReceiptController@show'])->name("detail");
Route::post("/detail/{id}/{ration}", ["uses" => 'Users\DetailReceiptController@calRation'])->name("refresh");
