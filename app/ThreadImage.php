<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
class ThreadImage extends Model implements Searchable
{
    //
    protected $fillable = ['thread_id'];
    protected $casts = [
      'thread_image' =>'array',
    ];

    public function getSearchResult(): SearchResult
    {
        $url = route('forum.show', $this->id);

        return new SearchResult(
            $this,
            $this->filename,
            $url
         );
    }

     public function thread()
          {
            return $this->belongsTo('App\Thread');
          }
}
