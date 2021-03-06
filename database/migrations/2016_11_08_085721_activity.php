<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Activity extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activity', function (Blueprint $table) {
            $table->increments('idactivity');
			$table->string('iduser',50);
			$table->string('activity',250);
			$table->string('ip',20);
			$table->string('type',10);
			$table->date('tgl');
			$table->time('time');
           
           
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('activity');
	}

}
