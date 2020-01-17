<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('conta', function(Blueprint $table)
		{
			$table->decimal('id', 9, 0)->primary();
			$table->string('nome');
			$table->string('banco', 3);
			$table->decimal('agencia', 4, 0);
			$table->string('digito_agencia', 1);
			$table->decimal('conta', 10, 0);
			$table->string('digito_conta', 1);
			$table->string('codigo_empresa', 30);
			$table->decimal('carteira', 2, 0);
			$table->decimal('tipo', 1, 0);
			$table->decimal('id_usuario_inclusao', 9, 0);
			$table->timestamp('data_inclusao')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->decimal('id_usuario_alteracao', 9, 0)->nullable();
			$table->dateTime('data_alteracao')->nullable();
			$table->dateTime('data_fim')->nullable();
			$table->string('mensagem_1', 60)->nullable();
			$table->string('mensagem_2', 60)->nullable();
			$table->string('cpf_cnpj', 18)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('conta');
	}

}
