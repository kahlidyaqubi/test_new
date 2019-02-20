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

    Route::get('/welcom', function () {
    return view('welcome');
});

Route::get('/guzzele','GuzzelExampleController@index');

Route::get('/noaccses', function () {
    return view('welcome');
});

Route::get('/logout', function () {
    return view('welcome');
});
Auth::routes(['verify' => true]);
Route::get('/home','Account\HomeController@dashboard');
Route::get('/account','Account\HomeController@dashboard');
Route::get('/account/login','Account\HomeController@dashboard');
Route::get('/account/restpassord','Account\HomeController@dashboard');
Route::post('/account/login','AuthController@ajaxlogin');
Route::post('/account/restpassord','AuthController@sendResetLinkEmail');
Route::get('/account/home/dashboard','Account\HomeController@dashboard');
Route::get('/account/home/noaccess','Account\HomeController@noaccess');
Route::get('/account/home/change-password','Account\HomeController@changePassword');
Route::post('/account/home/change-password','Account\HomeController@changePasswordPost');
Route::get('/account/account/profile/{id}','Account\HomeController@profile');
Route::patch('/account/account/profile/{id}','Account\HomeController@profileup');
Route::get('/account/account/convertlang/{lang}','Account\HomeController@convertlang');
//ادارة الحسابات
Route::get('/account/account/permission/{id}','Account\AccountController@permission');
Route::get('/account/account/deletegrope','Account\AccountController@deletegroup');
Route::resource("/account/account","Account\AccountController");
Route::get('/account/account/delete/{id}','Account\AccountController@delete');
Route::post('/account/account/permission/{id}','Account\AccountController@permissionPost');
//ادارة الفئات
Route::get('/account/category/deletegrope','Account\CategoryController@deletegroup');
Route::resource("/account/category","Account\CategoryController");
Route::get('/account/category/delete/{id}','Account\CategoryController@delete');
/////
Route::resource("/account/category2","Account\Category2Controller");
Route::resource("/account/category-axios","Account\CategoryAxiosController");
//ادارة الأخبار

Route::get('/account/article/active/{id}','Account\ArticleController@active');
Route::get('/account/article/deletegrope','Account\ArticleController@deletegroup');
Route::resource("/account/article","Account\ArticleController");
Route::get('/account/article/articleincat/{id}','Account\ArticleController@articleincat');
Route::get('/account/article/articleinacc/{id}','Account\ArticleController@articleinacc');
Route::get('/account/article/delete/{id}','Account\ArticleController@delete');
//ادارة الاشعارت
Route::resource("/account/notifications/","Account\NotificationController");
//ادارة التعليقات
Route::get('/account/comment/active/{id}','Account\CommentController@active');
Route::get('/account/comment/deletegrope','Account\CommentController@deletegroup');
Route::resource("/account/comment/","Account\CommentController");
Route::get('/account/comment/delete/{id}','Account\CommentController@delete');
Route::get('/account/comment/commentinart/{id}','Account\CommentController@commentinart');
/////////////////////////////////////////////////////////////////////////////////////////////////////
//article
Route::get('/','Article\ArticleController@index');
