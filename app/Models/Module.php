<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Module extends Model {

	protected $table = 'modules';

	protected $fillable = ['module_name', 'module_description'];

	public static function getActiveModules()
	{
		$modules = DB::table('modules')
					->where('enabled', '=', '1')
					->get([
						'id', 'module_name', 'module_path',
						'module_icon', 'is_selected']);
		return $modules;
	}

}
