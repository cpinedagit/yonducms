<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Input;
use DB;

class Page extends Model {

    protected $table = 'pages';

    public function newCollection(array $models = array()) {
        return new MyCollection($models);
    }

    public static function edit($id) {
        return Page::find($id);
    }

    public static function updatePage($id) {
        $content = Input::get('editor1');
        $page = Page::find($id);
        $page->title = Input::get('title');
        $page->url = Input::get('url');
        $page->content = $content;
        $page->save();
    }

    public static function getBanner($bannerId) {
        return DB::table('banners')
                        ->leftJoin('fk_banners', 'fk_banners.banner_id', '=', 'banners.id')
                        ->leftJoin('images', 'images.id', '=', 'fk_banners.image_id')
                        ->where('banners.id', '=', $bannerId)
                        ->get(array('images.image'));
    }

}

class MyCollection extends \Illuminate\Database\Eloquent\Collection {

    public function orderBy($attribute, $order = 'asc') {
        $this->sortBy(function($model) use ($attribute) {
            return $model->{$attribute};
        });

        if ($order == 'desc') {
            $this->items = array_reverse($this->items);
        }

        return $this;
    }

}
