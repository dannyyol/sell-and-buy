<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\School;
use Carbon\Carbon;
use App\User;
use App\UserProfile;
use App\ProductImage;
use File;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Displaying all our products in admin/product/index
      $products = Product::all();
      return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::pluck('name', 'id');
        $users = Product::pluck('user_id', 'id');
        $school = School::pluck('name', 'id');
        $schools = School::all();
        return view('shop.product.create', compact('categories', 'schools', 'users', 'school'));
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
          //  'size' => 'required',
           'price' => 'required|numeric',
           'status' => 'required',
           'school_id' => 'required|numeric',
           'category_id' => 'required|numeric',
           'filename.*' => 'image|mimes:png,jpg,jpeg|max:10000'
      ]);

      // Image upload
      if(Auth::check() && Auth::user()){
        $request['slug'] = Str::slug($request->name);
        $products = auth()->user()->products()->create($request->all());
      // Delete
      $formInput = $request->except('filename');

      if($request->hasfile('filename'))
        {
           foreach($request->file('filename') as $image)
           {
               $name=time(). '.' .$image->getClientOriginalName();
               $image->move(public_path().'/images/product/', $name);
               $data[] = $name;
           }
           $products->filename = json_encode($data);
           $products->save();
        }

      return redirect()->route('product.lists')->withMessage('Advert created successfully');
    }
  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

    public function show($slug, User $user, Category $category)
    {
      $schools = School::all();
      $products = Product::where('id', $slug)
                        ->orWhere('slug', $slug)->first();
      $categories = Product::where('id', $slug)
      ->orWhere('slug', $slug)->first()->category;
      $rel_products = $categories->products;
      // dd($product);
      // dd($categories);
      return view('shop.product.detail', compact('schools', 'products', 'categories', 'rel_products'));
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
      $categories = Category::pluck('name', 'id');
      $school = School::pluck('name', 'id');
      $schools = School::all();
      $products = Product::find($id);
      return view('shop.product.edit', compact('categories', 'products', 'schools', 'school'));
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
      $this->validate($request, [
        'name' => 'required',
         'size' => 'required',
         'price' => 'required|numeric',
         'school_id' => 'required|numeric',
         'category_id' => 'required|numeric',
         // 'image' => 'image|mimes:png,jpg,jpeg|max:10000'
         'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    if(Auth::check() && Auth::user()){
          $product=Product::find($id);
          $products = $product->product_images;
          // Image upload
          if($request->hasfile('filename'))
            {
               foreach($request->file('filename') as $image)
               {
                   $name=time(). '.' .$image->getClientOriginalName();
                   $image->move(public_path().'/images/product/', $name);
                   // dd($data);
                   $images =  explode(',',  $product->filename);
                   $data[] = $name;
                   $imageExplode =  explode(',', $product->filename);
               }
               // Image delete
                 $filename = json_decode($product->filename);
                 if($filename > 0){
                   foreach ($filename as $singlefile) {
                     $image_path = public_path().'/images/product/'.$singlefile;
                     File::delete($image_path);
                   }
                 }
              // }
              // Image delete end here
              $oldPhoto = $product->filename;
              $product->filename = json_encode($data);
            }
            $product->update($request->all());
            return redirect()->route('product.lists')->withMessage('Advert updated successfully');;
      }
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
        $product=Product::find($id);
        if($product->delete()){
          // Delete Image

            $filename = json_decode($product->filename);
            if($filename > 0){
              foreach ($filename as $singlefile) {
                $image_path = public_path().'/images/product/'.$singlefile;
                File::delete($image_path);
              }
            }
            return redirect()->route('product.lists')->withMessage('Advert deleted successfully');
        }
    }


}
