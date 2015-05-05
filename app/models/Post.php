<?php
	class Post extends Eloquent {
		protected $guarded = array();
		public static $rules = array(
			'title' => 'required| unique:posts',
			'body' => 'required',
			'slug' => 'unique:posts'
		);

	public function user()
	{
		return $this->belongsTo('User', 'user_id');
	}

	public function posts()
	   {
	      return $this->belongsto('Post');
	   }
	public function image() {         
		return $this->hasOne('Photo', 'photos_id', 'id');     
	} 

	public function picture()
	   {
	      return $this->hasOne('Photoforpost', 'post_id', 'id');
	   }

	public function photos() {         
		return $this->hasmany('Photoforpost');     
	}

}