<?php namespace App\Http\Controllers\Site;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Site\News;
use App\Models\Page;
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
use App\Models\Menu;

class NewsController extends Controller {
	public function index() {
     }

	public function show($id, $slug = '') {
    	$result = News::find($id);
    	$archive = News::archive();
      $imagesPath = 'uploads/news_image/';
    	return View::make('site.news.show')->with(array('result'=>$result,'archive'=>$archive,'imagesPath'=>$imagesPath));
	}

  public function preview($slug='', $slug2 = '') {
   
      $result = News::find($slug2);
      $archive = News::archive();
      $imagesPath = 'uploads/news_image/';
        return View::make('site.news.show')->with(array('result'=>$result,'archive'=>$archive,'imagesPath'=>$imagesPath));


  }

}