<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Models\cms\User;
use App\Models\News;
use App\Models\Page;
use App\Models\Banner;
use View;
use Feeds;
use Session;

class MainController extends Controller {

	protected $data = array();

	public function __construct()
	{
		//Read the settings .env set app title and tag line
		View::share('APP_TITLE', env('APP_TITLE'));
		View::share('APP_TAG_LINE', env('APP_TAG_LINE'));

		//Bell notifications
        View::share('bell_counter', User::bellCounter());

		//$this->middleware('guest'); 	 //Doesn't require active user
		$this->middleware('is.allowed'); //Require require active user
	}

	public function index()
	{
		return view('main');
	}

	
}