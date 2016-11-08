<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Rolelayer extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('role_layer', function (Blueprint $table) {
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('layer_id');
            $table->primary(['role_id', 'layer_id']);
           
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('role_layer');
	}

}
