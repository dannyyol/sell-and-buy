<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class School extends Model
{
    //
    protected $table = 'schools';
    protected $fillable = ['name'];
    //creating  a relationship between category and products
    public function products()
    {
//       return $this->hasMany('App\Product');
      return $this->hasMany(Product::class);
    }

    public static function boot() {
        parent::boot();
        static::creating(function ($school){
            $school->slug = Str::slug($school->name);
        });
    }
}
