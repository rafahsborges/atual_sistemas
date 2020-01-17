<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContratoParcelaTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato_parcela', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_contrato')->index('fk_contr_parcela_contrato');
            $table->date('vencimento');
            $table->date('pagamento')->nullable();
            $table->decimal('id_boleto', 9, 0)->nullable();
            $table->decimal('id_carne', 9, 0)->nullable();
            $table->decimal('valor', 9);
            $table->decimal('numero_parcela', 2, 0)->nullable();
            $table->decimal('valor_pagamento', 9)->nullable();
            $table->timestamps();
            $table->softDeletes();
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
