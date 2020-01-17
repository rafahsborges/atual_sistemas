<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlanoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plano', function(Blueprint $table)
		{
			$table->decimal('id', 9, 0)->primary();
			$table->string('nome');
			$table->decimal('id_usuario_inclusao', 9, 0);
			$table->timestamp('data_inclusao')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->decimal('id_usuario_alteracao', 9, 0)->nullable();
			$table->dateTime('data_alteracao')->nullable();
			$table->dateTime('data_fim')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('plano');
	}

}
