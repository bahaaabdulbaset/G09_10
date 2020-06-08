<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function image() {
        return $this->belongsTo(\App\Image::class, 'image_id', 'id');
    }

    public function category() {
        return $this->belongsTo(\App\Category::class, 'category_id', 'id');
    }
}
