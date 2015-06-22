<?php

namespace App\Http\Controllers\CMS;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Input;
use Cache;
use Response;
use DB;
use Request;
use View;

class SchedulerController extends Controller {

    public function __construct() {
	  //Read the settings .env set app title and tag line
	  View::share('APP_TITLE', env('APP_TITLE'));
	  View::share('APP_TAG_LINE', env('APP_TAG_LINE'));

	  //$this->middleware('guest'); 	 //Doesn't require active user
	  $this->middleware('is.allowed'); //Require require active user
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
	  $file = Input::file('imageSchedule');
	  if ($file) {
		$filename = $file->getClientOriginalName();
		$file->move('public/scheduleImages', $filename);
		$sched = new Schedule;
		$sched->image = $filename;
		$sched->title = Input::get('title');
		$sched->descriptions = Input::get('description');
		$sched->schedule = Input::get('schedule');
		$sched->save();
		return redirect('cms/scheduler');
	  } else {
		echo"<script>
                alert('please choose file');
                </script>
                    ";
	  }

	  return redirect('cms/scheduler');
    }

    public function show($id) {
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
	  return view('cms.Schedules.edit', $arData);
    }

    public function update($id) {
	  Schedule::updateSchedule($id);
	  return redirect('cms/scheduler');
    }

    public function destroy($id) {
	  
    }

    public function deleteSchedule() {
	  $checked = Request::get('checked');

	  foreach ($checked as $check) {
		$sched = Schedule::find($check);
		$sched->delete();
	  }
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
	  $decodedSchedules = json_encode($daySchedules);
	  return Response::json(array($decodedSchedules));
    }

}
