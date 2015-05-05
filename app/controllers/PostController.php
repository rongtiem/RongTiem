<?php
class PostController extends AdminController {
	/**
	* Display a listing of the resource.
	*
	* @return Response
	*/
	public function index()
	{
		$posts = Post::orderBy('created_at', 'DESC')->paginate();
		return View::make('home')->with('posts', $posts);
	}
	/**
	* Show the form for creating a new resource.
	*
	* @return Response
	*/
	public function create()
	{
		return View::make('hello');
	}
	/**
	* Store a newly created resource in storage.
	*
	* @return Response
	*/
	public function store()
	{
		$input = Input::all();
		$v = Validator::make($input, Post::$rules);
		if ($v->passes()) {
			$post = new Post;
			$post->title = Input::get('title');
			$post->body = Input::get('body');
			//$post->m_keyw = Input::get('m_keyw');
			//$post->m_desc = Input::get('m_desc');
			$post->slug = Str::slug(Input::get('title'));
			$post->user_id = '1';
			$post->save();
			return Redirect::route('posts.index');
		}
		return Redirect::back()->withErrors($v);
	}
	/**
	* Display the specified resource.
	*
	* @param int $id
	* @return Response
	*/
	public function show($id)
	{
		$post = Post::find($id);
		$date = $post->created_at;
		setlocale(LC_TIME, 'America/New_York');
		$date = $date->formatlocalized('%A %d %B %Y');
		return View::make('home')->with('post', $post)->with('date', $date);
	}
	
	public function updateLikes($postid)
	{
		$post = Post::find($postid);

		$post->likes = ($post->likes)+'1';

		$post->save();

		return Redirect::route('posts.index');
	}
	
	public function getJson() {         
	 	return Post::all()->toJson();     
	} 

	public function getImage($id) {         
		//$user = Photoforpost::find($id);  
		$user = Post::find($id);    
		//$users = DB::table('photoforposts')->where('post_id', '=', $id)->get();
	 if(count($user) > 0) { // ตรวจสอบว่ามีหนงัสือที่คน้หาหรือไม่             
	 	$image = $user->picture()->first();             
		 if (count($image) > 0) { // ตรวจสอบว่ามีรูปสา หรับหนงัสือหรือไม่                 
		 	$response = Response::make($image->photo, 200);                 
		 	$response->header('Content-Type', 'image/jpeg/png');                 
		 	$response->header('Content-Disposition', 'attachment; filename=' . $image->photo_name);             
		 } 
		 else{                 
		 	//$pathToFile = public_path().'\images\default-product-image.jpg';                 
		 	//$response = Response::download($pathToFile,'default-product-image.jpg', ['Content-Type'=>'image/jpeg/png']);
		 	$response = null;            
		 }             
		 return $response;         
	}       
	 return Response::json(null, 404); // คืน error ถา้ไม่พบหนงัสือ     } 
	}



}