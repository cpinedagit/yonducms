<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Editor extends Model{
	protected $table = 'filesuploaded';
        public $timestamps = false;
//	protected $fillable = ['name', 'email', 'password'];
//	protected $hidden = ['password', 'remember_token'];

        
        public static function getClickFile($id)
        {      
            return \DB::table('filesuploaded')->where('id', $id)->pluck('filename');
        }
        
        public static function defaultFile()
        {
//            return \DB::table('filesuploaded')->where('filename', 'default.blade.php')->pluck('filename');
        }
}
