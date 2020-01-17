<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContratoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contrato', function(Blueprint $table)
		{
			$table->decimal('id', 9, 0)->primary();
			$table->decimal('id_cliente', 9, 0)->index('fk_contrato_cliente');
			$table->date('primeira_parcela');
			$table->date('ultima_parcela');
			$table->decimal('id_usuario_inclusao', 9, 0);
			$table->timestamp('data_inclusao')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->decimal('id_usuario_alteracao', 9, 0)->nullable();
			$table->dateTime('data_alteracao')->nullable();
			$table->dateTime('data_fim')->nullable();
			$table->date('data_assinatura');
			$table->decimal('qtd_parcelas', 2, 0)->nullable();
			$table->decimal('tipo_pagamento', 1, 0);
			$table->decimal('id_plano', 9, 0)->index('fk_contrato_plano');
			$table->decimal('valor', 9);
			$table->boolean('plano_funeral')->nullable();
			$table->decimal('desconto', 9)->nullable();
			$table->decimal('juros', 5)->nullable();
			$table->decimal('multa', 5)->nullable();
			$table->decimal('id_conta', 9, 0)->nullable()->index('fk_contrato_conta');
			$table->date('validade_contrato')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contrato');
	}

}
