<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Input;
use DB;

class MyCollection2 extends \Illuminate\Database\Eloquent\Collection {

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

class Banner extends Model {

    protected $table = 'banners';

    public function newCollection(array $models = array()) {
        return new MyCollection2($models);
    }

    public static function edit($id) {
        return Banner::find($id);
    }

    public static function getImages($id) {
        return DB::table('banners')
                        ->leftJoin('fk_banners', 'fk_banners.banner_id', '=', 'banners.id')
                        ->leftJoin('images', 'images.id', '=', 'fk_banners.image_id')
                        ->where('banners.id', '=', $id)
                        ->get(array('images.image', 'images.id'));
    }

    public static function updateBanner($id) {

        $file = Input::file('image');
        if (Input::hasFile('image')) {
            $filename = $file->getClientOriginalName();
            $file->move('../public/images', $filename);
        }
        $banner = Banner::find($id);
        $banner->title = Input::get('name');
        $banner->type = Input::get('banner');
        $banner->save();
    }

    public static function myBanner($id) {
        $banner = DB::table('banners')
                ->leftJoin('fk_banners', 'fk_banners.banner_id', '=', 'banners.id')
                ->leftJoin('images', 'images.id', '=', 'fk_banners.image_id')
                ->where('banners.id', '=', $id)
                ->get(array('images.image', 'images.id'));

        return $banner;
    }

    public static function getBannerType($id) {
        return $banner = DB::table('banners')
                ->where('id','=', $id)
                ->pluck('type');
        
    }

}
