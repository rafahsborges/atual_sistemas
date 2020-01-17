<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRemessaBoletoTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remessa_boleto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_boleto')->index('fk_rem_bol_remessa');
            $table->unsignedBigInteger('id_remessa')->index('fk_rem_bol_boleto');
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
