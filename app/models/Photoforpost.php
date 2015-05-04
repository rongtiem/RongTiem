<?php
	class Photoforpost extends Eloquent {
		protected $guarded = array();
		public static $rules = array(
			'photoforposts' => 'required'
		);
		protected $fillable = array('path');

		public function picture()
	   {
	      return $this->hasOne('Photo', 'photos_id', 'id');
	   }
		
}