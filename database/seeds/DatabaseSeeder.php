<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ParentescosTableSeeder::class);
        $this->call(EstadoCivilsTableSeeder::class);
        $this->call(ClientesTableSeeder::class);
        $this->call(DependentesTableSeeder::class);
        $this->call(PlanosTableSeeder::class);
        $this->call(ContasTableSeeder::class);
        $this->call(ContratosTableSeeder::class);
        $this->call(ContratoParcelasTableSeeder::class);
        $this->call(BoletosTableSeeder::class);
        $this->call(RemessasTableSeeder::class);
        $this->call(RemessaBoletosTableSeeder::class);
    }
}
