<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('tipo');
            $table->string('nome');
            $table->date('nascimento')->nullable();
            $table->string('rg', 30)->nullable();
            $table->string('cpf', 14)->nullable();
            $table->string('insc_municipal', 30)->nullable();
            $table->string('cnpj', 18)->nullable();
            $table->unsignedBigInteger('id_sexo')->index('fk_cliente_sexos')->nullable();
            $table->foreign('id_sexo', 'fk_cliente_sexos')
                ->references('id')->on('sexos')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->string('profissao')->nullable();
            $table->string('local_trabalho')->nullable();
            $table->string('telefone', 14)->nullable();
            $table->string('celular', 15)->nullable();
            $table->string('logradouro')->nullable();
            $table->string('numero', 15)->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->unsignedBigInteger('id_cidade')->index('fk_cliente_cidades')->nullable();
            $table->foreign('id_cidade', 'fk_cliente_cidades')
                ->references('id')->on('cidades')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->unsignedBigInteger('id_uf')->index('fk_cliente_ufs')->nullable();
            $table->foreign('id_uf', 'fk_cliente_ufs')
                ->references('id')->on('ufs')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->string('email')->nullable();
            $table->string('observacao', 1000)->nullable();
            $table->string('cep', 9)->nullable();
            $table->string('celular2', 15)->nullable();
            $table->string('celular3', 15)->nullable();
            $table->integer('id_cliente_responsavel')->nullable();
            $table->unsignedBigInteger('id_estado_civil')->index('fk_cliente_est_civils')->nullable();
            $table->foreign('id_estado_civil', 'fk_cliente_est_civils')
                ->references('id')->on('estado_civils')
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
        Schema::table('clientes', function (Blueprint $table) {
            $table->dropForeign('fk_cliente_est_civils');
            $table->dropForeign('fk_cliente_sexos');
            $table->dropForeign('fk_cliente_cidades');
            $table->dropForeign('fk_cliente_ufs');
        });
        Schema::drop('clientes');
    }
}
