<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContratoParcelaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contrato_parcela', function(Blueprint $table)
		{
			$table->decimal('id', 9, 0)->primary();
			$table->decimal('id_contrato', 9, 0)->index('fk_contr_parcela_contrato');
			$table->date('vencimento');
			$table->date('pagamento')->nullable();
			$table->decimal('id_boleto', 9, 0)->nullable();
			$table->decimal('id_carne', 9, 0)->nullable();
			$table->decimal('id_usuario_inclusao', 9, 0);
			$table->timestamp('data_inclusao')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->decimal('id_usuario_alteracao', 9, 0)->nullable();
			$table->dateTime('data_alteracao')->nullable();
			$table->dateTime('data_fim')->nullable();
			$table->decimal('valor', 9);
			$table->decimal('numero_parcela', 2, 0)->nullable();
			$table->decimal('valor_pagamento', 9)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contrato_parcela');
	}

}
