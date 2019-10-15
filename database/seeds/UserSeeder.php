<?php

use electoral\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        
        User::create([
            'nombre'=>'Administrador',
            'apellido'=>'Seeder',
            'email'=>'admin@hotmail.com',
            'password'=>bcrypt('123456'),
            'slug'=>'admin123',
            'role_id'=>'1',
        ]);

        User::create([
            'nombre'=>'Empadronador',
            'apellido'=>'Seeder',
            'email'=>'empa@hotmail.com',
            'password'=>bcrypt('123456'),
            'slug'=>'Empatronador123',
            'role_id'=>'2',
        ]);
    }
}
