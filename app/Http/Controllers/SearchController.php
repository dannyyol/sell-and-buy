<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;

class SearchController extends Controller
{
    //
    public function search()
    {

        $query=request('query');

        $threads = Thread::search($query)->with('tags')->get();

        return view('shop.forum.index', compact('threads', 'query'));




    }

}
