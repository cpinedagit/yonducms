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
use DB;
use Illuminate\Database\Query\Builder;
use Request;
use Response;

class CmsMenuController extends Controller {

    //
    public $html = '';
    public $arrData = [];

    function index() {
        $objMenu = Menu::where('parent_id', 0)->orderBy('order_id')->get();
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

        $menu_name_update = Menu::find($id);
        $menu_name_update->label = $label;
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

    function addPagetoMenu(Menu $page_menu) {
        if (Request::ajax()) {
            $label = Request::get('label');
            $page_id = Request::get('page_id');
            $order_id = Request::get('order_id');
            $page_menu->label = $label;
            $page_menu->parent_id = 0;
            $page_menu->page_id = $page_id;
            $page_menu->order_id = $order_id;
            if ($page_menu->save()) {
                return Response::json(array('last_id' => $page_menu->menu_id));
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
