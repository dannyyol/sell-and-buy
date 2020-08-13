<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;
class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }
    public function postMessage(Request $request){
      // $fullname = 'alex';
      // $email = 'daniel.borngreat@gmail.com';
      // $data = [];
      // $data['email'] = $email;
      // $data['fullname'] = $fullname;
      // return view('shop.index')->withData($data);
      $this->validate($request, [
        'email'=> 'required|email',
        'message' => 'min:10'
      ]);
      $data = array(
        'email' => $request->email,
        'bodyMessage' => $request->bodyMessage
       );
      Mail::send('shop.emails.messages', $data, function($message) use ($data){
        $message->from($data['email']);
        $message->to('daniel-3d0c01@inbox.mailtrap.io');
      });
      session::flash('success', 'Your message has been sent!');
      return back();//->url('/') index url


    }

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
