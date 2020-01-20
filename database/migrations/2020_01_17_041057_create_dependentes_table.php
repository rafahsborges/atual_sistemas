<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDependenteTable extends Migration
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
            $table->unsignedBigInteger('id_cliente')->index('fk_dependente_cliente')->nullable();
            $table->unsignedBigInteger('id_parentesco')->index('fk_dependente_parentesco')->nullable();
            $table->foreign('id_cliente', 'fk_dependente_cliente')
                ->references('id')->on('cliente')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->foreign('id_cliente', 'fk_dependente_parentesco')
                ->references('id')->on('parentesco')
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
        Schema::table('dependentes', function (Blueprint $table) {
            $table->dropForeign('fk_dependente_cliente');
            $table->dropForeign('fk_dependente_parentesco');
        });
        Schema::drop('dependentes');
    }
}
