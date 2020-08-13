<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentImage extends Model
{
  use CommentableTrait;
  protected $fillable = ['comment_id'];
  protected $casts = [
    'comment_image' =>'array',
  ];
   public function comment()
    {
      return $this->belongsTo('App\Comment');
    }


}
