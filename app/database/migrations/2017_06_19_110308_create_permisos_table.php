<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePermisosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permisos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('modulo_id')->unsigned()->nullable();;
			$table->integer('admin_id')->unsigned()->nullable();;
			$table->timestamps();
			$table->foreign('modulo_id')->references('id')->on('modulos');
			$table->foreign('admin_id')->references('id')->on('admin');
		});

	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('permisos');
	}

}
