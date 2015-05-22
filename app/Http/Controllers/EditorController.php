<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Editor;
use File;
use Response;
use Input;
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
        $directories = File::directories('resources/views/site');
        $arData = array(
            'cssFiles' => $cssFiles,
            'jsFiles' => $jsFiles,
            'siteFiles' => $siteFiles,
            'directories' => $directories
        );
        return View('cms/Editors.test', $arData);
    }
    
    public function folder(){
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

    public function getAllfile() {
        
    }

    public function updateFile() {
        //file path
        $file = Input::get('hidden');
        $content = Input::get('content');
        unlink($file);
        if (file_put_contents($file, $content, FILE_APPEND)) {
            Cache::flush();
            return redirect('cms/editor');
        }
    }

    public function addFile(Request $request) {

        $file = $request->file('file');
        if ($file) {
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            if ($extension == 'js') {
                $file->move('public/site/js', $filename);
            } elseif ($extension == 'css') {
                $file->move('public/site/css', $filename);
            } else {
                $file->move('resources/views/site', $filename);
            }
        } else {
            return redirect('cms/editor');
        }
        return redirect('cms/editor');
    }

}
