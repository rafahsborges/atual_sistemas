<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SexosTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('sexos')->delete();

        DB::table('sexos')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'nome' => 'MASCULINO',
                    'abreviacao' => 'M',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'deleted_at' => NULL,
                ),
            1 =>
                array(
                    'id' => 2,
                    'nome' => 'FEMININO',
                    'abreviacao' => 'F',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'deleted_at' => NULL,
                ),
        ));
    }
}
