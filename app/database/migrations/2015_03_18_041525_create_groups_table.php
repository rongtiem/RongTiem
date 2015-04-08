<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('groups', function(Blueprint $table) {
			$table->increments('groups_id');
			$table->string('groupsName');	
			$table->string('groupsMembers');	
			$table->string('groupsEvents');	
			$table->string('groupsFiles');
			$table->string('groupsYears');
			$table->timestamps();				
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comments');
	}

}
