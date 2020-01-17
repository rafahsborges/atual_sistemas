<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToContratoParcelaTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contrato_parcela', function (Blueprint $table) {
            $table->foreign('id_contrato', 'fk_contr_parcela_contrato')
                ->references('id')->on('contrato')
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
        Schema::table('contrato_parcela', function (Blueprint $table) {
            $table->dropForeign('fk_contr_parcela_contrato');
        });
    }

}
