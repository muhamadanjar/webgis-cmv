<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Hubungi extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up(){
		Schema::create('hubungi', function (Blueprint $table) {
            $table->increments('idhubungi');
			$table->string('nama',50);
			$table->string('email',100);
			$table->string('subjek',100);
			$table->text('pesan');
			$table->date('tanggal');
			$table->time('jam');
			$table->boolean('dibaca');
           
           
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('hubungi');
	}

}
