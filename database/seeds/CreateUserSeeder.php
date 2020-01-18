<?php

use Illuminate\Database\Seeder;
use App\Usuario;

class CreateUserSeeder extends Seeder
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
                'password'=> bcrypt('123456'),
            ],
            [
                'nome'=>'User',
                'email'=>'rafahsborges@outlook.com',
                'password'=> bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            Usuario::create($value);
        }
    }
}
