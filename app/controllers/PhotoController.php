<?php

class PhotoController extends BaseController {
	public $restful = true;

	public function upload() {
		if (Input::hasFile('file'))
		{
			$file = Input::file('file');
			$file->move('uploads', $file->getClientOriginalName());
			$bImage = new Photoforpost();
			$bImage->photo_name 	= $file->getClientOriginalName();                 
            $bImage->save();
		}

		return Redirect::intended('home')
			->with('name', $file->getClientOriginalName());
	}
}