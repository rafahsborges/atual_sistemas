<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRemessasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remessas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('data')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->decimal('id_usuario', 9, 0);
            $table->string('nome', 30);
            $table->decimal('sequencia', 9, 0)->nullable();
            $table->unsignedBigInteger('id_conta')->index('fk_conta_remessas')->nullable();
            $table->foreign('id_conta', 'fk_conta_remessas')
                ->references('id')->on('contas')
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
        Schema::table('remessas', function (Blueprint $table) {
            $table->dropForeign('fk_conta_remessas');
        });
        Schema::drop('remessas');
    }
}
