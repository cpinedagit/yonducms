<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Input;
use Request;

class Schedule extends Model {

    protected $table = 'schedules';
    public $timestamps = false;

    public static function getAllImages($id) {

	  return DB::table('schedules')
				->leftJoin('fk_schedules', 'schedules.id', '=', 'fk_schedules.schedule_id')
				->leftJoin('content_media', 'content_media.media_id', '=', 'fk_schedules.image_id')
				->where('schedules.id', '=', $id)
				->get();
    }

    public static function updateSchedule($id) {
	  $schedule = Schedule::find($id);
	  $schedule->title = Input::get('title');
	  $schedule->descriptions = Input::get('description');
	  $schedule->schedule = Input::get('schedule');
	  if (Input::hasFile('scheduleImage')) {
		$file = Input::file('scheduleImage');
		$filename = $file->getClientOriginalName();
		$file->move('public/scheduleImages', $filename);
		$schedule->image = $filename;
	  }
	  if (Input::hasFile('mainBannerVideo')) {
		$videoFile = Input::file('mainBannerVideo');
		$videoFilename = $videoFile->getClientOriginalName();
		$videoFile->move('public/scheduleImages', $videoFilename);
		$schedule->video = $videoFilename;
	  }
	  $schedule->save();
    }

    public static function saveScheduleBannerImage() {
	
		if (Request::get('selected')) {
		    $id = Request::get('id');
		    $selected = Request::get('selected');
		    foreach ($selected as $select) {
			  DB::table('fk_schedules')->insertGetId(
				    array(
					  'schedule_id' => $id,
					  'image_id' => $select)
			  );
		    }
		}
	  
    }
    
    public static function getMainBannerImagesCount($id) {
	   $schedules = DB::table('fk_schedules')->where('schedule_id', '=', $id)->get();
	   $scheduleCount = count($schedules);
	   return $scheduleCount;
		
    }
    
    public static function getAllDaySchedule($id){
	  return DB::table('schedules')
		    ->leftJoin('fk_day_schedules','schedules.id', '=', 'fk_day_schedules.schedule_id')
		    ->where('fk_day_schedules.schedule_id', '=', $id)
		    ->get(array('fk_day_schedules.day'));
    }
    
    public static function getFirstScheduleImages(){
	 	  return DB::table('schedules')
				->leftJoin('fk_schedules', 'schedules.id', '=', 'fk_schedules.schedule_id')
				->leftJoin('content_media', 'content_media.media_id', '=', 'fk_schedules.image_id')
				->where('schedules.id', '=', 1)
				->get();
    }
    
    public static function getFirstScheduleVideo(){
	  return DB::table('schedules')
		    ->where('id','=', 1)
		    ->pluck('video');
    }
		

}
