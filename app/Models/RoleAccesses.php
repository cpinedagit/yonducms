<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class RoleAccesses extends Model {

	protected $table = 'role_accesses';

	protected $fillable = ['role_id', 'module_id', 'addflag', 'editflag', 'deleteflag', 'isactive'];

	public static function getAccessFor($id)
	{
		return DB::table('role_accesses')
				->where('role_id', '=', $id)
				->get([ 'role_id', 'module_id',
						'addflag', 'editflag',
						'deleteflag', 'isactive']);
	}
}
