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

//        $clickFile = \DB::table('click_files')
//                    ->orderBy('clickFile', 'asc')
//                    ->pluck('clickFile');
        $jsPath = 'js';
        $cssPath = 'css';
        $otherPath = 'otherfiles';
        $jsFiles = File::files($jsPath);
        $cssFiles = File::files($cssPath);
        $otherFiles = File::files($otherPath);
        $arData = array(
            'cssFiles' => $cssFiles,
            'jsFiles' => $jsFiles,
            'otherFiles' => $otherFiles
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
    public function Showw($id) {
        $jsPath = 'js';
        $cssPath = 'css';
        $jsFiles = File::files($jsPath);
        $cssFiles = File::files($cssPath);

        $arData = array(
            'cssFiles' => $cssFiles,
            'jsFiles' => $jsFiles,
            'filename' => $id
        );
        return Response::json(array($arData));
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
        $file = '../public/'.$file;
        unlink($file);
        if (file_put_contents($file, $content, FILE_APPEND)) {
            return redirect('Editor');
        }
        
       
    }

    public function addFile(Request $request) {

        $file = $request->file('file');
        if ($file) {
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            if ($extension == 'js') {
                $file->move('../public/js', $filename);
            } elseif ($extension == 'css') {
                $file->move('../public/css', $filename);
            } else {
                $file->move('../public/otherfiles', $filename);
            }
        } else {
            return redirect('Editor');
        }
        return redirect('Editor');
    }

}
