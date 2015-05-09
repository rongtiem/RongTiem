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
		$id = Auth::user()->id;
		$user = User::find($id);

		$user->points = ($user->points)+'1';

		$user->save();

		return Redirect::view('home');
	}

	public function updatePoints2()
	{
		$id = Auth::user()->id;
		$user = User::find($id);

		$user->points = ($user->points)+'5';

		$user->save();

		return Redirect::route('posts.index');
	}

	public function getImage($id) {         
		$user = User::find($id);         
	 if(count($user) > 0) { // ตรวจสอบว่ามีหนงัสือที่คน้หาหรือไม่             
	 	$image = $user->image()->first();             
		 if (count($image) > 0) { // ตรวจสอบว่ามีรูปสา หรับหนงัสือหรือไม่                 
		 	$response = Response::make($image->image, 200);                 
		 	$response->header('Content-Type', 'image/jpeg/png');                 
		 	$response->header('Content-Disposition', 'attachment; filename=' . $image->imageName);             
		 } 
		 else{                 
		 	$pathToFile = public_path().'\images\picture.png';                 
		 	$response = Response::download($pathToFile, 'picture.png', ['Content-Type'=>'image/jpeg/png']);             
		 }             
		 return $response;         
		}         
	 return Response::json(null, 404); // คืน error ถา้ไม่พบหนงัสือ     } 
	}

	public function getPeople($id) {
          return View::make('People.layout');
	}

}