<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * @var array
     */
    protected $clientes;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('tipo');
            $table->string('nome');
            $table->date('nascimento')->nullable();
            $table->string('rg', 30)->nullable();
            $table->string('cpf', 14)->nullable();
            $table->string('insc_municipal', 30)->nullable();
            $table->string('cnpj', 18)->nullable();
            $table->string('sexo', 1)->nullable();
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
            $table->string('email')->nullable();
            $table->string('observacao', 1000)->nullable();
            $table->string('cep', 9)->nullable();
            $table->string('celular2', 14)->nullable();
            $table->string('celular3', 14)->nullable();
            $table->integer('id_cliente_responsavel')->nullable();
            $table->unsignedBigInteger('id_estado_civil')->index('fk_cliente_est_civils')->nullable();
            $table->foreign('id_estado_civil', 'fk_cliente_est_civils')
                ->references('id')->on('estado_civils')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->boolean('enabled')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });

        /*$this->clientes = [
            [
                'tipo' => '',
                'nome' => '',
                'nascimento' => '',
                'rg' => '',
                'cpf' => '',
                'insc_municipal' => '',
                'cnpj' => '',
                'sexo' => '',
                'profissao' => '',
                'local_trabalho' => '',
                'telefone' => '',
                'celular' => '',
                'logradouro' => '',
                'numero' => '',
                'complemento' => '',
                'bairro' => '',
                'cidade' => '',
                'uf' => '',
                'email' => '',
                'observacao' => '',
                'cep' => '',
                'celular2' => '',
                'celular3' => '',
                'id_cliente_responsavel' => '',
                'id_estado_civil' => '',
                'enabled' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($this->clientes as $cliente) {
            DB::table('clientes')->insert($cliente);
        }*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->dropForeign('fk_cliente_est_civils');
        });
        Schema::drop('clientes');
    }
}
