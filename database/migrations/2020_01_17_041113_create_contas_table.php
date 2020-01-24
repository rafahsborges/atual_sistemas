<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateContasTable extends Migration
{
    /**
     * @var array
     */
    protected $contas;

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

        // Add new Contas
        $this->contas = [
            [
                'nome' => 'PJDJ ESSENCIAL VIDA',
                'banco' => '237',
                'agencia' => '526',
                'digito_agencia' => '6',
                'conta' => '591934',
                'digito_conta' => '7',
                'codigo_empresa' => '4855309',
                'carteira' => '9',
                'tipo' => '1',
                'mensagem_1' => 'NÃO RECEBER COM 60 DIAS DE VENCIDO',
                'mensagem_2' => 'PROTESTAR EM 5 DIAS UTEIS',
                'cpf_cnpj' => '064.443.918-14',
                'enabled' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nome' => 'ESSENCIAL VIDA COBRANCA, CA',
                'banco' => '237',
                'agencia' => '526',
                'digito_agencia' => '6',
                'conta' => '39001',
                'digito_conta' => '1',
                'codigo_empresa' => '4852925',
                'carteira' => '9',
                'tipo' => '2',
                'mensagem_1' => 'NÃO RECEBER COM 60 DIAS DE VENCIDO',
                'mensagem_2' => 'PROTESTAR EM 5 DIAS UTEIS',
                'cpf_cnpj' => '17.604.556/0001-90',
                'enabled' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($this->contas as $conta) {
            DB::table('contas')->insert($conta);
        }
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
