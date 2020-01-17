<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuario', function(Blueprint $table)
		{
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('senha');
            $table->dateTime('data_fim')->nullable();
            $table->decimal('nivel', 2, 0)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usuario');
	}

}
