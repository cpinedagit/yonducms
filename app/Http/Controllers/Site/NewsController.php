<?php namespace App\Http\Controllers\Site;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Site\News;
use Request;
use DB;
use View;
use Input;
use Validator;
use Redirect;
use Session;
use File;
use HTML; 
use Image;
use Response;

class NewsController extends Controller {
	public function index() {
      $imagesPath = 'uploads/news_image/';
    	$results = News::All();
  		$archive = News::archive();
    	return View::make('site.news.index')->with(array('results'=>$results,'archive'=>$archive,'imagesPath'=>$imagesPath));
  	}

	public function show($id, $slug = '') {
    	$result = News::find($id);
    	$archive = News::archive();
      $imagesPath = 'uploads/news_image/';
     // return view('site/News/show', array('result'=>$result,'archive'=>$archive));
      	return View::make('site.news.show')->with(array('result'=>$result,'archive'=>$archive,'imagesPath'=>$imagesPath));
	}

}