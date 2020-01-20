<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRemessaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remessa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('data')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->decimal('id_usuario', 9, 0);
            $table->string('nome', 30);
            $table->decimal('sequencia', 9, 0)->nullable();
            $table->unsignedBigInteger('id_conta')->index('fk_conta_remessa')->nullable();
            $table->foreign('id_conta', 'fk_conta_remessa')
                ->references('id')->on('conta')
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
        Schema::table('remessa', function (Blueprint $table) {
            $table->dropForeign('fk_conta_remessa');
        });
        Schema::drop('remessa');
    }
}
