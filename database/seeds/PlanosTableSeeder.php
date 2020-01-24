<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanosTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('planos')->delete();

        DB::table('planos')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'nome' => 'ESSENCIAL COM GF E SEGURO',
                    'enabled' => 1,
                    'created_at' => '2020-01-23 23:40:50',
                    'updated_at' => '2020-01-23 23:40:50',
                    'deleted_at' => NULL,
                ),
            1 =>
                array(
                    'id' => 2,
                    'nome' => 'ESSENCIAL SEM GF',
                    'enabled' => 1,
                    'created_at' => '2020-01-23 23:40:50',
                    'updated_at' => '2020-01-23 23:40:50',
                    'deleted_at' => NULL,
                ),
            2 =>
                array(
                    'id' => 3,
                    'nome' => 'ESSENCIAL COM GF',
                    'enabled' => 1,
                    'created_at' => '2020-01-23 23:40:50',
                    'updated_at' => '2020-01-23 23:40:50',
                    'deleted_at' => NULL,
                ),
        ));
    }
}
