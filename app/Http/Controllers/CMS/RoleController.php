<?php namespace App\Http\Controllers\CMS;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CMS\RoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Input;

class RoleController extends Controller {
	
	protected $role;

	public function index()
	{
		$this->regenerateMenuSession('cms.user.index', 'cms.role.index');
		$roles = Role::getActiveRoles();
		return view('cms.roles.index', compact('roles'));
	}

	public function create()
	{
		$this->regenerateMenuSession('cms.user.index', 'cms.role.index');
		return view('cms.roles.create');
	}

	public function store()
	{	
		$this->regenerateMenuSession('cms.user.index', 'cms.role.index');
		$role = new Role;
		$role->role_name = Input::get('role_name');
		$role->role_description = Input::get('role_description');
		$role->role_active = Input::get('role_active');
		$role->save();
		return $this->index();
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		$this->regenerateMenuSession('cms.user.index', 'cms.role.index');
		$role = Role::where('id', '=', $id)->firstOrFail();
		return view('cms.roles.edit', compact('role'));
	}

	public function update($id)
	{
		$role = Role::find($id);
		$role->role_name = Input::get('role_name');
		$role->role_description = Input::get('role_description');
		$role->role_active = Input::get('role_active');
		$role->save();
		return $this->index();	
	}

	public function destroy($id)
	{
		$role = Role::find($id);
		$role->delete();
		echo "deleted";
	}

}
