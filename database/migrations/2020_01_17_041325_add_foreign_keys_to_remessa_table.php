<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRemessaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('remessa', function(Blueprint $table)
		{
			$table->foreign('id_conta', 'fk_conta_remessa')->references('id')->on('conta')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('remessa', function(Blueprint $table)
		{
			$table->dropForeign('fk_conta_remessa');
		});
	}

}
