<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcelas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('vencimento');
            $table->date('pagamento')->nullable();
            $table->decimal('id_boleto', 9, 0)->nullable();
            $table->decimal('id_carne', 9, 0)->nullable();
            $table->decimal('valor', 9);
            $table->decimal('numero_parcela', 2, 0)->nullable();
            $table->decimal('valor_pagamento', 9)->nullable();
            $table->unsignedBigInteger('id_contrato')->index('fk_contr_parcela_contratos')->nullable();
            $table->foreign('id_contrato', 'fk_contr_parcela_contratos')
                ->references('id')->on('contratos')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->boolean('enabled')->default(true);
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
        Schema::table('parcelas', function (Blueprint $table) {
            $table->dropForeign('fk_contr_parcela_contratos');
        });
        Schema::drop('parcelas');
    }
}
