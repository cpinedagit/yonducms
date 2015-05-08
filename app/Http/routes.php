<?php

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

//Captcha
Route::any('captcha-test', function()
    {
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

