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

//Route::get('home', 'CMS\LoginController@home');

Route::get('test', 'TestController@index', ['middleware'=>'is.allowed']);

Route::resource('cms', 'CMS\CMSController', ['only' => ['index'], 'middleware'=>'is.allowed']);

Route::get('cms/user/profile',
            array('as' => 'cms.user.profile', 
                  'uses' => 'CMS\UserController@profile'));

Route::resource('cms/user', 
				'CMS\UserController');

Route::resource('cms/role',
				'CMS\RoleController',
				['except' => ['show']]);

Route::resource('module',
				'CMS\ModuleController',
				['except' => ['show']]);

Route::post('cms/roleaccess/modify', array('as' => 'cms.roleaccess.modifyAccess', 'uses' => 'CMS\RoleAccessesController@modifyAccess'));

Route::post('cms/access/modify', array('as' => 'cms.access.modifyAccess', 'uses' => 'CMS\AccessController@modifyAccess'));

Route::resource('cms/access',
                'CMS\AccessController');

Route::resource('cms/roleaccess',
				'CMS\RoleAccessesController',
				['except' => ['show']]);

Route::resource('cms/general_settings', 
				'CMS\GeneralSettingsController');

Route::resource('news_feeds', 
				'CMS\NewsFeedsController');


//Start: Middleware Exmaple
Route::get('test', 'TestController@index', ['middleware'=>'is.allowed']);
Route::get('isNotAllowed', function()
{
	return 'Youre not allowed here!';
});
//End: Middleware Exmaple

//Start Gian Modules
//General Setting Controller
Route::resource('general_settings', 'CMS\GeneralSettingsController', ['middleware'=>'is.allowed']);
//News Feeds Controller
Route::resource('news_feeds', 'CMS\NewsFeedsController');
//Captcha Controller
Route::get('captcha-generator', 'CMS\CaptchaController@index');
//Change Password Controller Front-End
Route::resource('change_password', 'CMS\ChangePasswordController');
//Change Password Controller Back-End
Route::resource('cms/change_password_user', 'CMS\ChangePasswordInsideSystemController', ['middleware'=>'is.allowed']);
//End Gian Modules


// From Allan
Route::post('admin/menu/updatelabel', ['as' => 'updatelabel', 'uses' => 'CMS\CmsMenuController@updateLabelMenu']);

Route::post('admin/menu/addpagetomenu', ['as' => 'addpagetomenu', 'uses' => 'CMS\CmsMenuController@addPagetoMenu']);

Route::post('admin/menu/deletemenu', ['as' => 'deletemenu', 'uses' => 'CMS\CmsMenuController@deleteMenu']);

Route::post('admin/menu/updatemenu', ['as' => 'updatemenu', 'uses' => 'CMS\CmsMenuController@updatemenu']);

Route::resource('admin/menu', 'CMS\CmsMenuController',  ['middleware'=>'is.allowed']);
// end  

//Authentication and Forgot Password Module: Start
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
//Authentication and Forgot Password Module: End

//Media Management
Route::post('/cms/media/deleteSelected',['as'=>'cms.media.deleteSelected','uses'=>'CMS\MediaController@deleteSelected']);
Route::post('cms/media/gallery',['as'=>'cms.media.gallery','uses'=>'CMS\MediaController@gallery']);
Route::post('cms/media/getAll',['as'=>'cms.media.getAll','uses'=>'CMS\MediaController@getAll']);
Route::post('/cms/media/getAllimage',['as'=>'cms.media.getAllimage','uses'=>'CMS\MediaController@getAllimage']);
Route::resource('cms/media','CMS\MediaController');
//end media management
//News Management
Route::post('/cms/news/deleteSelected',['as'=>'cms.news.deleteSelected','uses'=>'CMS\NewsController@deleteSelected']);
Route::resource('cms/news','CMS\NewsController');
Route::resource('site/news','Site\NewsController');
//end news management


//this routes are for Code Editor Management
Route::post('cms/editor/Showw/{filename}', 'EditorController@Showw');
Route::post('cms/editor/updateFile', 'EditorController@updateFile');
Route::post('cms/editor/addFile', 'EditorController@addFile');
Route::resource('cms/editor', 'EditorController');

//this route are for Banner Management
Route::get('cms/addBanner',['as' => 'cms.Banners.add', 'uses' => 'BannerController@addBanner']);
Route::put('cms/saveImage', ['as' => 'cms.banner.saveImage', 'uses' => 'BannerController@saveImage']);
Route::delete('cms/delImage', 'BannerController@delImage');
Route::delete('cms/delCurrentImage/{id}','BannerController@delCurrentImage');
Route::resource('cms/banners','BannerController');

//this routes are for Page Management
Route::get('cms/addPage',['as' => 'cms.pages.addPage', 'uses' => 'PageController@addPage']);
Route::delete('cms/delPage','PageController@delPage');
Route::get('site/{slug}','PageController@preview');
Route::get('site/page/{id}/{url}','PageController@preview');
Route::get('site/page/{id}/{url}/{url2}','PageController@preview');
Route::get('site/page/{id}/{url}/{url2}/{url3}','PageController@preview');
Route::resource('cms/pages','PageController');

//These routes are for Module Management
Route::get('modules', 'ModuleController@index');
Route::resource('modules', 'ModuleController');
Route::post('modules/toggle', ['as' => 'togglemodule', 'uses' => 'ModuleController@toggleModule']);
Route::post('modules/upload', 'ModuleController@upload');
require_once(__DIR__ . '/../Modules/Module_Routes.php');
