<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Chat extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chat', function(Blueprint $table){
			$table->increments('idchat');
			$table->unsignedInteger('id_user');
			$table->string('ip',20);
			$table->string('os',60);
			$table->string('browser',60)->nullable();
			$table->date('tanggal');
			$table->time('jam');
			$table->string('messages');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('chat');
	}

}
