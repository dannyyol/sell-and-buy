<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Thread;
use App\User;
use App\School;
use App\Product;
use App\UserProfile;
use File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user, UserProfile $userprofile)
    {
        //
        $this->validate($request, [
           'firstname' => 'required',
           'lastname' => 'required',
           // 'mobile' => 'required|min:10',
           // level' => 'required|numeric',
           // 'birthday' => 'required',

           //
            'photo' => 'image|mimes:png,jpg,jpeg|max:10000'
      ]);

      // Image upload
      $userprofiles = DB::select("select user_id from user_profiles where user_id='$user->id'");



        // $formInput = $request->except('photo');
        // $photo=$request->photo;
        // if($photo){
        //   $imageName = time(). '.' .$photo->getClientOriginalName();
        //   $photo->move('images/profile', $imageName);
        //   $formInput['photo']=$imageName;
        //
        // }
        // $userprofile = auth()->user()->userprofile()->create($formInput);
        // Product::create($formInput)



        $form= new UserProfile();
        $form->firstname=$request->get('firstname');
        $form->lastname=$request->get('lastname');
        $form->birthday=$request->get('birthday');
        $form->school=$request->get('school');
        $form->level=$request->get('level');
        $form->mobile=$request->get('mobile');
        if($request->get('option')){
          $checkbox = implode(",", $request->get('option'));
          $form->gender = $checkbox;
        }
        $form->user_id=auth()->user()->id;
        $photo=$request->photo;
        if($request->hasfile('photo'))
          {

            $name=time(). '.' .$photo->getClientOriginalName();
            $photo->move('images/profile', $name);

            $form->photo= $name;

          }
        $form->save();
        return back()->with('message',' Profile Saved!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request, User $user, UserProfile $userprofile)
     {
       // $userprofiles = DB::select("select user_id from user_profiles where user_id='$user->id'");

        // $userprofile = DB::select("select user_id from user_profiles where user_id='$user->id'");


        $userprofile=User::find($user->id)->userprofile;


        if ($userprofile) {

          $thread=Thread::where('user_id',$user->id)->count();
          $threads=Thread::where('user_id',$user->id)->latest()->get();
          $schools = School::all();
          $comments=Comment::where('user_id',$user->id)->where('commentable_type','App\Thread')->get();
          $feeds = $user->feeds;

          $products = Product::where('user_id',$user->id)->count();
          $product = Product::where('user_id',$user->id)->latest()->get();
          $userprofile = User::find($user->id)->userprofile();
          return view('shop.profile.edit',compact('thread','comments','user','products','threads','product','feeds', 'schools','userprofile'));

    }elseif (!$userprofile==$user) {
      // code...

      // code...
        $thread=Thread::where('user_id',$user->id)->count();
        $threads=Thread::where('user_id',$user->id)->latest()->get();
        $schools = School::all();
        $comments=Comment::where('user_id',$user->id)->where('commentable_type','App\Thread')->get();
        $feeds = $user->feeds;



        $products = Product::where('user_id',$user->id)->count();
        $product = Product::where('user_id',$user->id)->latest()->get();
        return view('shop.profile.index',compact('thread','comments','user','products','threads','product','feeds', 'schools'));

      }
      // else{
      //   $thread=Thread::where('user_id',$user->id)->count();
      //   $threads=Thread::where('user_id',$user->id)->latest()->get();
      //   $schools = School::all();
      //   $comments=Comment::where('user_id',$user->id)->where('commentable_type','App\Thread')->get();
      //   $feeds = $user->feeds;
      //
      //   $products = Product::where('user_id',$user->id)->count();
      //   $product = Product::where('user_id',$user->id)->latest()->get();
      //   $userprofile = User::find($user->id)->userprofile();
      //   return view('shop.profile.index',compact('thread','comments','user','products','threads','product','feeds', 'schools','userprofile'));
      // }
     }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(UserProfile $userprofile, User $user)
    {
        //
        if($user->name==auth()->user()->name){
          $thread=Thread::where('user_id',$user->id)->count();
          $threads=Thread::where('user_id',$user->id)->latest()->get();
          $schools = School::all();
          $comments=Comment::where('user_id',$user->id)->where('commentable_type','App\Thread')->get();
          $feeds = $user->feeds;



          $products = Product::where('user_id',$user->id)->count();
          $product = Product::where('user_id',$user->id)->latest()->get();
          return view('shop.profile.create',compact('thread','comments','user','products','threads','product','feeds', 'schools'));
        }else{
          return back();
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserProfile $userprofile, User $user)
    {
        //

        $this->validate($request, [
           'firstname' => 'required',
           'lastname' => 'required',
            // 'mobile' => 'required|min:10',
           // 'level' => 'required|numeric',
           // 'birthday' => 'required',
           // 'gender' => 'required',
           //
            'photo' => 'image|mimes:png,jpg,jpeg|max:10000'
      ]);



      $form=User::find($user->id)->userprofile;
      $form->firstname=$request->get('firstname');
      $form->lastname=$request->get('lastname');
      $form->birthday=$request->get('birthday');
      $form->school=$request->get('school');
      $form->level=$request->get('level');
      $form->mobile=$request->get('mobile');
      if($request->get('option')){
        $checkbox = implode(",", $request->get('option'));
        $form->gender = $checkbox;
      }
      $form->user_id=auth()->user()->id;
      $photo=$request->photo;
      if($request->hasfile('photo'))
        {

          $name=time(). '.' .$photo->getClientOriginalName();
          $photo->move('images/profile', $name);
          $form->photo= $name;
          $oldPhoto = $form->photo;
          $form->photo = $name;
          File::delete($oldPhoto);
        }
      $form->save();

       return back()->with('message',' Profile Saved!');


      // $formInput = $request->except('photo');
      // $photo=$request->photo;
      // if($photo){
      //   $imageName = time(). '.' .$photo->getClientOriginalName();
      //   $photo->move('images/profile', $imageName);
      //   $formInput['photo']=$imageName;
      //   $oldPhoto = $userprofile->photo;
      //   $userprofile->photo = $imageName;
      //   File::delete($oldPhoto);
      //
      // }
      // $userprofile->firstname = $request->firstname;
      // $userprofile->lastname = $request->lastname;
      // $userprofile->birthday = $request->birthday;
      // $userprofile->level = $request->gender;
      // $userprofile->mobile = $request->mobile;
      // $userprofile->gender = $request->gender;
      // $userprofile->school = $request->school;


      // $userprofile->student_roll = $request->student_roll;
      // $userprofile->student_address = $request->student_address;
      if($userprofile->save()){
        $thread=Thread::where('user_id',$user->id)->count();
        $threads=Thread::where('user_id',$user->id)->latest()->get();
        $schools = School::all();
        $comments=Comment::where('user_id',$user->id)->where('commentable_type','App\Thread')->get();
        $feeds = $user->feeds;
        $products = Product::where('user_id',$user->id)->count();
        $product = Product::where('user_id',$user->id)->latest()->get();
        return view('shop.profile.edit',compact('thread','comments','user','products','threads','product','feeds', 'schools'))->with('message',' Profile Updated!');
      }



      // Product::create($formInput)

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
