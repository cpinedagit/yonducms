<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleAccesses extends Model {

	protected $table = 'role_accesses';

	protected $fillable = ['addflag', 'editflag', 'deleteflag', 'isactive'];

}
