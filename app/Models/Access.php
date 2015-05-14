<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Access extends Model {

	protected $table = 'accesses';

	protected $fillable = ['role_id', 'module_id', 'is_enabled', 'updated_at', 'created_at'];

	public static function getAccessFor($id)
	{
		return DB::table('accesses')
				->where('role_id', '=', $id)
				->get(['role_id', 'module_id', 'is_enabled']);
	}

	
}
