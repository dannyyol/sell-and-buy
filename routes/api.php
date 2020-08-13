<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//post app start Here
// Route::post('/posts/post/create', 'PostController@store');
// Route::get('/posts/post/edit/{id}', 'PostController@edit');
// Route::post('/posts/post/update/{id}', 'PostController@update');
// Route::delete('/posts/post/delete/{id}', 'PostController@delete');
// Route::get('/posts/posts', 'PostController@index');
//ends here
