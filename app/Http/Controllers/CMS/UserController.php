<?php namespace App\Http\Controllers\CMS;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CMS\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Input;
use File;
use View;
use Mail;

class UserController extends Controller {

	protected $users;

	public function index()
	{
		$this->regenerateMenuSession('cms.user.index', 'cms.user.index');
		$users = User::all();
		return view('cms.user.index', compact('users'));
	}

	public function create()
	{
		$this->regenerateMenuSession('cms.user.index', 'cms.user.create');
		return view('cms.user.create');
	}

	public function store()
	{
		$user = new User;
		$path = 'public/images/profile';		
		$file = Input::file('profile_pic');

		$user->username                 = Input::get('username');
		$user->slug                     = Input::get('username');
		$user->email                    = Input::get('email');
		$user->first_name               = Input::get('first_name');
		$user->last_name                = Input::get('last_name');
		$user->password                 = Hash::make(Input::get('password'));
		$user->role_id 					= Input::get('role_id');
		//Require to update your temporary password
		$user->reset_password           = 1; 
		//Set to timestamp
		$user->reset_password_timestamp = \Carbon\Carbon::now(); 
		$user->profile_pic              = $file->getClientOriginalName();
		$user->save();

		$file->move($path, $file->getClientOriginalName());

		//Send Email notification to user
		$this->sendEmailNotificationToUser($user->id, Input::get('password'), "cms.emails.new_user_notification", "Yondu Webservices Alert: New account notification.");

		return $this->index();
	}

	//Send Email notification to user
	public function sendEmailNotificationToUser($user_id, $temporary_password, $template, $add_message)
	{
		//Set all necessary fields
		$user = User::find($user_id);
		$data = array(
			'user_id'            => $user->id,
			'username'           => $user->username,
			'first_name'         => $user->first_name,
			'last_name'          => $user->last_name,
			'to'                 => $user->email,
			'temporary_password' => $temporary_password,
			'add_message'        => $add_message
		);

		Mail::later(5, $template, compact('data'), function($message) use ($data)
		{
		    $message->from('yondu.cms@example.com', $data['add_message']);

		    $message->to($data['to'])->subject('Yondu CMS System Notification');
		});
	}


	public function show($id)
	{

	}

	public function edit($slug)
	{
		$this->regenerateMenuSession('cms.user.index', 'cms.user.index');
		$user = User::where('slug', '=', $slug)->firstOrFail();
		return view('cms.user.edit', compact('user'));
	}

	public function update($id)
	{
		$user             = User::find($id);
		$user->username   = Input::get('username'); 
		$user->first_name = Input::get('first_name');
		$user->last_name  = Input::get('last_name');
		$user->slug       = Input::get('username');
		$user->email      = Input::get('email');
		$user->role_id    = Input::get('role_id');

		//Update password only when password field in not empty
		if(Input::get('password')!=''){
			//Send email notification to user
			$this->sendEmailNotificationToUser($user->id, Input::get('password'), "cms.emails.user_password_reset_notification", "Yondu Webservices Alert: User password change notification.");
			//Require to update your temporary password
			$user->reset_password           = 1; 
			//Set to timestamp
			$user->reset_password_timestamp = \Carbon\Carbon::now(); 
			//Set new password
			$user->password   = Hash::make(Input::get('password'));
		}else{
			$user->password   = Hash::make(Input::get('password'));	
		}
		
		$user->save();
		return $this->index();
	}

	public function destroy($id)
	{
		$user = User::find($id);
		$user->delete();
		return $this->index();
	}

	public function profile()
	{
		return view('cms.user.profile');
	}

}
