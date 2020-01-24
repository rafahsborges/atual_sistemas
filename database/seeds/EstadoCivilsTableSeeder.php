<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoCivilsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('estado_civils')->delete();

        DB::table('estado_civils')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'nome' => 'CASADO',
                    'enabled' => 1,
                    'created_at' => '2020-01-23 23:40:43',
                    'updated_at' => '2020-01-23 23:40:43',
                    'deleted_at' => NULL,
                ),
            1 =>
                array(
                    'id' => 2,
                    'nome' => 'SOLTEIRO',
                    'enabled' => 1,
                    'created_at' => '2020-01-23 23:40:43',
                    'updated_at' => '2020-01-23 23:40:43',
                    'deleted_at' => NULL,
                ),
            2 =>
                array(
                    'id' => 3,
                    'nome' => 'OUTROS',
                    'enabled' => 1,
                    'created_at' => '2020-01-23 23:40:43',
                    'updated_at' => '2020-01-23 23:40:43',
                    'deleted_at' => NULL,
                ),
        ));
    }
}
