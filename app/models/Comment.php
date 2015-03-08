<?php
	class Comment extends Eloquent {
		protected $guarded = array();
		public static $rules = array(
			'comments' => 'required'
		);
		

	public function writeComment() 
	{
		return $this->belongsTo('Post', 'post_id','id');
		 //return $this->belongsTo('Author', 'author_id', 'id'); 
	}
}