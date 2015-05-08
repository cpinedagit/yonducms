<?php namespace App\Http\Controllers\CMS;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CMS\RoleAccessesRequest;
use App\Models\Module;
use App\Models\Role;
use App\Models\RoleAccesses;
use Illuminate\Http\Request;

class RoleAccessesController extends Controller {
	
	protected $roleAccesses;

	public function __construct(RoleAccesses $roleAccess)
	{
		$this->roleAccesses = $roleAccess;
	}

	public function index()
	{
		$roleAccesses = RoleAccesses::all();
		return view('cms.roleaccesses.index', compact('roleAccesses'));
	}

	public function create()
	{
		$roles = Role::where('role_active', '=', '1')->get(['role_name', 'id']);
		$modules = Module::all();

		$data = (object) array('roles' => $roles, 'modules' => $modules);
		return view('cms.roleaccesses.create', compact('data'));
	}	

	public function store(RoleAccessesRequest $request)
	{
		$count = 0;
		$add = "add";
		$edit = "edit";
		$delete = "delete";
		$view = "isactive";
		$log = (object) array('addflag' => null, 'deleteflag' => null, 'editflag' => null, 'isactive');

		$modules = Module::all();

		foreach($modules as $module):
			$add_name = $add . $module->id;
			$edit_name = $edit . $module->id;
			$delete_name = $delete . $module->id;
			$view_name = $view . $module->id;

			RoleAccesses::create(array(
				'role_id' => $request->input('role'),
				'module_id' => $module->id,
				'addflag' => ($request->input($add_name) != null && $request->input($add_name) != '') ? $request->input($add_name) : 0,
				'editflag' => ($request->input($edit_name) != null && $request->input($edit_name) != '') ? $request->input($edit_name) : 0,
				'deleteflag' => ($request->input($delete_name) != null && $request->input($delete_name) != '') ? $request->input($delete_name) : 0,
				'isactive' => ($request->input($view_name) != null && $request->input($view_name) != '') ? $request->input($view_name) : 0
				));
			echo "created for " . $module->module_name;
		endforeach;

		echo $request->input('role') . " " . $module->id;
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
	}

	public function update($id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}

}
