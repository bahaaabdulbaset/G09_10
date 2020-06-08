<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products() {
        return $this->hasMany(\App\Product::class, 'category_id', 'id');
    }

    public function image() {
        return $this->belongsTo(\App\Image::class, 'image_id', 'id');
    }
}
