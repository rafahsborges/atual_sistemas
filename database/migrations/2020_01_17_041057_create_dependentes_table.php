<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDependentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependentes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->date('nascimento');
            $table->unsignedBigInteger('id_cliente')->index('fk_dependente_clientes')->nullable();
            $table->unsignedBigInteger('id_parentesco')->index('fk_dependente_parentescos')->nullable();
            $table->foreign('id_cliente', 'fk_dependente_clientes')
                ->references('id')->on('clientes')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->foreign('id_parentesco', 'fk_dependente_parentescos')
                ->references('id')->on('parentescos')
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
        Schema::table('dependentes', function (Blueprint $table) {
            $table->dropForeign('fk_dependente_clientes');
            $table->dropForeign('fk_dependente_parentescos');
        });
        Schema::drop('dependentes');
    }
}
