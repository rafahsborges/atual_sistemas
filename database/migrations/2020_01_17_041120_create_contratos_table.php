<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('primeira_parcela');
            $table->date('ultima_parcela');
            $table->date('data_assinatura');
            $table->decimal('qtd_parcelas', 2, 0)->nullable();
            $table->decimal('tipo_pagamento', 1, 0);
            $table->decimal('valor', 9);
            $table->boolean('plano_funeral')->nullable();
            $table->decimal('desconto', 9)->nullable();
            $table->decimal('juros', 5)->nullable();
            $table->decimal('multa', 5)->nullable();
            $table->date('validade_contrato')->nullable();
            $table->unsignedBigInteger('id_cliente')->index('fk_contrato_cliente')->nullable();
            $table->unsignedBigInteger('id_plano')->index('fk_contrato_plano')->nullable();
            $table->unsignedBigInteger('id_conta')->index('fk_contrato_conta')->nullable();
            $table->foreign('id_cliente', 'fk_contrato_cliente')
                ->references('id')->on('cliente')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->foreign('id_conta', 'fk_contrato_conta')
                ->references('id')->on('conta')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->foreign('id_plano', 'fk_contrato_plano')
                ->references('id')->on('plano')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->boolean('enabled')->default(false);
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
        Schema::table('contratos', function (Blueprint $table) {
            $table->dropForeign('fk_contrato_cliente');
            $table->dropForeign('fk_contrato_conta');
            $table->dropForeign('fk_contrato_plano');
        });
        Schema::drop('contratos');
    }
}
