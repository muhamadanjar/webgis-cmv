<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->timestamp('latestlogin')->nullable();
			$table->string('phone',14)->nullable();
			$table->smallInteger('isactive')->nullable();
			$table->smallInteger('isonline')->default(0)->nullable();
			$table->smallInteger('level')->nullable();
			$table->string('image')->nullable();
			$table->rememberToken();
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
		Schema::dropIfExists('users');
	}

}
