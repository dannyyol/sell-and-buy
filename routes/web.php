<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Product;
use App\Category;
use App\School;
use App\Thread;
use App\Http\Controllers\ProductController;
// Route::get('/', function () {
//     return view('welcome');
// });
Route::resource('/', 'IndexController');
Route::get('lists/', 'IndexController@lists')->name('product.lists');
 //Route::get('product/{id}', 'IndexController@detail')->name('detail');
//Route::get('/search', 'IndexController@search')->name('search');
Route::resource('products', 'ProductController',['only'=>['create','store', 'update']]);
Route::any('products/{slug}', 'ProductController@show')->name('products.show');

// route('products.show', ['id' => $products->id, 'slug' => $products->slug]);

Route::any('/search',function(){
    $q = Input::get('q');
    $schools = School::where('name', Input::get('school_name'))->get();
    foreach($schools as $school){
      $id = $school->id;
    }
    
    if($q != ''){
      $data = Product::where('school_id','=', $id)->where('name','LIKE','%'.$q.'%')
      ->orWhere('price','LIKE','%'.$q.'%')
      ->paginate('2')
      ->setpath('');
      $data->appends(array(
        'q'=>Input::get('q'),
      ));
      if(count($data) > 0){
        return view('search', ['msg'=>'Results: '. $q])->withData($data);
      }
      return view ('search')->withMessage('No details found. Try to search again !');
    }else{
      return redirect()->back();
    }
    
    
});

Route::any('forum/search',function(){
    $q = Input::get('q');
    if($q != ''){
      $data = Thread::where('subject','LIKE','%'.$q.'%')
      ->orWhere('thread','LIKE','%'.$q.'%')
      ->paginate('1')
      ->setpath('');
      $data->appends(array(
        'q'=>Input::get('q'),
      ));
      if(count($data) > 0){
        return view('shop.forum.search', ['msg'=>'Results: '. $q])->withData($data);
      }
      return view ('shop.forum.search')->withMessage('No details found. Try to search again !');
    }
});

// Route::any('/search',function(){
//     $q = Input::get( 'page' );
//     $product = Product::where('name','LIKE','%'.$q.'%')->orWhere('price','LIKE','%'.$q.'%')->paginate('2');
//     if(count($product) > 0)
//         return view('search')->withDetails($product)->withQuery ($q);
//     else return view ('search')->withMessage('No Details found. Try to search again !');
// });

// Route::any('/search',function(){
//     $search = Input::get ('search');
//     $product = Product::where('name','LIKE','%'.$search.'%')->orWhere('price','LIKE','%'.$search.'%')->with('category')->orWhereHas('category', function($q) use($search){
//       $q->where('name','LIKE','%'.$search.'%');
//     })->get();
//     if(count($product) > 0)
//             return view('search')->withDetails($product)->withQuery ($search);
//         else return view ('search')->withMessage('No Details found. Try to search again !');
// });
// search routes
// Route::get('laravel-search-in-multiple-model', 'SearchController@index')->name('search.index');
// Route::get('search', 'SearchController@search')->name('search.result');
//post
// Route::get('/{any}', function () {
//   return view('post');
// })->where('any', '.*');
//ends Here


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('category', 'IndexController');
Route::get('/school/{slug}/', 'SchoolController@show_frontend')->name('school.show_frontend');

Route::group(['prefix'=>'admin', 'middleware'=>['admin']], function(){
  Route::get('/', function(){
    return view('admin.index');
  })->name('admin.index');


  Route::resource('categories', 'CategoryController');
  Route::resource('schools', 'SchoolController');
  Route::resource('thread', 'ThreadCategoryController');


});

Route::group(['middleware', 'auth'], function(){
  Route::resource('product', 'ProductController');
  Route::post('/user/profile/{user}', 'UserProfileController@update')->name('profile.update');
  Route::resource('user/profile', 'UserProfileController',['only'=>['create','store']]);
  Route::get('user/profile/{user}/edit', 'UserProfileController@edit')->name('profile.edit');
  // Route::get('forum2/search','ThreadController@search')->name('forum2.search');
  Route::get('/user/profile/{user}', 'UserProfileController@index')->name('user_profile');
  Route::post('comment/like','LikeController@toggleLike')->name('toggleLike');
  // Route::post('comment/like/reply','LikeController@toggleLikeReply')->name('toggleLikeReply');
  Route::post('thread/like','LikeController@threadtoggleLike')->name('threadtoggleLike');

  Route::get('logout/', 'Auth\LoginController@logout');// logout route

  Route::post('messages', 'EmailController@postMessage');
  Route::resource('/forum', 'ThreadController');

  Route::resource('comment','CommentController',['only'=>['create','edit','update','destroy']]);

  Route::post('comment/create/{thread}','CommentController@addThreadComment')->name('threadcomment.store');
  Route::post('reply/create/{comment}','CommentController@addReplyComment')->name('replycomment.store');



});
Route::get('/markAsRead',function(){
    auth()->user()->unreadNotifications->markAsRead();
});
