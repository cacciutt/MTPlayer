<?php

use Illuminate\Database\Migrations\Migration;

class Tracks extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tracks', function($table) {

			// Track table creation
			$table->increments("id");

			$table->string("artist", 128);
			$table->string("title", 128);
			$table->string("genre", 128);
			$table->string("duration", 16);
			$table->string("mp3_path", 512);
			$table->string("picture_path", 512);

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tracks');
	}

}