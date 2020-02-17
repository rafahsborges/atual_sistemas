<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContasTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('contas')->delete();

        DB::table('contas')->insert(array(
            0 =>
                array(
                    'id' => 1,
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
                    'enabled' => 1,
                    'created_at' => '2020-01-23 23:40:49',
                    'updated_at' => '2020-01-23 23:40:49',
                    'deleted_at' => NULL,
                ),
            1 =>
                array(
                    'id' => 2,
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
                    'enabled' => 1,
                    'created_at' => '2020-01-23 23:40:49',
                    'updated_at' => '2020-01-23 23:40:49',
                    'deleted_at' => NULL,
                ),
            2 =>
                array(
                    'id' => 3,
                    'nome' => 'ESSENCIAL VIDA SICREDI',
                    'banco' => '748',
                    'agencia' => '2',
                    'digito_agencia' => '0',
                    'conta' => '65884',
                    'digito_conta' => '7',
                    'codigo_empresa' => '65884',
                    'carteira' => '1',
                    'tipo' => '2',
                    'mensagem_1' => 'NÃO RECEBER COM 60 DIAS DE VENCIDO',
                    'mensagem_2' => 'PROTESTAR EM 5 DIAS UTEIS',
                    'cpf_cnpj' => '17.604.556/0001-90',
                    'enabled' => 1,
                    'created_at' => '2020-02-17 18:19:58',
                    'updated_at' => '2020-02-17 18:20:43',
                    'deleted_at' => NULL,
                ),
        ));
    }
}
