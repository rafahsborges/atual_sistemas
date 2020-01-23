<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateEstadoCivilsTable extends Migration
{
    /**
     * @var array
     */
    protected $estadosCivils;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_civils', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->boolean('enabled')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });

        // Add new Estados Civils
        $this->estadosCivils = [
            [
                'nome' => 'CASADO',
                'enabled' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nome' => 'SOLTEIRO',
                'enabled' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nome' => 'OUTROS',
                'enabled' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($this->estadosCivils as $estadosCivil) {
            DB::table('estado_civils')->insert($estadosCivil);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('estado_civils');
    }
}
