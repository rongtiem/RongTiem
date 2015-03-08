<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	/*$posts = Post::orderBy('created_at', 'DESC')->paginate();
	return View::make('home')->with('posts', $posts);*/
	return View::make('home');
});

//Route::resource('posts', "PostController"); /*posts is url link to PostController*/

Route::get("posts", function(){
	return Post::orderBy('id', 'DESC')->get();
});

Route::post("posts", function(){
	return Post::create(Input::all());
});

Route::get("file", function(){
	return View::make('file.upload');
});

Route::post("file", function(){
	if (Input::hasFile('file')){
		$dest = 'images/';
		$name = str_random(6).'_'.Input::file('file')->getClientOriginalName();
		Input::file('file')->move($dest,$name);
	}
});

Route::get("points", function(){
	return $user = User::find(1)->points;
});
Route::post("points", 'UserController@updatePoints');
Route::post("points2", 'UserController@updatePoints2');

Route::get("postId/{idIn?}", function(){
	return $id = Post::where('id', 'idIn')->get();
});
Route::get("comments", function(){
	return Comment::all();
});
Route::post("comments", function(){
	return Comment::create(Input::all());
});


