<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Comment;
use App\Thread;
class LikeController extends Controller
{
    //
    public function toggleLike()
     {
         $commentId=Input::get('commentId');
         $comment=Comment::find($commentId);

  //        $usersLike= $comment->likes()->where('user_id',auth()->id())->where('likable_id',$commentId)->first();
          if(!$comment->isLiked()){
              $comment->likeIt();
              return response()->json(['status'=>'success','message'=>'liked']);

          }else{
              $comment->unlikeIt();
              return response()->json(['status'=>'success','message'=>'unliked']);

          }


     }


     public function threadtoggleLike()
      {
          $threadId=Input::get('threadId');
          $thread=Thread::find($threadId);

   //        $usersLike= $comment->likes()->where('user_id',auth()->id())->where('likable_id',$commentId)->first();
           if(!$thread->isLiked()){
               $thread->likeIt();
               return response()->json(['status'=>'success','message'=>'liked']);

           }else{
               $thread->unlikeIt();
               return response()->json(['status'=>'success','message'=>'unliked']);

           }


      }
}
