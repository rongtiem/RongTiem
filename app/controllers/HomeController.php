<?php

class HomeController extends BaseController {

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

	public function showHome()
	{
		$name = null;
		return View::make('home');
			//->with('photos',$photos);
	}

	public function doLogin()
	{
		
		// validate the info, create rules for the inputs 
		$rules = array(
    		'email'    => 'required|email', // make sure the email is an actual email
    		'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
    	);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('/')
        		->withErrors($validator) // send back all errors to the login form
        		->withInput(Input::except('password2')); // send back the input (not the password) so that we can repopulate the form
    	} 
    	else {
	    	$auth = Auth::attempt(array(
	    		'email'     => Input::get('email2'),
	    		'password'  => Input::get('password2')
	    	));

	    	if($auth) {
	    		//redirect to the intended page
	    		return Redirect::intended('home')->with('global','Thxxx');;
	    	}
	    	// create our user data for the authentication
	    	$userdata = array(
	    		'email'     => Input::get('email2'),
	    		'password'  => Input::get('password2')
	    	);
	    	$email = Input::get('email2');
	    	$password = Input::get('password2');
	    	// attempt to do the login
	    	if (User::find($userdata)) {

		        // validation successful!
		        // redirect them to the secure section or whatever
		        // return Redirect::to('secure');
		        // for now we'll just echo success (even though echoing in a controller is bad)
	    		//$user = User::find(1);
	    		$id = User::where('email', '=', $email)->get();
	    		return Redirect::to('home')->with('global',$id);
	    	} 
	    	/*if (Auth::attempt(array('email' => $email, 'password' => $password)))
	    	{
	    		return Redirect::intended('home');
	    	}*/
	    	else {        
	        // validation not successful, send back to form 
	    		return Redirect::to('/');
	    	}
		}
		return Redirect::to('/');
	}
	public function doLogout()
	{
	    Auth::logout(); // log the user out of our application
	    return Redirect::to('/'); // redirect the user to the login screen
	}


}
