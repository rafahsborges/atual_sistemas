<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRemessaBoletoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('remessa_boleto', function(Blueprint $table)
		{
			$table->decimal('id', 9, 0)->primary();
			$table->decimal('id_remessa', 9, 0)->index('fk_rem_bol_remessa');
			$table->decimal('id_boleto', 9, 0)->index('fk_rem_bol_boleto');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('remessa_boleto');
	}

}
