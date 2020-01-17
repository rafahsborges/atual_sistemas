<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRemessaBoletoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('remessa_boleto', function(Blueprint $table)
		{
			$table->foreign('id_boleto', 'fk_rem_bol_boleto')->references('id')->on('boleto')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_remessa', 'fk_rem_bol_remessa')->references('id')->on('remessa')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('remessa_boleto', function(Blueprint $table)
		{
			$table->dropForeign('fk_rem_bol_boleto');
			$table->dropForeign('fk_rem_bol_remessa');
		});
	}

}
