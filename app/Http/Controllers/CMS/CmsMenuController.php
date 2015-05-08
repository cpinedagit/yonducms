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
use Input;
use DB;

class CmsMenuController extends Controller {

    //
    public $html = '';
    public $countLoop = 0;

    function index() {

        $objMenu = DB::table('content_json')->get();

        foreach ($objMenu as $obj) {
            $objMenuserialize = json_decode($obj->page_content, true);
        }
        $innerHtml = $this->decodeRecurse($objMenuserialize);
        return view('cms.menu.index')->with('innerHtml', $innerHtml);
    }

    // testing
    function throwJson() {
        $arrJson = Input::get('serialize_menu');

        DB::table('content_json')
                ->where('page_id', 1)
                ->update(['page_content' => $arrJson]);
        return redirect('admin/menu');
    }

    function decodeRecurse($jsonMenu) {
//        $this->countLoop++;
        foreach ($jsonMenu as $key => $value) {
            if (is_array($value)) {
//                echo $this->countLoop;
//                if ($this->countLoop == 1) {
//                    $this->html .= "<ol class='dd-list' id='list-cont'>";
//                } else {
//                }
//                $this->decodeRecurse($value);
                if ($key === 'children') {

                    $this->html .= "<ol class='dd-list'>";
                }

                $this->decodeRecurse($value);

                if ($key === 'children') {

                    $this->html .= "</ol>";
                }
            } else {

                if ($jsonMenu['id'] === $value) {

                    $this->html .= "<li class='dd-item' data-id=" . $jsonMenu['id'] . " data-menu=" . $jsonMenu['menu'] . " data-url=" . $jsonMenu['url'] . "><div class='dd-handle'>" . $jsonMenu['menu'] . "</div><div class='dd-remove dd3-remove'></div>";
                }
            }
        }
        $this->html .= "</li>";
        return $this->html;
    }

}
