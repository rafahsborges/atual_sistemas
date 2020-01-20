<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDependenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dependente', function (Blueprint $table) {
            $table->foreign('id_cliente', 'fk_dependente_cliente')
                ->references('id')->on('cliente')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->foreign('id_cliente', 'fk_dependente_parentesco')
                ->references('id')->on('parentesco')
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
        Schema::table('dependente', function (Blueprint $table) {
            $table->dropForeign('fk_dependente_cliente');
            $table->dropForeign('fk_dependente_parentesco');
        });
    }
}
