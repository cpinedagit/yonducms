<?php

/**
 * Cms Menu Management
 * Yondu Web Service
 * Author: Allan Perez
 */

namespace App\Http\Controllers\CMS;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;
use App\Models\Page;
use Input;
use View;
use DB;
use Illuminate\Database\Query\Builder;
use Request;
use Response;

class CmsMenuController extends Controller {

    //
    public $html = '';
    public $arrData = [];

    public function __construct()
    {
        //Read the settings .env set app title and tag line
        View::share('APP_TITLE', env('APP_TITLE'));
        View::share('APP_TAG_LINE', env('APP_TAG_LINE'));

        //$this->middleware('guest');    //Doesn't require active user
        $this->middleware('is.allowed'); //Require require active user
    }

    function index() {
        $objMenu = Menu::ParentNavi();
        $objPage = Page::all();
        $objData = [
            'objMenu' => $objMenu,
            'objPage' => $objPage,
        ];
//        return view('cms.menu.index', compact('objMenu'));
        return view('cms.menu.index', $objData);
    }

    function updateLabelMenu() {
        $id = Input::get('menu_id');
        $label = Input::get('menu_label');
        $menu_link = Input::get('menu-link');

        $menu_name_update = Menu::find($id);
        $menu_name_update->label = $label;
        $menu_name_update->external_link = $menu_link;
        $menu_name_update->save();
    }

    // we use other than resource method to avoid ajax conflict
    function updatemenu() {

        $arrJson = Input::get('nestable-output');
        $arrData = json_decode($arrJson, TRUE);
        foreach ($arrData as $key => $value) {
            foreach ($value as $key1 => $value1) {
                if (($key1 == 1)) {
                    if ($value[1] === null) {
                        $parent_id = 0;
                    } else {
                        $parent_id = $value[1];
                    }
                    $menusave = Menu::find($value[0]);
                    $menusave->parent_id = $parent_id;
                    $menusave->save();
                }
                if (($key1 == 2)) {
                    $menusave = Menu::find($value[0]);
                    $menusave->order_id = $value[2];
                    $menusave->save();
                }
            }
        }
    }
    
    // data add from page table
    function addPagetoMenu(Menu $page_menu) {
        if (Request::ajax()) {
            $page_menu->label = Request::get('label');
            $page_menu->parent_id = 0;
            $page_menu->page_id = Request::get('page_id');
            $page_menu->order_id = Request::get('order_id');
            if ($page_menu->save()) {
                return Response::json(array('last_id' => $page_menu->menu_id));
            }
        }
    }
    
    // adding external links
    function addLinktoMenu(Menu $link_menu) {
        if (Request::ajax()) {
            $link_menu->label = Request::get('label');
            $link_menu->parent_id = 0;
            $link_menu->page_id = 0;
            $link_menu->external_link = Request::get('external_link');
            $link_menu->order_id = Request::get('order_id');
            if ($link_menu->save()) {
                return Response::json(array('last_id' => $link_menu->menu_id));
            }
        }
    }

    // we use delete word than resource destroy method to avoid ajax conflict
    function deleteMenu(Menu $menu) {
        $id = Request::get('del_id');
        $menu_parent = Menu::find($id);
        if ($menu_parent->delete()) {
            
           // $menu_child = Menu::where('parent_id', '=', $id);
            $menu_child = $menu->where('parent_id', '=', $id)->get();
            foreach ($menu_child as $id_child) {
                $this->deleteChildMenu($id_child->menu_id);
            }
        }
    }
    
    function deleteChildMenu($id) {
        $menu_parent = Menu::find($id);
        if ($menu_parent->delete()) {
            $menu_child = DB::table('site_menus')->where('parent_id', '=', $id)->get();
            foreach ($menu_child as $id_child) {
                $this->deleteChildMenu($id_child->menu_id);
            }
        }
    }
    
    

}
