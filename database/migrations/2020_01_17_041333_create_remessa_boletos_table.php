<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRemessaBoletosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remessa_boletos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_boleto')->index('fk_rem_bol_remessas')->nullable();
            $table->unsignedBigInteger('id_remessa')->index('fk_rem_bol_boletos')->nullable();
            $table->boolean('enabled')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('remessa_boletos', function (Blueprint $table) {
            $table->foreign('id_boleto', 'fk_rem_bol_boletos')
                ->references('id')->on('boletos')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->foreign('id_remessa', 'fk_rem_bol_remessas')
                ->references('id')->on('remessas')
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
        Schema::table('remessa_boletos', function (Blueprint $table) {
            $table->dropForeign('fk_rem_bol_boletos');
            $table->dropForeign('fk_rem_bol_remessas');
        });
        Schema::drop('remessa_boletos');
    }
}
