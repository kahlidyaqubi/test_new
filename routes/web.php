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
Route::get('songs/create', [
    'uses' => 'SongsController@create',
    'as' => 'song.create'
]);

Route::post('songs', [
    'uses' => 'SongsController@store',
    'as' => 'song.store'
]);

/*Route::get('test_test', function () {
    \App\Forms\SongForm::add('test', 'button', [
        'attr' => ['class' => 'btn btn-primary']
    ]);
    dd('succsse');
});*/

Route::get('/welcom', function () {
    if (auth()->user())
        return redirect('/account');
    else
        return redirect('/');
});
Route::get('/login', function () {
    if (auth()->user())
        return redirect('/account');
    else
        return redirect('/');
});
Route::get('/register', function () {
    if (auth()->user())
        return redirect('/account');
    else
        return redirect('/');
});
Route::get('/logout', function () {
    if (auth()->user())
        return redirect('/account');
    else
        return redirect('/');
});
Route::get('/guzzele', 'GuzzelExampleController@index');

Route::get('/noaccses', function () {
    return redirect('/notfound');
});

Auth::routes(['verify' => true]);
Route::get('/home', 'Account\HomeController@dashboard');
Route::get('/account', 'Account\HomeController@dashboard');
Route::get('/account/login', 'Account\HomeController@dashboard');
Route::get('/account/restpassord', 'Account\HomeController@dashboard');
Route::post('/account/login', 'AuthController@ajaxlogin');
Route::post('/account/restpassord', 'AuthController@sendResetLinkEmail');
Route::get('/account/home/dashboard', 'Account\HomeController@dashboard');
Route::get('/account/home/noaccess', 'Account\HomeController@noaccess');
Route::get('/account/home/change-password', 'Account\HomeController@changePassword');
Route::post('/account/home/change-password', 'Account\HomeController@changePasswordPost');
Route::get('/account/account/profile/{id}', 'Account\HomeController@profile');
Route::patch('/account/account/profile/{id}', 'Account\HomeController@profileup');
Route::get('/account/account/convertlang/{lang}', 'Account\HomeController@convertlang');
//ادارة الحسابات
Route::get('/account/account/permission/{id}', 'Account\AccountController@permission');
Route::get('/account/account/deletegrope', 'Account\AccountController@deletegroup');
Route::resource("/account/account", "Account\AccountController");
Route::get('/account/account/delete/{id}', 'Account\AccountController@delete');
Route::post('/account/account/permission/{id}', 'Account\AccountController@permissionPost');
/// chat
Route::get('/chat', 'Account\AccountController@accountchat');
//ادارة الفئات
Route::get('/account/category/deletegrope', 'Account\CategoryController@deletegroup');
Route::resource("/account/category", "Account\CategoryController");
Route::get('/account/category/delete/{id}', 'Account\CategoryController@delete');
/////
Route::resource("/account/category2", "Account\Category2Controller");
Route::resource("/account/category-axios", "Account\CategoryAxiosController");
//ادارة الأخبار

Route::get('/account/article/active/{id}', 'Account\ArticleController@active');
Route::get('/account/article/deletegrope', 'Account\ArticleController@deletegroup');
Route::resource("/account/article", "Account\ArticleController");
Route::get('/account/article/articleincat/{id}', 'Account\ArticleController@articleincat');
Route::get('/account/article/articleinacc/{id}', 'Account\ArticleController@articleinacc');
Route::get('/account/article/delete/{id}', 'Account\ArticleController@delete');
//ادارة الاشعارت
Route::resource("/account/notifications/", "Account\NotificationController");
//ادارة التعليقات
Route::get('/account/comment/active/{id}', 'Account\CommentController@active');
Route::get('/account/comment/deletegrope', 'Account\CommentController@deletegroup');
Route::resource("/account/comment/", "Account\CommentController");
Route::get('/account/comment/delete/{id}', 'Account\CommentController@delete');
Route::get('/account/comment/commentinart/{id}', 'Account\CommentController@commentinart');
/////////////////////////////////////////////////////////////////////////////////////////////////////
//article
Route::get('/', 'Article\ArticleController@index');
Route::get('/notfound', 'Article\ArticleController@notfound');
Route::get('/about', 'Article\ArticleController@about');
Route::get('/article/{id}', 'Article\ArticleController@article_show');
Route::post('/article/{id}', 'Article\ArticleController@addcoment');
Route::get('/section/{id}', 'Article\ArticleController@section');
Route::get('/search', 'Article\ArticleController@article_search');
////////////////////////////
Route::get('/charts','Article\ArticleController@article_charts');
Route::get('/categories_ax','Article\ArticleController@categories_axios');
Route::get('/articles_ax','Article\ArticleController@article_charts_axios');
Route::get('/charts-axios','Article\ArticleController@article_charts_view');
Route::get('/calender_show','Account\ArticleController@calender_show');
Route::get('/editor_show','Account\ArticleController@editor_show');
////////////////////////////



////////////////////////////
Route::get('/encrequst', function (){

    $citizen =\App\Account::all()->toArray();
    function array_to_xml($array, &$xml_user_info) {
        foreach($array as $key => $value) {
            if(is_array($value)) {
                if(!is_numeric($key)){
                    $subnode = $xml_user_info->addChild("$key");
                    array_to_xml($value, $subnode);
                }else{
                    $subnode = $xml_user_info->addChild("item$key");
                    array_to_xml($value, $subnode);
                }
            }else {
                $xml_user_info->addChild("$key",htmlspecialchars("$value"));
            }
        }
    }
    $xml_citizen = new SimpleXMLElement("<?xml version=\"1.0\"?><citizen></citizen>");
    //dd($xml_citizen);
    array_to_xml($citizen,$xml_citizen);
    $xml_file = $xml_citizen->asXML('users.xml');
    $xml2=simplexml_load_file("users.xml") or dd("Error: Cannot create object");
    //$mystring =$xml2->saveXML();
    //dd($mystring);
    $x='';
    $z= openssl_private_encrypt ( $xml2 , $x, null );
dd($z);
});

