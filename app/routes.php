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
*//*
	|	CSRF protection group
	*/
Route::group(array('before' => 'guest'),function() {

	/*
	|	Create account (POST)
	*/
	Route::group(array('before'=>'csrf'),function(){
		Route::post('/', array(
			'as' => 'account-create-post',
			'uses' => 'AccountController@postCreate'
		));
		Route::post('/login', array(
			'as' => 'account-login',
			'uses' => 'AccountController@postLogin'
		));

	});
	/*
	|	Create account (GET)
	*/
	Route::get('/userApply', array(
		'as' => 'account-activate',
		'uses' => 'AccountController@getActivateUser'
	));

	Route::get('/userApply/{code}', array(
		'as' => 'account-activate-mail',
		'uses' => 'AccountController@getActivate'
	));


});

Route::group(array('before' => 'auth'), function()
{
	

});

Route::get('/', function(){
	return View::make('welcome');
});


Route::get('home', array(
		'as' => 'home',
		'uses' => 'HomeController@showHome'
));
//Route::post('/', array('uses' => 'HomeController@doLogin'));
Route::get('logout', array('uses' => 'HomeController@doLogout'));

//Route::resource('posts', "PostController"); /*posts is url link to PostController*/

Route::get('posts', function(){
	return Post::orderBy('id', 'DESC')->get();
});

Route::post('posts', function(){
	return Post::create(Input::all());
});

Route::get('file', function(){
	return View::make('file.upload');
});

//Route::post('file', function(){/*str_random(6).'_'.*/
	/*if (Input::hasFile('file')){
		$dest = 'uploads/';
		$name = Input::file('file')->getClientOriginalName();
		Input::file('file')->move($dest,$name);
		echo "yeeeeeeee";
	//}*/
	 //$input = Input::all(); 
	 /*$rules = array(             
	 	//'bIsbn'      => 'required',             
	 	'image'  => 'required|image|mimes:jpeg,jpg,bmp,png,gif'         
	 	);  
        $validation = Validator::make($input, $rules);  */
       /* if (1) {             
        	$image 		= Input::file('file');             
        	$data 		= File::get($image->getRealPath());             
        	$filename 	= $image->getClientOriginalName();  
            if ($image) {                 
            	$bImage = new Photoforpost();                 
            	//$bImage->bisbn = Input::get('bIsbn');                 
            	$bImage->photo 			= $data;                 
            	$bImage->photo_name 	= $filename;                 
            	$bImage->save();             
            }             
            return Redirect::to(URL::to('home'))                 
            	->with('success', 'Your image is uploaded successfully!');         
        } else {             
            // Image cannot be uploaded             
            return Redirect::back()->withInput()                 
            	->with('error', 'Sorry, the image could not be uploaded.');         
        } 
});*/
Route::post('file', array('uses' => 'PhotoController@upload'));
Route::post('fileAttach', array('uses' => 'PhotoController@uploadFile'));

Route::get('points/{$id}', function(){
	return $user = User::find($id)->points;
});
Route::post('points', 'UserController@updatePoints');//like points
Route::post('points2', 'UserController@updatePoints2');//5 point
Route::put('likes/{postid}', ['uses' =>'PostController@updateLikes']);//add like in table post
Route::put('likesDelete/{postid}', ['uses' =>'PostController@updateLikesDelete']);//add like in table post
Route::get('likesDup/{$id}', function(){
	return $posts_id = Like::where('user_id','=',$id)->posts_id;
});

Route::get('id', function(){
	return $id = Auth::user()->id;
});
Route::get('FirstName', function(){
	return $FirstName = Auth::user()->FirstName;
});
Route::get('LastName', function(){
	return $LastName = Auth::user()->LastName;
});
Route::get('session',function(){
	return Session::put('laravel','Thai');
});
Route::get('session2',function(){
	return Session::get('laravel');
});

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

Route::get('img/{id}/image', 'UserController@getImage'); // คืนรูปภาพ 
Route::post('img', function(){
	return Photo::create(Input::all());
});

//Route::get('post/json','PostController@getJson'); // คืน JSON ขอ้มูลหนงัสือ 

Route::get('posts/{id}/image', 'PostController@getImage'); // คืนรูปภาพ 

Route::get('/{id}', 'UserController@getPeople');

//search
Route::group(array('prefix'=>'api'), function()
{
    Route::resource('airplanes', 'SearchController', array('only' => 'show'));
});




