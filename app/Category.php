<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $table = 'categories';
    protected $fillable = ['name'];
    //creating  a relationship between category and products
    public function products()
    {
//       return $this->hasMany('App\Product');
      return $this->hasMany(Product::class);
    }
//search


}
