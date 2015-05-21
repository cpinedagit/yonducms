<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use Input;
use Cache;
use Response;
use DB;
use Request;

class BannerController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $this->regenerateMenuSession('cms.banners.index', 'cms.banners.index');
        $banners = Banner::all();
        $bannersCount = count($banners);
        $getAllMainBanner = Banner::getAllMainBanner();
        $getAllMainBannerCount = count($getAllMainBanner);
        $getAllSubBanner = Banner::getAllSubBanner();
        $getAllSubBannerCount = count($getAllSubBanner);
        $arData = array(
            'banners' => $banners,
            'bannersCount' => $bannersCount,
            'getAllMainBannerCount' => $getAllMainBannerCount,
            'getAllSubBannerCount' => $getAllSubBannerCount
        );
        return view('cms/Banners/index', $arData);
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
        $banner = new Banner;
        $banner->title = Input::get('name');
        $banner->type = Input::get('type');
        $banner->save();
        return redirect('cms/banners');
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
        $this->regenerateMenuSession('cms.banners.index', 'cms.banners.index');
        $banners = Banner::edit($id);
        $images = DB::table('images')->get(array('images.image', 'images.id'));
        $currentImages = Banner::getImages($id);
        $bannerType = Banner::getBannerType($id);
        $arData = array(
            'banners' => $banners,
            'currentImages' => $currentImages,
            'images' => $images,
            'type' => $bannerType,
        );
        return view('cms/Banners/edit', $arData);
    }

    public function saveImage() {
        $saveImage = Banner::saveImage();
        return Response::json('ok');
    }

    public function delImage() {
        $selected = Request::get('selected');
        foreach ($selected as $select) {
            $fk_banner = DB::table('fk_banners')->where('id', '=', $select);
            $fk_banner->delete();
        }
        return Response::json('ok');
    }

    public function delCurrentImage($id) {
        $fk_banner = DB::table('fk_banners')->where('id', '=', $id);
        $fk_banner->delete();
        return Response::json('ok');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $checked = Input::get('ID');
        Banner::updateBanner($id);
        return redirect('cms/banners');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {

        Banner::destroy($id);
        return Response::json('ok');
    }

    public function addBanner() {
        return View('cms/Banners.add');
    }

    public function frontEnd() {
        $images = Image::all()->orderBy('order', 'asc');
        $arData = array(
            'images' => $images
        );
        return View('cms/Images.frontend', $arData);
    }

}
