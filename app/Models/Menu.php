<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;


class Menu extends Model {

    protected $table = 'site_menus';
    protected $primaryKey = 'menu_id';

    public static function hasChild($menu_id) {
      
        $children = DB::table('site_menus')->select('menu_id', 'page_id', 'label', 'parent_id')->where('parent_id', $menu_id)->orderBy('order_id')->get();
        if(count($children) > 0){
            return $children;
        }
    }

}
