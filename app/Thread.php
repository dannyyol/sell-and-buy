<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Nicolaslopezj\Searchable\SearchableTrait;
use App\Comment;
use Illuminate\Support\Str;

// use Spatie\Searchable\Searchable;
// use Spatie\Searchable\SearchResult;

class Thread extends Model
{
    //
    use CommentableTrait, LikableTrait,RecordsFeed;
    protected $table = 'threads';
    protected $fillable=['subject','tdCategory_id','slug','thread','user_id', 'visit_count'];

    
    public static function boot() {
        parent::boot();
        static::creating(function ($thread){
            $thread->slug = Str::slug($thread->subject);
        });
    } 
    protected function recordFeed($event)
    {
          $this->feeds()->create([
            'user_id'=>auth()->id(),
            'type'=> $event.'_'.strtolower(class_basename($this))
          ]);
    }

    public function feeds()
    {

      return $this->morphMany(Feed::class, 'feedable');

    }

    // public function getRouteKeyName()
    // {
    //     return 'subject';
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function threadcategory()
    {
        return $this->belongsTo(Threadcategory::class, 'tdCategory_id');
    }

    

    public function scopeFilter($filterQuery,ThreadFilters $threadFilters)
    {
        $threadFilters->apply($filterQuery);
    }

    // public function comments()
    // {
    //   return $this->hasMany(Comment::class);
    // }

    public function thread_images()
    {
//       return $this->hasMany('App\Product');
      return $this->hasMany(ThreadImage::class);
    }

    
}
