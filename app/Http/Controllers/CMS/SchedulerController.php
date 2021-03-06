<?php

namespace App\Http\Controllers\CMS;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\MyCollection;
use Input;
use Cache;
use Response;
use DB;
use Request;
use View;
use Session;

class SchedulerController extends Controller {

    public function __construct() {
	  //Read the settings .env set app title and tag line
	  View::share('APP_TITLE', env('APP_TITLE'));
	  View::share('APP_TAG_LINE', env('APP_TAG_LINE'));

	  //$this->middleware('guest'); 	 //Doesn't require active user
	  //$this->middleware('is.allowed'); //Require require active user
    }

    public function index() {
	  $this->regenerateMenuSession('cms.scheduler.index', 'cms.scheduler.index');
	  $schedules = Schedule::all();
	  $countAllSchedules = count($schedules);
	  $arData = array(
		'schedules' => $schedules,
		'countAllSchedules' => $countAllSchedules
	  );
	  return view('cms/Schedules/index', $arData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
	  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
	  $this->regenerateMenuSession('cms.scheduler.index', 'cms.scheduler.index');
	  $file = Request::file('imageSchedule');
//	  $scheduleLastId = DB::table('schedules')->orderBy('id', 'desc')->pluck('id');
//	  $scheduleLastIdInc = ++$scheduleLastId;
	  $selectedDays = Request::get('selectedDay');
//	  foreach($selectedDays as $selectedDay){
//		DB::table('fk_day_schedules')->insert(
//			  array(
//				'schedule_id' => $scheduleLastIdInc,
//				'day' => $selectedDay
//				)
//			  );
//	  }
	  $sched = new Schedule;
	  if ($file) {
		$filename = $file->getClientOriginalName();
		$file->move('public/scheduleImages', $filename);
		$sched->image = $filename;		
	  }else{
		$sched->image = 'imageComingSoon.png';
	  }
	  $sched->title = Request::get('title');
	  $sched->descriptions = Request::get('description');
	  $sched->schedule = Request::get('schedule');
	  $sched->save();
	  Session::flash('message', 'A new schedule has been added.');
	  return redirect('cms/scheduler');
    }

    public function show($id) {
    	return view('site/Pages/404');
	  //
    }

    public function edit($id) {
	  $this->regenerateMenuSession('cms.scheduler.index', 'cms.scheduler.index');
	  $sched = Schedule::find($id);
	  $schedCount = Schedule::getMainBannerImagesCount($id);
	  $bannerImages = Schedule::getAllImages($id);
	  $daySchedules = Schedule::getAllDaySchedule($id);
	  $arData = array(
		'schedules' => $sched,
		'bannerImages' => $bannerImages,
		'schedCount' => $schedCount,
		'daySchedules' => $daySchedules,
		'scheduleId' => $id
	  );
	  Session::flash('message', 'schedule has been updated.');
	  return view('cms.Schedules.edit', $arData);
    }

    public function update($id) {
	  Schedule::updateSchedule($id);
	  Session::flash('message', 'schedule has been updated.');
	  return redirect('cms/scheduler');
    }

    public function destroy($id) {
	  
    }

    public function deleteSchedule() {
	  $checked = Request::get('checked');
	  foreach ($checked as $checkId) {
		$sched = Schedule::find($checkId);
		$sched->delete();
	  }
	  Session::flash('message', 'schedule(s) had been deleted.');
	  return Response::json('ok');
    }

    public function addSchedule() {
	  return view('cms.Schedules.add');
    }

    public function preview() {
	  $firstSchedule = Schedule::first();
	  $firstScheduleImages = Schedule::getFirstScheduleImages();
	  $firstScheduleVideo = Schedule::getFirstScheduleVideo();
	  $schedules = Schedule::all();
	  $scheduleCount = count($schedules);
	  $scheduleImages = 
	  $arData = array(
		'schedules' => $schedules,
		'firstScheduleImages' => $firstScheduleImages,
		'firstSchedule' => $firstSchedule,
		'firstScheduleVideo' => $firstScheduleVideo,
		'scheduleCount' => $scheduleCount
	  );
	  return view('cms/Schedules/preview', $arData);
    }

    public function getBannerImages($id) {

	  $images = Schedule::getAllImages($id);
	  return Response::json(array($images));
    }

    public function insertMainBannerImage() {
	  Schedule::saveImage();
	  return Response::json('ok');
    }

    public function saveScheduleBannerImage() {
	  Schedule::saveScheduleBannerImage();
	  return Response::json('ok');
    }

    public function deleteScheduleBannerImage() {
	  $checked = Request::get('checked');
	  foreach ($checked as $check) {
		$schedImage = DB::table('fk_schedules')->where('id', '=', $check);
		$schedImage->delete();
	  }
	  return Response::json('ok');
    }

    public function getAllDaySchedule($id) {
	  $daySchedules = Schedule::getAllDaySchedule($id);
	  return Response::json(array($daySchedules));
    }

}
