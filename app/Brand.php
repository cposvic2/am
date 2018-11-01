<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function subbrands() {
        return $this->hasMany('App\Subbrand');
    }

    public function hotels() {
        return $this->hasMany('App\Hotel');
    }
}
