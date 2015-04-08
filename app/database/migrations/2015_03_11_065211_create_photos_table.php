<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('photos', function(Blueprint $table) {             
			$table->increments('photos_id');             
			$table->binary('image');             
			$table->string('imageName');             
		});
		$filename = "C:/xampp/htdocs/Project/public/images/picture.png";         
		 $data = File::get($filename);         
		 DB::table('photos')->insert([             
		 	'photos_id' =>'1',             
		 	'image' => $data,             
		 	'imageName' =>'picture.png']
		);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('photos');
	}

}
