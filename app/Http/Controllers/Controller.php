<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use View;
use App\Models\Module;
use App\Models\SubMenu;
use Session;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

	public function __construct()
	{
		//Read the settings .env set app title and tag line
		View::share('APP_TITLE', env('APP_TITLE'));
		View::share('APP_TAG_LINE', env('APP_TAG_LINE'));
	}

	public function regenerateMenuSession($module, $submenu)
	{
		Session::put('module', $module);
		Session::put('submenu', $submenu);
	}
	
	// marking the label buttons of scheduler
	public function markDayScheduleList($day, $time, $tv_title)
	{
	    Session::forget('day_tv');
	    Session::forget('time_tv');
	    Session::forget('tv_title');
	    
	    Session::put('day_tv', $day);
	    Session::put('time_tv', $time);
	    Session::put('tv_title', $tv_title);
	}
}
