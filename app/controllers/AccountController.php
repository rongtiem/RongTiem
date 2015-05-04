<?php

class AccountController extends BaseController {
	public function postLogin (){
		$rules = array(
				'email2'		=> 	'required|email',
				'password2'		=>	'required',
				
		);
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			//Redirect to sing in again
			return Redirect::to('/')
				//->withErrors($validator)
				->withInput();
		}
		else{
			$auth = Auth::attempt(array(
				'email'		=>	Input::get('email2'),
				'password' 	=> 	Input::get('password2'),
				'active'	=>	1
			));
			//$email = Input::get('email2');
			if($auth){
				//$userid = Auth::user()->id;
				//Redirect to the intended page
				return Redirect::intended('home');
					      //->with('userid', $userid);
			}
			else{
				return Redirect::to('/')
					->with('global','Email/Password ไม่ถูกต้้อง');
			}

		}
		return Redirect::route('account-activate')
					->with('global','รอการติดต่อจากผู้ดูแล');


	}
	public function getCreate(){

	}
	public function postCreate(){
		
		$rules = array(
				'FirstName'		=>	'required|max:30|min:3',
				'LastName'		=>	'required|max:30|min:3',
				'email'			=> 	'required|max:50|email|unique:users',
				'role'			=>	'required',
				'password'		=>	'required|min:4',
				'password_again'=>	'required|same:password'
				
		);
		$messages = array(
			'FirstName.required' 	=> 'กรุณาใส่ชื่อจริงเป็นชื่อผู้ใช้งาน',
			'LastName.required' 	=> 'กรุณาใส่นามสกุลจริงเป็นชื่อผู้ใช้งาน',
			'email.required' 		=> 'กรุณาใส่อีเมล์',
			'email.email' 			=> 'กรุณาใส่อีเมล์ให้ถูกต้องตามรูปแบบ เช่น awesome@awesome.com',
			'email.unique' 			=> 'อีเมล์ถูกลงชื่อเข้าใช้ระบบแล้ว',
			'password.required' 	=> 'กรุณาใส่รหัสผ่าน',
			'password_again.required' 	=> 'กรุณาใส่รหัสผ่านซ้ำอีกรอบ',
			'password_again.same' 		=> 'รหัสผ่านไม่ตรงกัน',
		);

		$validator = Validator::make(Input::all(),$rules, $messages);
		if($validator->fails()){
			return Redirect::to('/')
				->withErrors($validator)
				->withInput();
		}
		else{
			//create account
			$FirstName			=	Input::get('FirstName');
			$LastName			=	Input::get('LastName');
			$email				=	Input::get('email');
			$role 				= 	Input::get('role');
			$password 			=	Input::get('password');
			

			$user = User::create(array(
				'FirstName'		=>	$FirstName,
				'LastName'		=>	$LastName,
				'email'			=> 	$email,
				'role'			=>	$role,
				'points'		=>	0,
				'password'		=>	Hash::make($password),
				'active'		=>	0
			));

			if($user){
				//send email
				Mail::send('emails.auth.test', array('FirstName' => $FirstName),function($message) use ($user){
					$message->to($user->email, $user->FirstName)->subject('ยินดีต้อนรับสู่ โรงเตี๊ยม cs @ tu');
				} );
				return Redirect::route('account-activate')
					->with('global','รอการติดต่อจากผู้ดูแล');
			}
		}
	}

	public function getActivateUser(){
		return View::make('userApply');
	}

	public function getActivateAdmin(){
		$user = User::where('code','=',$code)->where('active','=',0);

		if($user->count()){
			$user = $user->first();
			//Update user to active state
			$user->active 	= 1;

		}
	}

}