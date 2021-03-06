<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoletosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boletos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('status');
            $table->unsignedBigInteger('id_parcela')->index('fk_boleto_contr_parcelas')->nullable();
            $table->foreign('id_parcela', 'fk_boleto_contr_parcelas')
                ->references('id')->on('parcelas')
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
        Schema::table('boletos', function (Blueprint $table) {
            $table->dropForeign('fk_boleto_contr_parcelas');
        });
        Schema::drop('boletos');
    }
}
