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

Route::get('isNotAllowed', function()
{
	return 'Youre not allowed here!';
});

Route::resource('cms/editor', 'EditorController');

//General Setting Controller
Route::resource('general_settings', 'CMS\GeneralSettingsController');
//News Feeds Controller
Route::resource('news_feeds', 'CMS\NewsFeedsController');
//Captcha Controller
Route::get('captcha-generator', 'CMS\CaptchaController@index');
//Change Password Controller
Route::resource('change_password', 'CMS\ChangePasswordController');

Route::any('captcha-test', function()
    {
        // $user           = New App\Models\cms\User;
        // $user->username = 'carlo';
        // $user->password = Hash::make('carlo');
        // $user->save();

        if (Request::getMethod() == 'POST')
        {
            $rules = ['captcha' => 'required|captcha'];
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails())
            {
                echo '<p style="color: #ff0000;">Incorrect!</p>';
            }
            else
            {
                echo '<p style="color: #00ff30;">Matched :)</p>';
            }
        }

        $form = '<form method="post" action="captcha-test">';
        $form .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
        $form .= '<p>' . captcha_img('flat') . '</p>';
        $form .= '<p><input type="text" name="captcha"></p>';
        $form .= '<p><button type="submit" name="check">Check</button></p>';
        $form .= '</form>';
        return $form;
    });


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
Route::post('cms/editor/Showw/{filename}', 'EditorController@Showw');
Route::post('cms/editor/updateFile', 'EditorController@updateFile');
Route::post('cms/editor/addFile', 'EditorController@addFile');

Route::resource('cms/editor', 'EditorController');

//this routes is for Image Management
Route::get('cms/addImage','ImageController@addImage');
Route::get('cms/frontEnd','ImageController@frontEnd');
Route::resource('cms/image', 'ImageController');

//this route is for Banner Management
Route::get('cms/addBanner','BannerController@addBanner');
Route::resource('cms/banners','BannerController');

//this routes is for Page Management
Route::get('cms/addPage','PageController@addPage');
Route::get('site/page/{id}','PageController@preview');
Route::resource('cms/pages','PageController');
