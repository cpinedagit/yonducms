<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Editor;
use File;
use Response;
use Input;
use Request;
use Cache;


class EditorController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $this->regenerateMenuSession('cms.editor.index', 'cms.editor.index');
        $jsPath = 'public/site/js';
        $cssPath = 'public/site/css';
        $sitePath = 'resources/views/site';
        $jsFiles = File::files($jsPath);
        $cssFiles = File::files($cssPath);
        $siteFiles = File::files($sitePath);
        $jsDir = File::directories('public/site/js');
        $cssDir = File::directories('public/site/css');
        $directories = File::directories('resources/views/site');
        $paths = Editor::getAllPath();
        $arData = array(
            'cssFiles' => $cssFiles,
            'jsFiles' => $jsFiles,
            'siteFiles' => $siteFiles,
            'jsDirectories' => $jsDir,
            'cssDirectories' => $cssDir,
            'directories' => $directories,
            'paths' => $paths
        );
        return View('cms/Editors.index', $arData);
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

    public function updateFile() {
        //file path
        $file = Input::get('hidden');
        $content = Input::get('content');
        unlink($file);
        Cache::flush();
        if (file_put_contents($file, $content, FILE_APPEND)) {
            return redirect('cms/editor');
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
//            $extension = $file->getClientOriginalExtension();            
//            if ($extension == 'js') {
//                $file->move('public/site/js', $filename);
//            } elseif ($extension == 'css') {
//                $file->move('public/site/css', $filename);
//            } else {
//                $file->move('resources/views/site', $filename);
//            }
            $file->move($path,$filename);
        } else {
            return redirect('cms/editor');
        }
        return redirect('cms/editor');
    }
    
    public function addFolder(){
        $name = Request::get('name');
        $path = Request::get('path');    
        $parent = Request::get('parent');
        $editor = new Editor;
        $editor->name = $parent.'/'.$name;
        $editor->path = $path.'/'.$name;
        $editor->save();
        $result = File::makeDirectory($path.'/'.$name);
        return Response::json('ok');
    }

}
