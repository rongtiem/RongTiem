<?php

class UserController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		//$posts = Post::orderBy('created_at', 'DESC')->paginate();
		//return View::make('home')->with('posts', $posts);
		return $user = User::find(1)->points;
	}

	public function updatePoints()
	{
		$user = User::find(1);

		$user->points = ($user->points)+'1';

		$user->save();

		return Redirect::route('posts.index');
	}

	public function updatePoints2()
	{
		$user = User::find(1);

		$user->points = ($user->points)+'5';

		$user->save();

		return Redirect::route('posts.index');
	}

}