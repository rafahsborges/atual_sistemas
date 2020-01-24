<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParentescosTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('parentescos')->delete();

        DB::table('parentescos')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'nome' => 'Pai',
                    'enabled' => 1,
                    'created_at' => '2020-01-23 23:40:42',
                    'updated_at' => '2020-01-23 23:40:42',
                    'deleted_at' => NULL,
                ),
            1 =>
                array(
                    'id' => 2,
                    'nome' => 'Mãe',
                    'enabled' => 1,
                    'created_at' => '2020-01-23 23:40:42',
                    'updated_at' => '2020-01-23 23:40:42',
                    'deleted_at' => NULL,
                ),
            2 =>
                array(
                    'id' => 3,
                    'nome' => 'Filho',
                    'enabled' => 1,
                    'created_at' => '2020-01-23 23:40:42',
                    'updated_at' => '2020-01-23 23:40:42',
                    'deleted_at' => NULL,
                ),
            3 =>
                array(
                    'id' => 4,
                    'nome' => 'Filha',
                    'enabled' => 1,
                    'created_at' => '2020-01-23 23:40:42',
                    'updated_at' => '2020-01-23 23:40:42',
                    'deleted_at' => NULL,
                ),
            4 =>
                array(
                    'id' => 5,
                    'nome' => 'Esposo',
                    'enabled' => 1,
                    'created_at' => '2020-01-23 23:40:42',
                    'updated_at' => '2020-01-23 23:40:42',
                    'deleted_at' => NULL,
                ),
            5 =>
                array(
                    'id' => 6,
                    'nome' => 'Esposa',
                    'enabled' => 1,
                    'created_at' => '2020-01-23 23:40:42',
                    'updated_at' => '2020-01-23 23:40:42',
                    'deleted_at' => NULL,
                ),
            6 =>
                array(
                    'id' => 7,
                    'nome' => 'Sogro',
                    'enabled' => 1,
                    'created_at' => '2020-01-23 23:40:42',
                    'updated_at' => '2020-01-23 23:40:42',
                    'deleted_at' => NULL,
                ),
            7 =>
                array(
                    'id' => 8,
                    'nome' => 'Sogra',
                    'enabled' => 1,
                    'created_at' => '2020-01-23 23:40:42',
                    'updated_at' => '2020-01-23 23:40:42',
                    'deleted_at' => NULL,
                ),
            8 =>
                array(
                    'id' => 9,
                    'nome' => 'Avô',
                    'enabled' => 1,
                    'created_at' => '2020-01-23 23:40:42',
                    'updated_at' => '2020-01-23 23:40:42',
                    'deleted_at' => NULL,
                ),
            9 =>
                array(
                    'id' => 10,
                    'nome' => 'Avó',
                    'enabled' => 1,
                    'created_at' => '2020-01-23 23:40:42',
                    'updated_at' => '2020-01-23 23:40:42',
                    'deleted_at' => NULL,
                ),
            10 =>
                array(
                    'id' => 11,
                    'nome' => 'Irmão',
                    'enabled' => 1,
                    'created_at' => '2020-01-23 23:40:42',
                    'updated_at' => '2020-01-23 23:40:42',
                    'deleted_at' => NULL,
                ),
            11 =>
                array(
                    'id' => 12,
                    'nome' => 'Irmã',
                    'enabled' => 1,
                    'created_at' => '2020-01-23 23:40:42',
                    'updated_at' => '2020-01-23 23:40:42',
                    'deleted_at' => NULL,
                ),
            12 =>
                array(
                    'id' => 13,
                    'nome' => 'Tio',
                    'enabled' => 1,
                    'created_at' => '2020-01-23 23:40:42',
                    'updated_at' => '2020-01-23 23:40:42',
                    'deleted_at' => NULL,
                ),
            13 =>
                array(
                    'id' => 14,
                    'nome' => 'Tia',
                    'enabled' => 1,
                    'created_at' => '2020-01-23 23:40:42',
                    'updated_at' => '2020-01-23 23:40:42',
                    'deleted_at' => NULL,
                ),
            14 =>
                array(
                    'id' => 15,
                    'nome' => 'Sobrinho',
                    'enabled' => 1,
                    'created_at' => '2020-01-23 23:40:42',
                    'updated_at' => '2020-01-23 23:40:42',
                    'deleted_at' => NULL,
                ),
            15 =>
                array(
                    'id' => 16,
                    'nome' => 'Sobrinha',
                    'enabled' => 1,
                    'created_at' => '2020-01-23 23:40:42',
                    'updated_at' => '2020-01-23 23:40:42',
                    'deleted_at' => NULL,
                ),
        ));
    }
}
