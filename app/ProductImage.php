<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    //
    protected $fillable = ['product_id'];
    protected $casts = [
      'product_image' =>'array',
    ];

    public function products()
         {
           return $this->belongsTo('App\Product');
         }

}
