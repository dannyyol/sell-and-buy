<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThreadCategory extends Model
{
    //
    protected $table = 'thread_categories';
    protected $fillable=['name'];

    public function threads(){
        
        return $this->hasMany(Threads::class);

    }

}
