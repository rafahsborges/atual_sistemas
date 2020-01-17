<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDependenteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dependente', function(Blueprint $table)
		{
			$table->decimal('id', 9, 0)->primary();
			$table->decimal('id_cliente', 9, 0)->index('fk_parentesco_cliente');
			$table->string('nome');
			$table->date('nascimento');
			$table->decimal('id_parentesco', 2, 0);
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
		Schema::drop('dependente');
	}

}
