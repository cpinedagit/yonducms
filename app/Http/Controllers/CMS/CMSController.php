<?php namespace App\Http\Controllers\CMS;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;
use View;

class CMSController extends Controller {

	public function __construct()
	{
		//Read the settings .env set app title and tag line
		View::share('APP_TITLE', env('APP_TITLE'));
		View::share('APP_TAG_LINE', env('APP_TAG_LINE'));

		//$this->middleware('guest'); 	 //Doesn't require active user
		$this->middleware('is.allowed'); //Require require active user
	}

	public function index()
	{
		return view('cms.home');
	}

}
