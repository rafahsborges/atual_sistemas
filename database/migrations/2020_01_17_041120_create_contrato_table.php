<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContratoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_cliente')->index('fk_contrato_cliente');
            $table->date('primeira_parcela');
            $table->date('ultima_parcela');
            $table->date('data_assinatura');
            $table->decimal('qtd_parcelas', 2, 0)->nullable();
            $table->decimal('tipo_pagamento', 1, 0);
            $table->unsignedBigInteger('id_plano')->index('fk_contrato_plano');
            $table->decimal('valor', 9);
            $table->boolean('plano_funeral')->nullable();
            $table->decimal('desconto', 9)->nullable();
            $table->decimal('juros', 5)->nullable();
            $table->decimal('multa', 5)->nullable();
            $table->unsignedBigInteger('id_conta')->nullable()->index('fk_contrato_conta');
            $table->date('validade_contrato')->nullable();
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
        Schema::drop('contrato');
    }
}
