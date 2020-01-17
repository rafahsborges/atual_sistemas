<?php

use Illuminate\Database\Seeder;
use App\Usuario;

class CreateUsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'nome'=>'Admin',
                'email'=>'rafaelsouzaborges@outlook.com',
                'is_admin'=>'1',
                'senha'=> bcrypt('123456'),
            ],
            [
                'nome'=>'User',
                'email'=>'rafahsborges@outlook.com',
                'is_admin'=>'0',
                'senha'=> bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            Usuario::create($value);
        }
    }
}
