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

Route::get('/', 'MainController@index');

Route::get('main', 'MainController@index');

Route::get('home', 'CMS\LoginController@home');

Route::get('test', 'TestController@index', ['middleware'=>'is.allowed']);

Route::resource('cms', 
				'CMS\CMSController',
				['only' => ['index']]);

Route::resource('cms/user', 
				'CMS\UserController', 
				['except' => ['show']]);

Route::resource('cms/role',
				'CMS\RoleController',
				['except' => ['show']]);
Route::resource('module',
				'CMS\ModuleController',
				['except' => ['show']]);

Route::resource('roleaccess',
				'CMS\RoleAccessesController',
				['except' => ['show']]);

Route::resource('cms/general_settings', 
				'CMS\GeneralSettingsController');

Route::resource('news_feeds', 
				'CMS\NewsFeedsController');

Route::resource('cms/editor', 'EditorController');

//Start: Middleware Exmaple
Route::get('test', 'TestController@index', ['middleware'=>'is.allowed']);
Route::get('isNotAllowed', function()
{
	return 'Youre not allowed here!';
});
//End: Middleware Exmaple

//Start Gian Modules
//General Setting Controller
Route::resource('general_settings', 'CMS\GeneralSettingsController');
//News Feeds Controller
Route::resource('news_feeds', 'CMS\NewsFeedsController');
//Captcha Controller
Route::get('captcha-generator', 'CMS\CaptchaController@index');
//Change Password Controller
Route::resource('change_password', 'CMS\ChangePasswordController');
//End Gian Modules


// From Allan
Route::get('admin/menu', 'CMS\CmsMenuController@index');
Route::post('admin/menu/decode',['as' => 'decode', 'uses' => 'CMS\CmsMenuController@throwJson'] );
// end  


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::post('media/get',['as'=>'gallery','uses'=>'CMS\MediaController@gallery']);
Route::post('media/getAll',['as'=>'getAll','uses'=>'CMS\MediaController@getAll']);
Route::resource('media','CMS\MediaController');

//this routes is for Code Editor Management
Route::post('Editor/Showw/{filename}', 'EditorController@Showw');
Route::post('Editor/updateFile', 'EditorController@updateFile');
Route::post('Editor/addFile', 'EditorController@addFile');

Route::resource('Editor', 'EditorController');

//this routes is for Image Management
Route::get('addImage','ImageController@addImage');
Route::get('frontEnd','ImageController@frontEnd');
Route::resource('Image', 'ImageController');

//this route is for Banner Management
Route::get('addBanner','BannerController@addBanner');
Route::resource('Banners','BannerController');

//this routes is for Page Management
Route::get('addPage','PageController@addPage');
Route::get('page/{id}/{bannerid}','PageController@preview');
Route::resource('Pages','PageController');