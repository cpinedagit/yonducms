<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ModuleManager extends Model {

	function getModules() {
		$script = "SELECT * FROM modules";
		DB::select($script, array(1));
	}

}
