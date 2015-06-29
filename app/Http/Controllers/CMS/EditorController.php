<?php

namespace App\Http\Controllers\CMS;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Editor;
use File;
use Response;
use Input;
use Request;
use Cache;
use View;

class EditorController extends Controller {

    public function __construct() {
	  //Read the settings .env set app title and tag line
	  View::share('APP_TITLE', env('APP_TITLE'));
	  View::share('APP_TAG_LINE', env('APP_TAG_LINE'));

	  //$this->middleware('guest'); 	 //Doesn't require active user
	  $this->middleware('is.allowed'); //Require require active user
    }

    public function index() {
	  $this->regenerateMenuSession('cms.editor.index', 'cms.editor.index');
	  $parents = Editor::getAllParent();

	  $arData = array(
		'parents' => $parents
	  );
	  return View('cms.Editors.index', $arData);
    }

    public function folder() {
	  return 'test';
    }

    public function create() {
	  //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
	  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function Show($id) {
	  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
	  //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
	  //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
	  //
    }

    //Read requested file
    public function readFile() {
	  $file_dir = file(Input::get('file_dir'));
	  return Response::json($file_dir);
    }

    public function updateFile() {
	  //file path
	  $file = Input::get('hidden');
	  $content = Input::get('content');
	  unlink($file);

	  if (file_put_contents($file, $content, FILE_APPEND)) {
		return Response::json('ok');
	  } else {
		return Response::json('not ok');
	  }
    }

    public function addFile() {
	  //dd(Input::hasFile('file'));
//        
//        $file= Input::file('file');
//        dd($file->getClientOriginalName());

	  $file = Input::file('file');
	  $path = Input::get('path');

	  if ($file) {
		$filename = $file->getClientOriginalName();
		$file->move($path, $filename);
		return redirect('cms/editor');
	  } else {
		return redirect('cms/editor');
	  }
    }

    public function addFolder() {
	  $name = Input::get('foldername');
	  $path = Input::get('path');
	  $parent = Input::get('parent');
	  $editor = new Editor;
	  $editor->name = $name;
	  $editor->path = $path . '/' . $name;
	  $editor->parent_id = $parent;
	  $editor->save();
	  $result = File::makeDirectory($path . '/' . $name);
	  return Response::json('ok');
    }
    
    public function addParentFolder(){
	  $newParentFolderName = Request::get('parentFolderName');
	  $editor =  new Editor;
	  $editor->name = $newParentFolderName;
	  $editor->path = 'public/'.$newParentFolderName;
	  $editor->parent_id = 0;
	  $editor->save();
	  File::makeDirectory('public/'.$newParentFolderName);
	  return Response::json('ok');	  
    }

}
