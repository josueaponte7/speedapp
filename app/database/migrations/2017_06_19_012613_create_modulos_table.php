<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateModulosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('modulos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('modulo', 50);
			$table->string('title');
			$table->integer('posicion');
			$table->string('controller');
			$table->string('route');
			$table->string('icono');
			$table->integer('activo');
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
		Schema::drop('modulos');
	}

}
