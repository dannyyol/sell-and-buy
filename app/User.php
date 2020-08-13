<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\UserProfile;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()//this will check whether the admin column is empty or contains any value 1
    {
      return $this->admin;//this will check column in admin table
    }

    // check online user
    public function isOnline(){
        return Cache::has('user-is-online-' . $this->id);
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function products()
    {
//       return $this->hasMany('App\Product');
      return $this->hasMany(Product::class);
    }

    public function threads()
    {
        return $this->hasMany(Thread::class);
    }

    public function feeds()
    {
      return $this->hasMany(Feed::class);
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function userprofile()
    {
//       return $this->hasMany('App\Product');
      return $this->hasOne("App\UserProfile");
    }
    

}
