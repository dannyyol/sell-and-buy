<?php
/**
 * Created by PhpStorm.
 * User: webdev
 * Date: 4/23/2017
 * Time: 7:35 AM
 */

namespace App;


trait RecordsFeed
{
  protected static function bootRecordsFeed()
  {
    static::created(function($model){
      $model->recordFeed('created');
    });


  }
  public function feeds()
  {
    return $this->morphMany(Feed::class, 'feedable');
  }

  protected function recordFeed($event)
  {
    $this->feeds()->create([
      'user_id'=>auth()->id(),
      'type'=> $event.'_'.strtolower(class_basename($this))
    ]);
  }



}
