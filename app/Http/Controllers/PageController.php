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
        $pages = Page::all();
        $arData = array(
            'pages' => $pages
        );
        return View('cms/Pages/index', $arData);
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
        $lastid = DB::table('pages')->orderBy('id','desc')->pluck('id');
        $incId = ++$lastid;
        $content = Input::get('editor1');
        $page = new Page;
        $page->content = $content;
        $page->title = Input::get('title');
        $page->url = 'http://localhost/lwebservice_2/public/site/page/'.$incId;
        $page->save();
        return redirect('cms/pages');
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

    public function edit($id) {
//        $banners = DB::table('banners')->get(array('banners.title', 'banners.id'));
//        $bannerId = DB::table('pages')
//                ->where('id', '=', $id)
//                ->pluck('banner');
//        $currentbanner = DB::table('banners')
//                ->where('id', '=', $bannerId)
//                ->pluck('title');
//        foreach ($banners as $banner) {
//            $arrays[] = (array) $banner;
//        }
        $pages = Page::edit($id);
        $arData = array(
            'pages' => $pages
        );
        return view('cms/Pages/edit', $arData);
    }

    public function preview($id) {
        $pages = Page::edit($id);
        $arData = array(
            'pages' => $pages
        );
        return view('site/Pages/index', $arData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        Page::updatePage($id);
        return redirect('cms/pages');
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
        $banners = DB::table('banners')->get(array('banners.title', 'banners.id'));
//        $id = Page::all()->orderBy('id', 'desc')->first();

        return view('cms/Pages/add')->with('banners', $banners);
    }

}
