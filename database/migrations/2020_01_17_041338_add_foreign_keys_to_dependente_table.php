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
            $table->foreign('id_cliente', 'fk_parentesco_cliente')
                ->references('id')->on('cliente')
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
            $table->dropForeign('fk_parentesco_cliente');
        });
    }

}
