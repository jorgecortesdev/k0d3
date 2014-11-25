<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodeTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('code_tags', function(Blueprint $table)
		{
			$table->primary(array('code_id', 'tag_id'));
			$table->integer('code_id')->unsigned();
			$table->foreign('code_id')->references('id')->on('code')->onDelete('cascade');
			$table->integer('tag_id')->unsigned();
			$table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('code_tags');
	}

}
