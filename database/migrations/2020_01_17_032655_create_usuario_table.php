<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuario', function(Blueprint $table)
		{
			$table->decimal('id', 9, 0)->primary();
			$table->string('email');
			$table->string('senha', 32);
			$table->string('nome');
			$table->timestamp('data_inclusao')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->decimal('id_usuario_inclusao', 9, 0);
			$table->dateTime('data_alteracao')->nullable();
			$table->decimal('id_usuario_alteracao', 9, 0)->nullable();
			$table->dateTime('data_fim')->nullable();
			$table->boolean('senha_zerada')->nullable();
			$table->decimal('nivel', 2, 0)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usuario');
	}

}
