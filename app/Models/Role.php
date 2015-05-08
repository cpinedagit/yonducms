<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

	protected $table = 'role_details';

	protected $fillable = ['role_id', 'role_name', 'role_description', 'isactive'];

}
