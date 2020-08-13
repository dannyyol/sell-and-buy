<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;
use App\School;
use App\User;

use Illuminate\Support\Facades\Input;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      $products = Product::paginate(10);
      $categories = Category::all();
      // $td_categories = Category::withCount('products')->get();
      // $td_categories = DB::select('select * from products where active = ?', [1])

        //  dd($td_categories);
    //   $categoryCount = Product::get('category_id', $id->id)->count();
      
      
    //   $thread = $categoryCount->categories;
    //   dd($thread);
      $schools = School::all();
      return view('shop.index', compact('products', 'categories','schools'));
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
        $products = Category::find($id)->products()->paginate(1);
        $schools = School::all();
        $categories = Category::all();
        $category = DB::select("select name from categories where id = $id");
        $user = User::find($id);
        return view('shop.category.category_products', compact(['categories', 'products', 'schools', 'category', 'user']));
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

    public function lists(Request $request)
   {
     # code...->orderBy('price','desc')->get()
     
     
    //     $products = Product::select("SELECT * from products orderby price ASC");
    //     $schools = School::all();
    //  }else{
        $products = Product::orderBy('updated_at', 'desc')->paginate(5);
        $schools = School::all();
     
     
     // $produc = School::find($id)->products;
    //  $min_max = Product::where('price')->min()->first();
     return view('shop.product.lists', compact(['products', 'schools']));
   }
   public function detail($id)
   {
     $schools = School::all();
     $products = Product::find($id);
     return view('shop.detail', compact('schools', 'products'));
   }
   // public function search()
   // {
   //   # code...
   //   $search = Input::get( 'q' );
   //   if($search==""){
   //     return back();
   //   }
   //   else{
   //     $schools = School::all();
   //     $products = DB::table('products')->where('name','LIKE','%'.$search.'%')->paginate(1);
   //     return view('search', ['msg'=>'Results: '. $search], compact('products', 'schools'));
   //   }
   //
   // }

//    public function search(Request $request)
// {
//     $page = $request->get('page', 1);
//     $products = Product::paginate(12, intval($page));
//     return view('search')
//         ->with('products', $products)
//         ->with('name',);
// }
// public function search(Request $request)
//  {
//     $q = $request->get('page');
//     $product = Product::where('name','LIKE','%'.$q.'%')->orWhere('price','LIKE','%'.$q.'%')->paginate('2');
//
//         return view('search')->withDetails('products', $product)->withQuery($q);
// }
}
