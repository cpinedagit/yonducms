<?php

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