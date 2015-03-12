<?php
	class Photo extends Eloquent {
		protected $guarded = array();
		public static $rules = array(
			'photos' => 'required'
		);
		

	public function postPhoto() 
	{
		return $this->belongsTo('Post', 'post_id','id');
		 //return $this->belongsTo('Author', 'author_id', 'id'); 
	}
}