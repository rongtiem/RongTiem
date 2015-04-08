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
	return View::make('welcome');
});
Route::post('/', array('uses' => 'HomeController@doLogin'));
Route::get('logout', array('uses' => 'HomeController@doLogout'));

Route::get('home', function()
{
	return View::make('home');
});

//Route::resource('posts', "PostController"); /*posts is url link to PostController*/

Route::get('posts', function(){
	return Post::orderBy('id', 'DESC')->get();
});

Route::post('posts', function(){
	return Post::create(Input::all());
});

Route::put('likes/{postid}', ['uses' =>'PostController@updateLikes']);//add like in table post

Route::get('file', function(){
	return View::make('file.upload');
});

Route::post('file', function(){/*str_random(6).'_'.*/
	//if (Input::hasFile('file')){
		$dest = 'uploads/';
		$name = Input::file('file')->getClientOriginalName();
		Input::file('file')->move($dest,$name);
		echo "yeeeeeeee";
	//}
});

Route::get('points', function(){
	return $user = User::find(1)->points;
});
Route::post('points', 'UserController@updatePoints');//like points
Route::post('points2/{userid}', 'UserController@updatePoints2');//5 point

/*Route::get('postId/{idIn?}', function(){
	return $id = Post::where('id', 'idIn')->get();
});*/
Route::get('comments', function(){
	return Comment::all();
});
Route::post('comments', function(){
	return Comment::create(Input::all());
});
Route::get('subject', function()
{
	return View::make('subjectPage');
});

Route::get('/subject/years', function()
{
	return View::make('subjectPageYears');
});

Route::post('img', function(){
	return Photo::create(Input::all());
});

//Route::get('post/json','PostController@getJson'); // คืน JSON ขอ้มูลหนงัสือ 
Route::get('img/{id}/image', 'UserController@getImage'); // คืนรูปภาพ 


