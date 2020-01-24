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
        // $this->call(UsersTableSeeder::class);
        $this->call(ParentescosTableSeeder::class);
        $this->call(EstadoCivilsTableSeeder::class);
        $this->call(ClientesTableSeeder::class);
    }
}
