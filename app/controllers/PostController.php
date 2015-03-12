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
	/**
	* Show the form for editing the specified resource.
	*
	* @param int $id
	* @return Response
	*/
	public function edit($id)
	{
		$post = Post::find($id);
		if(is_null($post))
		{
			return Redirect::route('posts.index');
		}
		return View::make('posts.edit')->with('post', $post);
	}
	/**
	* Update the specified resource in storage.
	*
	* @param int $id
	* @return Response
	*/
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$v = Validator::make($input, Post::$rules);
		if($v->passes())
		{
			Post::find($id)->update($input);
			return Redirect::route('posts.index');
		}
		return Redirect::back()->withErrors($v);
	}
	/**
	* Remove the specified resource from storage.
	*
	* @param int $id
	* @return Response
	*/
	public function destroy($id)
	{
		Post::find($id)->delete();
		return Redirect::route('posts.index');
	}
	public function getJson() {         
		return Post::all()->toJson();     
	} 

	public function getImage($id) {         
		$post = Post::find($id);         
	    if(count($post) > 0) { // ตรวจสอบว่ามีหนงัสือที่คน้หาหรือไม่             
	    	$image = $post->image()->first();             
	    if (count($image) > 0) { // ตรวจสอบว่ามีรูปสา หรับหนงัสือหรือไม่                 
	    	$response = Response::make($image->image, 200);                 
	    	$response->header('Content-Type', 'image/jpeg');                 
	    	$response->header('Content-Disposition', 'attachment; filename=' . $image->imageName);             
	    } 
	    else {                 
	    	$pathToFile = public_path().'\images\picture.png';                 
	    	$response = Response::download($pathToFile, 'defaultImg.jpg', ['Content-Type'=>'image/jpeg']);             
	    }             
	    	return $response;         
		}         
	    return Response::json(null, 404); // คืน error ถา้ไม่พบหนงัสือ     
	}
}