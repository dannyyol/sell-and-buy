<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    //
    protected $fillable=['firstname','lastname','level','birthday','gender','mobile','photo','user_id', 'school'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
