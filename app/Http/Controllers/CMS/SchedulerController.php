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

class SchedulerController extends Controller {

//    public function __construct() {
//	  $this->middleware('is.allowed'); //Require require active user
//    }

    public function index() {
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
		return redirect('cms/addSchedule');
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

	  $sched = Schedule::find($id);
	  $schedCount = Schedule::getMainBannerImagesCount($id);
	  $bannerImages = Schedule::getAllImages($id);
	  $arData = array(
		'schedules' => $sched,
		'bannerImages' => $bannerImages,
		'schedCount' => $schedCount
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
	  $schedules = Schedule::all();
	  $arData = array(
		'schedules' => $schedules
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

}
