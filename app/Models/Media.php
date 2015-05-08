<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Media extends Model {
	protected $table = "content_media";
	protected $primaryKey = "image_id";

    public static function gallery(array $array)
    {
        $arView="";
        $results = DB::table('content_media')
                    ->whereIn('image_id', $array)->get();
            foreach ($results as $result) {
                        $arView .= "<img src='../". $result->image_path  ."' style='height:100px;width:100px' alt = '".$result->alternative_text."'/>";
            }
    	return $arView;
    }	
}