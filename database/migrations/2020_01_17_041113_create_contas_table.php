<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('banco', 3);
            $table->decimal('agencia', 4, 0);
            $table->string('digito_agencia', 1);
            $table->decimal('conta', 10, 0);
            $table->string('digito_conta', 1);
            $table->string('codigo_empresa', 30);
            $table->decimal('carteira', 2, 0);
            $table->decimal('tipo', 1, 0);
            $table->string('mensagem_1', 60)->nullable();
            $table->string('mensagem_2', 60)->nullable();
            $table->string('cpf_cnpj', 18)->nullable();
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
        Schema::drop('contas');
    }
}
