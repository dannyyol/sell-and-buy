<?php

namespace App\Http\Controllers;

use App\Comment;
// use App\CommentImage;
use App\Thread;
use App\School;
use File;
use App\Notifications\RepliedToThread;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function addThreadComment(Request $request, Thread $thread, Comment $comment)
     {
         $this->validate($request,[
             'body'=>'required',
             'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
         ]);



         // $threads= Thread::find($thread);
         $thread->user->notify(new RepliedToThread($thread));
         // $comment = Thread::find($thread->id)->comments();

         $form=new Comment();
         $form->body = $request->body;
         $form->user_id=auth()->user()->id;
          if($request->hasfile('filename'))
            {
               foreach($request->file('filename') as $image)
               {
                   $name=time(). '.' .$image->getClientOriginalName();
                   $image->move(public_path().'/images/comment/', $name);
                   $data[] = $name;



               }
               $form->filename=json_encode($data);
               // $form->comment_id = $comment->id;
               // $form->filename=($name);

            }
            $thread->comments()->save($form);
            $form->save();



            //end delete


         return back()->withMessage('Comment Created');
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $schools= School::all();
        return view('shop.forum.create-reply', compact('schools'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
     public function show(Comment $comment)
     {
         //
         // $comment = Comment::find($comment);
         // $thread = Thread::with([
         //        'Comment' => function($query) {
         //            $query->latest()->paginate(1);
         //        }
         //        ])->find($comment);
         //
         // return view('shop.forum.detail',compact('comment'));

     }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
        $schools = School::all();
        if(\Auth::check()){
          $comment = Comment::find($comment->id);
          return view('shop.forum.edit-comment', compact('schools', "comment"));
        } else {
            // not logged in - do something
            return redirect()->route('login');
        }
    }


    public function addReplyComment(Request $request, Comment $comment)
    {
        $this->validate($request,[
            'body'=>'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        // $reply = new Comment();
        // $reply->body=$request->body;
        //
        // $reply->user_id = auth()->user()->id;
        // $comment->comments()->save($reply);



        $reply=new Comment();
        $reply->body=$request->body;
        $reply->user_id = auth()->user()->id;
         if($request->hasfile('filename'))
           {
              foreach($request->file('filename') as $image)
              {
                  $name=time(). '.' .$image->getClientOriginalName();
                  $image->move(public_path().'/images/comment/', $name);
                  $data[] = $name;
              }
              $reply->filename=json_encode($data);

              // $form->comment_id = $comment->id;
              // $form->filename=($name);

           }
           $comment->comments()->save($reply);
           $reply->save();

        // $comment->addComment($request->body);

        return back()->withMessage('Reply Created');
       }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread, Comment $comment)
    {
        //
        $this->validate($request,[
            'body'=>'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Image upload
        if($request->hasfile('filename'))
          {
             foreach($request->file('filename') as $image)
             {
                 $name=time(). '.' .$image->getClientOriginalName();
                 $image->move(public_path().'/images/comment/', $name);
                 $data[] = $name;
                 $images =  explode(',', $comment->filename);
             }

             // Image delete
               $filename = json_decode($comment->filename);
               if($filename > 0){
                 foreach ($filename as $singlefile) {
                   $image_path = public_path().'/images/comment/'.$singlefile;
                   File::delete($image_path);
                 }

               }
               // Image delete end here
             $oldFile = $comment->filename;
             $comment->filename=json_encode($data);
          // image upload ends
          }
          $comment->update($request->all());
          return back()->withMessage('updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
          $comment->delete();
          $filename = json_decode($comment->filename);
          // dd($filename);
          if($filename > 0){
            foreach ($filename as $singlefile) {
              $image_path = public_path().'/images/comment/'.$singlefile;
              // dd($image_path);
              File::delete($image_path);
            }
          }
      return back()->withMessage('Deleted');
    }
}
