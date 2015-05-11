<?php namespace App\Http\Controllers\CMS;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CMS\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller {

	protected $users;

	public function __construct(User $user)
	{
		$this->users = $user;
	}

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

	public function store(UserRequest $request)
	{
		User::create($request->all());	
		return $this->index();		
	}

	public function edit($slug)
	{
		$this->regenerateMenuSession('cms.user.index', 'cms.user.index');
		$user = User::where('slug', '=', $slug)->firstOrFail();
		return view('cms.user.edit', compact('user'));
	}

	public function update(UserRequest $request, $id)
	{
		$user = User::find($id);
		$user->username = $request->input('username'); 
		$user->firstname = $request->input('firstname');
		$user->lastname = $request->input('lastname');
		$user->slug = $request->input('username');
		$user->email = $request->input('email');
		$user->password = $request->input('password');
		$user->save();
		echo "updated";
	}

	public function destroy($id)
	{
		$user = User::find($id);
		$user->delete();
		return $this->index();
	}

}
