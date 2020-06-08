<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public function image() {
        return $this->belongsTo(\App\Image::class, 'image_id', 'id');
    }
}
