<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleAccesses extends Model {

	protected $table = 'role_accesses';

	protected $fillable = ['role_id', 'module_id', 'addflag', 'editflag', 'deleteflag', 'isactive'];

}
