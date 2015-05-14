<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Role extends Model {

	protected $table = 'role_details';

	protected $fillable = ['role_id', 'role_name', 'role_description', 'isactive'];

	public static function getActiveRoles()
	{
		return DB::table('role_details')
				->where('role_active', '=', 1)
				->get(['id', 'role_name', 'role_description', 'role_active']);
	}

	public static function getRoleOf($id)
	{
		return DB::table('role_details')
				->where('id', '=', $id)
				->get(['id', 'role_name']);
	}

}
