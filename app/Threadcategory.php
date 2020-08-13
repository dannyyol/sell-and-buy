<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Threadcategory extends Model
{
    //
    protected $table = 'threadcategories';
    protected $fillable=['name'];

    public static function boot() {
        parent::boot();
        static::creating(function ($threadcategory){
            $threadcategory->slug = Str::slug($threadcategory->name);
        });
    } 

    public function threads(){
        
        return $this->hasMany(Thread::class, 'tdCategory_id');

    }

}
