<?php namespace App\Http\Controllers\CMS;

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
    $this->regenerateMenuSession('cms.news.index', 'cms.news.index');
    $all = DB::table('content_news')->count();
    $published = DB::table('content_news')
                     ->select(DB::raw('count(*) as c_pub'))
                     ->where('published', '=', 1)
                     ->get();
    $featured = DB::table('content_news')
                     ->select(DB::raw('count(*) as c_fea'))
                     ->where('featured', '=', 1)
                     ->get();

    $results = News::All();
    return View::make('cms.news.index')->with(array('results'=>$results,'all'=>$all,'published'=>$published,'featured'=>$featured));
  }

  public function create() {
     return View::make('cms.news.add');
  }

  public function show($id, $slug = '') {
      $result = News::find($id);
      return View::make('cms.news.show')->with(array('result'=>$result));
  
  }

  public function store()
  {
      $file = Input::file('file');
      $filename = $file->getClientOriginalName();
      $file->move('uploads/news_image/', $filename);
      $original_path = 'uploads/news_image/'.$filename;

      $news = new News;
      $news->news_title = Input::get('news_title');
      $news->news_content = Input::get('news_content');
      $news->news_date = date("Y-m-d",strtotime(Input::get('news_date')));
      $news->description = Input::get('description');
      $news->published = Input::get('published');
      $news->featured = Input::get('featured');
      $news->image_path = $original_path;

      $news->save();
          
      return Redirect::to('cms/news');
    }

  public function edit($slug) {
    

  }

  public function update($id) {

      $news = News::find($id);
      $file = Input::file('file');
      $file_count = count($file);
      if($file_count > 0) {
      $filename = $file->getClientOriginalName();
      $file->move('uploads/news_image/', $filename);
      $original_path = 'uploads/news_image/'.$filename;
      $news->image_path = $original_path;
      }
      $news->news_title = Input::get('news_title');
      $news->news_content = Input::get('news_content');
      $news->news_date = date("Y-m-d",strtotime(Input::get('news_date')));
      $news->description = Input::get('description');
      $news->published = Input::get('published');
      $news->featured = Input::get('featured');
      $news->save();
      return Redirect::to('cms/news');
  }

  public function destroy($id) {
      $news = News::find($id);
      $news->delete();
      return Response::json(array($id)); 
    }

  public function deleteSelected() {
      $selected = Request::get('selected');
      foreach ($selected as $select) {
         $news = News::find($select);
         $news->delete();
       }
      return Response::json(array($selected)); 
  }
}