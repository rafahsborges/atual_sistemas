<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBoletoTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('boleto', function (Blueprint $table) {
            $table->foreign('id_contrato_parcela', 'fk_boleto_contr_parcela')
                ->references('id')->on('contrato_parcela')
                ->onUpdate('restrict')
                ->onDelete('restrict');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('boleto', function (Blueprint $table) {
            $table->dropForeign('fk_boleto_contr_parcela');
        });
    }

}
