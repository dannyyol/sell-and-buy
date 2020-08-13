<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\School;
use App\Category;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\DB;


class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $schools = School::all();
        return view('admin.school.index', compact('schools'));
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
        $this->validate($request, [
           'name' => 'required',
        ]);

      School::create($request->all());
      return back();
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
        $products = School::find($id)->products;
        $schools= School::all();
        return view('admin.school.index', compact(['products','schools']));
    }

    public function show_frontend($slug, School $school)
    {
        

        $schools = School::where('slug', $slug)->orWhere('id', $slug)->first();
        $school = School::find($slug);
       
        $products = $schools->products()->paginate(2);
        $schools= School::all();
        // $school = School::find();
        return view('shop.school.school-products', compact(['products','schools', 'school']));
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
        $school = School::find($id);
        return view('admin.school.edit',compact('school'));
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
        $this->validate($request, [
            'name' => 'required',
         ]);
        $school = School::find($id);
        $school->update($request->all());
        return redirect()->route('schools.index');
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
        $school = School::find($id);
        $school->delete();
        return redirect()->route('schools.index');
    }
}
