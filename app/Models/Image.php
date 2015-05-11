<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Input;

class Image extends Model {

    protected $table = 'images';

    public function newCollection(array $models = array()) {
        return new MyCollection($models);
    }

    public static function edit($id) {
        return Image::find($id);
    }

    public static function updateImage($id) {

        $file = Input::file('image');
        if (Input::hasFile('image')) {
            $filename = $file->getClientOriginalName();
            $file->move('../public/images', $filename);
        }
        $images = Image::find($id);
        $images->name = Input::get('name');
        if (isset($filename)) {
            $images->name = $filename;
        }
        $images->save();
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
