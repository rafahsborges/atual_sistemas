<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRemessaBoletoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remessa_boleto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_boleto')->index('fk_rem_bol_remessa')->nullable();
            $table->unsignedBigInteger('id_remessa')->index('fk_rem_bol_boleto')->nullable();
            $table->foreign('id_boleto', 'fk_rem_bol_boleto')
                ->references('id')->on('boleto')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->foreign('id_remessa', 'fk_rem_bol_remessa')
                ->references('id')->on('remessa')
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
        Schema::table('remessa_boleto', function (Blueprint $table) {
            $table->dropForeign('fk_rem_bol_boleto');
            $table->dropForeign('fk_rem_bol_remessa');
        });
        Schema::drop('remessa_boleto');
    }
}
