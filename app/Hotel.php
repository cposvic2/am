<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public function brand() {
        return $this->belongsTo('App\Brand', 'brand_id');
    }

    public function subbrand() {
        return $this->belongsTo('App\Subbrand', 'subbrand_id');
    }

    public function category() {
        return $this->belongsTo('App\Category', 'category_id');
    }
}
