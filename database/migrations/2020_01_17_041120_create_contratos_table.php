<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->decimal('qtd_meses', 2, 0)->nullable();
            $table->decimal('qtd_parcelas', 2, 0)->nullable();
            $table->decimal('tipo_pagamento', 1, 0);
            $table->decimal('valor', 9);
            $table->decimal('valor_parcela', 9);
            $table->boolean('plano_funeral')->nullable();
            $table->decimal('desconto', 9)->nullable();
            $table->decimal('juros', 5)->nullable();
            $table->decimal('multa', 5)->nullable();
            $table->date('validade_contrato')->nullable();
            $table->unsignedBigInteger('id_cliente')->index('fk_contrato_clientes')->nullable();
            $table->unsignedBigInteger('id_plano')->index('fk_contrato_planos')->nullable();
            $table->unsignedBigInteger('id_conta')->index('fk_contrato_contas')->nullable();
            $table->foreign('id_cliente', 'fk_contrato_clientes')
                ->references('id')->on('clientes')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->foreign('id_conta', 'fk_contrato_contas')
                ->references('id')->on('contas')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->foreign('id_plano', 'fk_contrato_planos')
                ->references('id')->on('planos')
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
        Schema::table('contratos', function (Blueprint $table) {
            $table->dropForeign('fk_contrato_clientes');
            $table->dropForeign('fk_contrato_contas');
            $table->dropForeign('fk_contrato_planos');
        });
        Schema::drop('contratos');
    }
}
