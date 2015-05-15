<?php

/**
 * Cms Menu Management
 * Yondu Web Service
 * Author: Allan Perez
 */

namespace App\Http\Controllers\CMS;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;
use App\Models\Page;
use Input;
use DB;
use Illuminate\Database\Query\Builder;

class CmsMenuController extends Controller {

    //
    public $html = '';
    public $countLoop = 0;
    public $arrData = [];

    function index() {
        $objMenu = Menu::where('parent_id', 0)->orderBy('order_id')->get();
        $objPage = Page::all();
        $objData = [
            'objMenu' => $objMenu,
            'objPage' => $objPage,
        ];
//        return view('cms.menu.index', compact('objMenu'));
        return view('cms.menu.app', $objData);
    }

    function updateTitleMenu() {
        $id = Input::get('menu_id');
        $label = Input::get('menu_label');

        $menu_name_update = Menu::find($id);
        $menu_name_update->label = $label;
        $menu_name_update->save();
    }

    // stores structure
    function store() {

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
        return $this->index();
    }

}
