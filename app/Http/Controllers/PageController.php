<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Page;
use Input;
use DB;
use File;

class PageController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
//        $pages = DB::table('content_json')->select('page_content')->get();
//                echo'<pre>';
//        foreach($pages as $page)
//        {
//          $decoded = json_decode($page->page_content,true);
//                  print_r($decoded['content']);
//            
//        }        

        $pages = Page::all();
        //('palit', $orig)
        return View('cms/Pages/index')->with('pages', $pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $content = Input::get('editor1');
        $page = new Page;
        $page->content = $content;
        $page->title = Input::get('title');
        $page->banner = Input::get('banner');
        $page->save();
        return redirect('Pages');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $banners = DB::table('banners')->get(array('banners.title', 'banners.id'));
        foreach ($banners as $banner) {
            $arrays[] = (array) $banner;
        }
        $pages = Page::edit($id);
        $arData = array(
            'pages' => $pages,
            'banners' => $banners
        );
        return view('cms/Pages/edit', $arData);
    }

    public function preview($id, $bannerId) {

        $banner = Page::getBanner($bannerId);
        $pages = Page::edit($id);
        $arData = array(
            'pages' => $pages,
            'banners' => $banner
        );
        return view('site/index', $arData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        Page::updatePage($id);
        return redirect('Pages');
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

    public function addPage() {
        $id = Page::all()->orderBy('id', 'desc')->first();
        if ($id) {
            return view('cms/Pages/add', $id);
//        mkdir("../resources/views/TESTFOLDER");
//        fopen("../resources/views/TESTFOLDER/index.blade.php", 'w');
//        return redirect('Pages');
        } else {
            return view('cms/Pages/add');
//        mkdir("../resources/views/TESTFOLDER");
//        fopen("../resources/views/TESTFOLDER/index.blade.php", 'w');
//        return redirect('Pages');
        }
    }

}
