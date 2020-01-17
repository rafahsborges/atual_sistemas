<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClienteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cliente', function(Blueprint $table)
		{
			$table->decimal('id', 9, 0)->primary();
			$table->string('nome');
			$table->date('nascimento')->nullable();
			$table->string('rg', 30)->nullable();
			$table->string('cpf', 14)->nullable();
			$table->string('insc_municipal', 30)->nullable();
			$table->string('cnpj', 18)->nullable();
			$table->string('sexo', 1)->nullable();
			$table->decimal('id_estado_civil', 2, 0)->nullable();
			$table->string('profissao')->nullable();
			$table->string('local_trabalho')->nullable();
			$table->string('telefone', 13)->nullable();
			$table->string('celular', 14)->nullable();
			$table->string('logradouro')->nullable();
			$table->string('numero', 15)->nullable();
			$table->string('complemento')->nullable();
			$table->string('bairro')->nullable();
			$table->string('cidade')->nullable();
			$table->string('uf', 2)->nullable();
			$table->string('tipo', 1)->nullable();
			$table->decimal('id_usuario_inclusao', 9, 0);
			$table->timestamp('data_inclusao')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->decimal('id_usuario_alteracao', 9, 0)->nullable();
			$table->dateTime('data_alteracao')->nullable();
			$table->dateTime('data_fim')->nullable();
			$table->string('email')->nullable();
			$table->string('observacao', 1000)->nullable();
			$table->string('cep', 9)->nullable();
			$table->string('celular2', 14)->nullable();
			$table->string('celular3', 14)->nullable();
			$table->decimal('id_cliente_responsavel', 9, 0)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cliente');
	}

}
