<?php namespace App\Http\Controllers\CMS;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CMS\RoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller {
	
	protected $role;

	public function index()
	{
		$this->regenerateMenuSession('cms.user.index', 'cms.role.index');
		$roles = Role::all();
		return view('cms.roles.index', compact('roles'));
	}

	public function create()
	{
		$this->regenerateMenuSession('cms.user.index', 'cms.role.index');
		return view('cms.roles.create');
	}

	public function store(RoleRequest $request)
	{	
		$this->regenerateMenuSession('cms.user.index', 'cms.role.index');
		Role::create($request->all());
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

	public function update(RoleRequest $request, $id)
	{
		$role = Role::find($id);
		$role->role_name = $request->input('role_name');
		$role->role_description = $request->input('role_description');
		$role->role_active = $request->input('role_active');
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
