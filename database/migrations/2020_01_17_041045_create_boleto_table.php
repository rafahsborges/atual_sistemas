<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBoletoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('boleto', function(Blueprint $table)
		{
			$table->decimal('id', 9, 0)->primary();
			$table->decimal('id_contrato_parcela', 9, 0)->index('fk_boleto_contr_parcela');
			$table->decimal('status', 2, 0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('boleto');
	}

}
