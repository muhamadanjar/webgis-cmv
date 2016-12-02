<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Gallery extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gallery', function(Blueprint $table){
			$table->increments('id_gallery');
			$table->integer('id_album',20);
			$table->string('judul_gallery',60);
			$table->text('keteragan');
			$table->string('image');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('gallery');
	}

}
