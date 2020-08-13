<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Thread;
use App\Comment;
use App\School;
use App\User;

use App\ThreadImage;
use App\CommentImage;
use File;
use Spatie\Searchable\Search;
use Illuminate\Support\Facades\Storage;
// use App\ThreadFilters;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Symfony\Contracts\EventDispatcher\Event;
use App\Threadcategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class ThreadController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request , Threadcategory $threadcategory)
    {
        //
        if ($request->has('id')) {
          // code...
          $threads= Threadcategory::find($request->id)->threads()->orderBy('updated_at', 'desc')->paginate(1);
          
        }else {
          // code...
          $threadcategory = Threadcategory::get('id');
          
          $threads = Thread::orderBy('updated_at', 'desc')->paginate(6);
          // $tagg = Tag::find($id->id);
          // $tagss = DB::select("select thread_id from tag_thread");


        }

        $schools = School::all();
        return view('shop.forum.index', compact('threads', 'schools', 'threadcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $schools = School::all();
        $td_categories = Threadcategory::pluck('name', 'id');

        if(\Auth::check()){
            return view('shop.forum.create', compact('schools', 'td_categories'));
        } else {
            // not logged in - do something
            return redirect()->route('login');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
           'subject' => 'required|min:5',
           'thread'  => 'required|min:10',
           'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

//            'g-recaptcha-response' => 'required|captcha'
       ]);


       $thread = auth()->user()->threads()->create($request->all());

       // Delete
       if($request->hasfile('filename'))
         {
            foreach($request->file('filename') as $image)
            {
                $name=time(). '.' .$image->getClientOriginalName();
                $image->move(public_path().'/images/forum/', $name);
                $data[] = $name;
            }
            $form= new ThreadImage([
                'thread_id' => $thread->id
            ]);
            // $form->filename=($name);
            $form->filename=json_encode($data);


           $form->save();
         }
         //end delete
       //store

       //redirect
       return redirect()->route('forum.show', $thread->id)->withMessage('Thread Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
     

    public function show(Comment $comment, $id, Threadcategory $threadcategory)
    {

        $user = User::all();
        $td_category= Thread::find($id)->threadcategory;
        $thread = Thread::where('slug', $id)
                        ->orWhere('id', $id)->first();
                        
        $thread = Thread::find($id);
        $thread->increment('visit_count'); 
        $images = Thread::find($id)->thread_images();
        $commentPaginate = Thread::find($id)->comments()->paginate(1); //orderBy('updated_at', 'asc')->
        $schools = School::all();
        return view('shop.forum.detail', compact('schools','thread', 'user','commentPaginate','images', 'td_category'));
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $schools = School::all();
        $td = Threadcategory::pluck('name', 'id');
        if(\Auth::check()){
          $thread = Thread::find($id);
          return view('shop.forum.edit', compact('schools', "thread", 'td'));
        } else {
            // not logged in - do something
            return redirect()->route('login');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$thread)
    {
        //
        // validate
        $this->validate($request, [
            'subject'=> 'required|min:10',
            'thread' => 'required|min:20',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);



        //updated

        if(\Auth::check()){
          $thread=Thread::find($thread);
          // $images=Thread::find($thread)->images;

          $thread->update($request->all());

          // Image upload
          if($request->hasfile('filename'))
            {
               foreach($request->file('filename') as $image)
               {
                   $name=time(). '.' .$image->getClientOriginalName();
                   $image->move(public_path().'/images/forum/', $name);
                   $data[] = $name;
                   $images =  explode(',', $thread->thread_images);
               }

               $form= new ThreadImage([
                   'thread_id' => $thread->id
               ]);
               // $form->filename=($name);
               $form->filename=json_encode($data);
              $form->save();
            // image upload ends
            // Image delete
              foreach ($thread->thread_images as $image) {
                $image = json_decode($image->filename);

                foreach ($image as $singlefile) {
                  $image_path = public_path().'/images/forum/'.$singlefile;
                  File::delete($image_path);
                }
              }
              // Image delete end here

            }
          return redirect()->route('forum.show', $thread->id)->withMessage('Post Updated successfully');
        } else {
            // not logged in - do something
            return redirect()->route('login');
        }

        // $this->authorize('update', $thread);
        //   //validate
        //   $this->validate($request, [
        //       'subject' => 'required|min:10',
        //       'type'    => 'required',
        //       'thread'  => 'required|min:20'
        //   ]);
        //
        //
        //   $thread->update($request->all());

          return redirect()->route('forum.show', $thread->id)->withMessage('Thread Updated!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy($thread)
    {


        if(\Auth::check()){
          $s=Thread::find($thread);
          if($s->delete()){
            // Delete Image
            foreach ($s->thread_images as $image) {
              $image = json_decode($image->filename);

              foreach ($image as $singlefile) {
                $image_path = public_path().'/images/forum/'.$singlefile;
                File::delete($image_path);
              }
            }
            // delete ends here
            return redirect()->route('forum.index')->withMessage('Post Deleted successfully');
          }
          return redirect()->route('forum.show', $thread->id)->withMessage('Post Updated successfully');
        }
        else {
            // not logged in - do something
            return redirect()->route('login');
        }

        // $this->authorize('update', $thread);
        //
        // $thread->delete();
        return redirect()->route('forum.index', $thread->id)->withMessage('Post Updated successfully');


    }
    // public function search()
    // {
    //   $serach = $request=>serach_data;
    //   $thread = DB::table('threads')->where('subject'
    // }

   //  public function search(Request $request)
   // {
   //    $schools = School::all();
   //     $searchResults = (new Search())
   //         ->registerModel(Thread::class, 'subject', 'thread')
   //         ->registerModel(ThreadImage::class, 'filename')
   //         ->perform($request->input('query'));
   //
   //     return view('shop.forum.search', compact('searchResults', 'schools'));
   // }

   // public function search()
   //  {
   // //
   // //      $query=request('query');
   // //
   // //
   // //      $threads = Thread::search($query)->paginate(20);
   // //      dd($threads);
   // //      $schools = School::all();
   // //      // dd($threads);
   // //
   // //      return view('shop.forum.index', compact('threads', 'schools'));
   // //
   // //
   //
   //
   //
   //      }

}
