<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Editor;
use File;
use Response;
use Input;

class EditorController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $this->regenerateMenuSession('cms.editor.index', 'cms.editor.index');
//        $clickFile = \DB::table('click_files')
//                    ->orderBy('clickFile', 'asc')
//                    ->pluck('clickFile');
        $jsPath = 'public/site/js';
        $cssPath = 'public/site/css';
//        $otherPath = 'public/site/otherfiles';
        $jsFiles = File::files($jsPath);
        $cssFiles = File::files($cssPath);
        $jsFolders =  File::directories($jsPath);
//        $otherFiles = File::files($otherPath);
        $arData = array(
            'cssFiles' => $cssFiles,
            'jsFiles' => $jsFiles,
            'jsFolders' => $jsFolders
//            'otherFiles' => $otherFiles
        );
        return View('cms/Editors.index', $arData);
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
        $file = Input::get('hidden');
        $content = $_POST['content'];
        unlink($file);
        if (file_put_contents($file, $content, FILE_APPEND)) {
            return redirect('cms/editor');
        }
        
       
    }

    public function addFile(Request $request) {

        $file = $request->file('file');
        if ($file) {
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            if ($extension == 'js') {
                $file->move('public/js', $filename);
            } elseif ($extension == 'css') {
                $file->move('public/css', $filename);
            } else {
                $file->move('public/otherfiles', $filename);
            }
        } else {
            return redirect('cms/editor');
        }
        return redirect('cms/editor');
    }

}
