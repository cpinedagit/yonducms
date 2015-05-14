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

		$user->username = Input::get('username');
		$user->slug = Input::get('username');
		$user->email = Input::get('email');
		$user->first_name = Input::get('first_name');
		$user->last_name = Input::get('last_name');
		$user->password = Hash::make(Input::get('password'));
		$user->profile_pic = $file->getClientOriginalName();
		$user->save();

		$file->move($path, $file->getClientOriginalName());
		return $this->index();
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
		$user = User::find($id);
		$user->username = Input::get('username'); 
		$user->first_name = Input::get('first_name');
		$user->last_name = Input::get('last_name');
		$user->slug = Input::get('username');
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
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
