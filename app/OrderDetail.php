<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public function product()
    {
       return $this->belongsTo(\App\Product::class, 'product_id', 'id');
    }
}
