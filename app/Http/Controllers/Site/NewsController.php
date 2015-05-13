<?php namespace App\Http\Controllers\Site;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use DB;
use View;
use Input;
use Validator;
use Redirect;
use Session;
use File;
use App\Models\News;
use HTML; 
use Image;
use Response;

class NewsController extends Controller {
	public function index() {
    	$results = News::all_news();
  		$archive = News::archive();
    	return View::make('site.news.index')->with(array('results'=>$results,'archive'=>$archive));
  	}

	public function show($id, $slug = '') {
    	$result = News::find($id);
    	$archive = News::archive();
      	return View::make('site.news.show')->with(array('result'=>$result,'archive'=>$archive));
	}


}