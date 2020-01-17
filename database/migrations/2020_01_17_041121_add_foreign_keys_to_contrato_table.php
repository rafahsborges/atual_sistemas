<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToContratoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contrato', function(Blueprint $table)
		{
			$table->foreign('id_cliente', 'fk_contrato_cliente')->references('id')->on('cliente')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_conta', 'fk_contrato_conta')->references('id')->on('conta')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_plano', 'fk_contrato_plano')->references('id')->on('plano')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contrato', function(Blueprint $table)
		{
			$table->dropForeign('fk_contrato_cliente');
			$table->dropForeign('fk_contrato_conta');
			$table->dropForeign('fk_contrato_plano');
		});
	}

}
