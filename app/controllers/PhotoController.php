<?php

class PhotoController extends BaseController {
	public $restful = true;

	public function upload(){
		$input = Input::all();

		if(isset($input['description'])){
			$input['description']	=	filter_var($input['description'],FILTER_FLAG_NO_ENCODE_QUOTES);
		}

		$rules	= array(
			'file'	=>	'required|image|max:500',
			'description'	=> 'required'
		);

		$v = Validator::make($input,$rules);

		if($v->fails()){
			return Redirect::to('/')->with_errors($v);
		}

		$extension = File::extension($input['file']['name']);
		$directory = public_path().'uploads/'.sha1(Auth::user()->id);
		$filename = sha1(Auth::user()->id.time()).".{$extension}";
		//$image 		= Input::file('file');                         
        //$filename 	= $image->getClientOriginalName();

		$upload_success = Input::upload('file',$directory,$filename);

		if($upload_success){
			$photo = new Photoforpost(array(
				'location' => URL::to('uploads/'.sha1(Auth::user()->id).'/'.$filename),
				'description' => $input['description']
				));
			Auth::posts()->photos()->insert($photo);
			Session::flash('status_succes','You have successfully uploaded your new pic!');
		}else{
			Session::flash('status_error','An error!');
		}

		return Redirect::to('home');
	}
}