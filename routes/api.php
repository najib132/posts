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

Route::get('/posts/{limit?}','Api\PostController@getAllPosts') ;
Route::get('/posts/show/{slug}','Api\PostController@getPost') ; 

Route::get('/sliders/{limit?}','Api\SlideController@getAllSliders') ;

Route::get('/services/{limit?}','Api\ServicesController@getAllServices') ;
Route::get('/services/{slug}','Api\ServicesController@getService') ;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
