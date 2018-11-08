<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function brand() {
        return $this->belongsTo('App\Brand', 'brand_id');
    }

    public function hotels() {
        return $this->hasMany('App\Hotel');
    }

    protected $visible = ['id', 'name', 'points'];
}
