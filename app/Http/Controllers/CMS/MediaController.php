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
use App\Models\Media;
use HTML; 
use Image;
use Response;

class MediaController extends Controller {

  
  public function index() {
    $files = Media::All();
    return View::make('cms.media.index')->with(array('files'=>$files));
  }

  public function create() {
     return View::make('cms.media.add');
  }

  public function show($id, $slug = '') {
      $file = Media::find($id);
      list($width, $height) = getimagesize($file->media_path);
      $file_name= after_last("/",$file->media_path);
      return View::make('cms.media.show')->with(array('file'=>$file,'filename'=>$file_name,'width'=>$width,'height'=>$height));
  
  }

  public function store()
  {

     $files = Input::file('fileselect');
      $file_count = count($files);
      $uploadcount = 0;
      foreach($files as $file) {
       
          $imagesPath = 'uploads/image';
          $videosPath = 'uploads/video';
          $year = date("Y");
          $month = date("m");
          $filename = $file->getClientOriginalName();
          $extension = $file->getClientOriginalExtension();
          $filePath = realpath($file);

          $mime = mime_content_type($filePath);
          if(strstr($mime, "video/")){
              $fileType= 2;
              $file->move($videosPath.'/'.$year.'/'.$month, $filename);
              $original_path = $videosPath.'/'.$year.'/'.$month.'/'.$filename;
          }else if(strstr($mime, "image/")){
              $fileType = 1;
              $file->move($imagesPath.'/'.$year.'/'.$month, $filename);
              $original_path = $imagesPath.'/'.$year.'/'.$month.'/'.$filename;
          }
          //  $image = Image::make(url($destinationPath.'/'.$year.'/'.$month.'/'.$filename))->resize(300, 400)->save(public_path($original_path));
          $media = new Media;
          $media->media_path = $original_path;
          $media->media_type = $fileType;
          $media->save();
          $uploadcount ++;
        
      }
    }

  public function edit($slug) {
    

  }

  public function update($id) {
      $media = Media::find($id);
      $new_filename = Input::get('image_file_name');
      $old_filename = Input::get('image_file_name_orig');
      $path = before_last ('/',$media->media_path);
      rename($path.'/'.$old_filename,$path.'/'.$new_filename);
      $media->media_path = $path.'/'.$new_filename;
      $media->caption= Input::get('caption');
  //    $media->description= Input::get('description');
      $media->alternative_text= Input::get('alternative_text');
      $media->save();
      Session::flash('message', 'Successfully updated user!');
      return Redirect::to('cms/media');
  }

  public function destroy($id) {
        $media = Media::find($id);
        $media->delete();

        Session::flash('message', 'Successfully deleted the nerd!');
        return Redirect::to('cms/media');
    }

 public function gallery()
    {
        if(Request::ajax()) {
        $array = Request::get('selected');
        $results = DB::table('content_media')
                    ->whereIn('media_id', $array)->get();
        return Response::json(array($results));
    }
    } 

  public function getAll()
  {
    $files = Media::All();
     return Response::json(array($files));
  }
}