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

Route::get('test', 'TestController@index', ['middleware' => 'is.allowed']);

Route::resource('cms', 'CMS\CMSController', ['only' => ['index'], 'middleware' => 'is.allowed']);

Route::get('cms/user/profile', array('as' => 'cms.user.profile',
    'uses' => 'CMS\UserController@profile'));

Route::resource('cms/user', 'CMS\UserController');

Route::resource('cms/role', 'CMS\RoleController', ['except' => ['show']]);

Route::resource('module', 'CMS\ModuleController', ['except' => ['show']]);

Route::post('cms/role/modify', array('as' => 'cms.role.modifyAccess', 'uses' => 'CMS\RoleController@modifyAccess'));

Route::post('cms/roleaccess/modify', array('as' => 'cms.roleaccess.modifyAccess', 'uses' => 'CMS\RoleAccessesController@modifyAccess'));

Route::post('cms/access/modify', array('as' => 'cms.access.modifyAccess', 'uses' => 'CMS\AccessController@modifyAccess'));

Route::resource('cms/access', 'CMS\AccessController');

Route::resource('cms/roleaccess', 'CMS\RoleAccessesController', ['except' => ['show']]);

Route::resource('cms/general_settings', 'CMS\GeneralSettingsController', ['only' => ['index', 'update']]);

Route::resource('news_feeds', 'CMS\NewsFeedsController');

Route::get('cms/general_settings/truncateData', array('as' => 'cms.general_settings.truncateData', 'uses' => 'CMS\GeneralSettingsController@truncateData'));

//Start: Middleware Exmaple
Route::get('test', 'TestController@index', ['middleware' => 'is.allowed']);
Route::get('isNotAllowed', function() {
    return 'Youre not allowed here!';
});
//End: Middleware Exmaple
//Start Gian Modules
//General Setting Controller
Route::resource('general_settings', 'CMS\GeneralSettingsController', ['middleware' => 'is.allowed']);
//News Feeds Controller
Route::resource('news_feeds', 'CMS\NewsFeedsController');
//Captcha Controller
Route::get('captcha-generator', 'CMS\CaptchaController@index');
//Change Password Controller Front-End
Route::resource('change_password', 'CMS\ChangePasswordController');
//Change Password Controller Back-End
Route::resource('cms/change_password_user', 'CMS\ChangePasswordInsideSystemController');
//End Gian Modules
// Menu management route
Route::post('cms/menu/updatelabel', ['as' => 'updatelabel', 'uses' => 'CMS\CmsMenuController@updateLabelMenu']);
Route::post('cms/menu/addpagetomenu', ['as' => 'addpagetomenu', 'uses' => 'CMS\CmsMenuController@addPagetoMenu']);
Route::post('cms/menu/addexternallink', ['as' => 'addexternallink', 'uses' => 'CMS\CmsMenuController@addLinktoMenu']);
Route::post('cms/menu/deletemenu', ['as' => 'deletemenu', 'uses' => 'CMS\CmsMenuController@deleteMenu']);
Route::post('cms/menu/updatemenu', ['as' => 'updatemenu', 'uses' => 'CMS\CmsMenuController@updatemenu']);
Route::post('cms/menu/setmenupos', ['as' => 'setmenupos', 'uses' => 'CMS\CmsMenuController@setMenuPosition']);
Route::post('cms/menu/pagelivesearch', ['as' => 'pagelivesearch', 'uses' => 'CMS\CmsMenuController@listPageSearch']);
Route::resource('cms/menu', 'CMS\CmsMenuController', ['middleware' => 'is.allowed']);
// end  
//Authentication and Forgot Password Module: Start
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
//Authentication and Forgot Password Module: End
//Media Management
Route::post('/cms/media/deleteSelected', ['as' => 'cms.media.deleteSelected', 'uses' => 'CMS\MediaController@deleteSelected']);
Route::post('cms/media/gallery', ['as' => 'cms.media.gallery', 'uses' => 'CMS\MediaController@gallery']);
Route::post('cms/media/getAll', ['as' => 'cms.media.getAll', 'uses' => 'CMS\MediaController@getAll']);
Route::post('/cms/media/getAllimage', ['as' => 'cms.media.getAllimage', 'uses' => 'CMS\MediaController@getAllimage']);
Route::resource('cms/media', 'CMS\MediaController');
//end media management
//News Management
Route::post('/cms/news/deleteSelected', ['as' => 'cms.news.deleteSelected', 'uses' => 'CMS\NewsController@deleteSelected']);
Route::resource('cms/news', 'CMS\NewsController');
Route::resource('news', 'Site\NewsController');
//end news management

//These routes are for Code Editor Management
Route::post('cms/editor/addParentFolder','CMS\EditorController@addParentFolder');
Route::get('cms/editor/addFolder', 'CMS\EditorController@addFolder');
Route::post('cms/editor/Showw/{filename}', 'CMS\EditorController@Showw');
Route::post('cms/editor/updateFile', 'CMS\EditorController@updateFile');
Route::post('cms/editor/addEditorFile', ['as' => 'addEditorFile', 'uses' => 'CMS\EditorController@addFile']);
Route::post('cms/editor/readFile', 'CMS\EditorController@readFile');
Route::resource('cms/editor', 'CMS\EditorController');

//These route are for Banner Management
Route::get('cms/addBanner', ['as' => 'cms.Banners.add', 'uses' => 'CMS\BannerController@addBanner']);
Route::put('cms/saveImage', ['as' => 'cms.banner.saveImage', 'uses' => 'CMS\BannerController@saveImage']);
Route::delete('cms/delImage', 'CMS\BannerController@delImage');
Route::delete('cms/delCurrentImage/{id}', 'CMS\BannerController@delCurrentImage');
Route::resource('cms/banners', 'CMS\BannerController', ['middleware' => 'is.allowed']);

//These routes are for Page Management
Route::get('cms/getPageStatus/{pageId}','CMS\PageController@getPageStatus');
Route::get('cms/addPage', ['as' => 'cms.pages.addPage', 'uses' => 'CMS\PageController@addPage']);
Route::delete('cms/delPage', 'CMS\PageController@delPage');
Route::resource('/', 'Site\SiteController@index', ['only' => ['index']]);
Route::get('{slug}', 'CMS\PageController@preview');
Route::get('site/{slug}/{slug2}/', 'Site\NewsController@preview');
Route::get('site/page/{id}/{url}/{url2}', 'CMS\PageController@preview');
Route::get('site/page/{id}/{url}/{url2}/{url3}', 'CMS\PageController@preview');
Route::resource('cms/pages', 'CMS\PageController');

//These routes are for Beam Scheduler
Route::get('cms/getAllDaySchedule/{scheduleId}', 'CMS\SchedulerController@getAllDaySchedule');
Route::put('cms/insertMainBannerImage', ['as' => 'cms.scheduler.insertMainBannerImage', 'uses' => 'CMS\SchedulerController@insertMainBannerImage']);
Route::put('cms/saveScheduleBannerImage',['as' => 'cms.scheduler.saveScheduleBannerImage', 'uses' => 'CMS\SchedulerController@saveScheduleBannerImage']);
Route::delete('cms/deleteSchedule','CMS\SchedulerController@deleteSchedule');
Route::delete('cms/deleteScheduleBannerImage','CMS\SchedulerController@deleteScheduleBannerImage');
Route::get('cms/addSchedule', ['as' => 'cms.scheduler.add', 'uses' => 'CMS\SchedulerController@addSchedule']);
Route::get('cms/schedulepreview', ['as' => 'cms.scheduler.schedulepreview', 'uses' => 'CMS\SchedulerController@preview']);
Route::get('cms/getBannerImages/{id}', 'CMS\SchedulerController@getBannerImages');
Route::resource('cms/scheduler', 'CMS\SchedulerController', ['middleware' => 'is.allowed']);

//These routes are for Error Pages
//Route::get('notfound', 'ErrorController@index');
//These routes are for Module Management
Route::get('cms/modules', 'ModuleController@index');
Route::resource('cms/modules', 'ModuleController');
Route::post('cms/modules/toggle', ['as' => 'togglemodule', 'uses' => 'ModuleController@toggleModule']);
Route::post('cms/modules/upload', 'ModuleController@upload');

require_once(__DIR__ . '/../Modules/Module_Routes.php');
