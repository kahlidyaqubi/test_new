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
//ادارة الأخبار

Route::get('/account/article/active/{id}','Account\ArticleController@active');
Route::get('/account/article/deletegrope','Account\ArticleController@deletegroup');
Route::resource("/account/article","Account\ArticleController");
Route::get('/account/article/delete/{id}','Account\ArticleController@delete');
//ادارة الاشعارت
Route::resource("/account/notifications/","Account\NotificationController");
/////////////////////////////////////////////////////////////////////////////////////////////////////
// Authentication Routes...
/*
///لوجين ونسيت
///
Route::post('/account/login','AuthController@ajaxlogin');
Route::post('/account/restpassord','AuthRestController@sendResetLinkEmail');

Route::get('login', function () {
    $itemco=\App\Company::all()->first();
    return view('welcome',compact('itemco'));
})->name('login');

Route::get('logout', function () {
    $itemco=\App\Company::all()->first();
    return view('welcome',compact('itemco'));
});

Route::post('login', 'Auth\LoginController@login');
Route::middleware('auth')->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register',  function () {
    $itemco=\App\Company::all()->first();
    return view('welcome',compact('itemco'));
})->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
*/
/*   Abu  */







