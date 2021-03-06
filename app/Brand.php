<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function subbrands() {
        return $this->hasMany('App\Subbrand');
    }

    public function categories() {
        return $this->hasMany('App\Category');
    }

    public function hotels() {
        return $this->hasMany('App\Hotel');
    }

    protected $with = ['subbrands', 'categories'];

    protected $visible = ['id', 'name', 'points_name', 'marker_img', 'subbrands', 'categories'];
}
