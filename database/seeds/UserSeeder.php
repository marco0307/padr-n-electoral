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
        //User::truncate();
        
        User::create([
            'nombre'=>'Administrador',
            'apellido'=>'Seeder',
            'email'=>'admin@hotmail.com',
            'password'=>bcrypt('123456'),
            'slug'=>'admin',
            'role_id'=>'1',
        ]);

        User::create([
            'nombre'=>'Marco',
            'apellido'=>'De la cruz',
            'email'=>'marco033F@hotmail.com',
            'password'=>bcrypt('holamundo'),
            'slug'=>'marco033F',
            'role_id'=>'1',
        ]);

        User::create([
            'nombre'=>'Empadronador',
            'apellido'=>'Seeder',
            'email'=>'empadronador@hotmail.com',
            'password'=>bcrypt('123456'),
            'slug'=>'empatronador',
            'role_id'=>'2',
        ]);
    }
}
