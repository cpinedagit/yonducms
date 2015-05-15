<?php

use DB;
//Enable or disable a module via AJAX.

function activate() {
	DB::table('modules')
		->where('id', $input)
		->update(array('enabled' => 1));	
}

function deactivate($input) {
	DB::table('modules')
		->where('id', $input)
		->update(array('enabled' => 0));	
}

echo JSON_ENCODE(TRUE);