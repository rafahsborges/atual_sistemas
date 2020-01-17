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
            $table->decimal('id_conta', 9, 0)->default(2)->index('fk_conta_remessa');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('remessa');
    }

}
