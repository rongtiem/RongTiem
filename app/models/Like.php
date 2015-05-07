<?php
	class Like extends Eloquent {
		protected $guarded = array();
		public static $rules = array(
			'likes' => 'required'
		);
		protected $fillable = array('user_id', 'posts_id');

}