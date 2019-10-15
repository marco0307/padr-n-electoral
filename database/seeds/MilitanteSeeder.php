<?php

use electoral\Militante;
use Illuminate\Database\Seeder;

class MilitanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Militante::create([
            'nombre'=>'Jose Jose',
            'apellido'=>'Santos',
            'cedula'=>'45345435435',
            'cedula_pdf'=>'documento.pdf',
            'sexo'=>'M',
            'email'=>'jose@hotmail.com',
            'telefono'=>'8097687587',
            'celular'=>'Jose Jose',
            'fecha_nacimiento'=>'1985-05-15',
            'formulario_fisico'=>'formulario.pdf',
            'comentario'=>'Ningun comentario',
            'foto'=>'Jose.png',
            'facebook'=>'/http/facebook',
            'instagram'=>'/http/instagram',
            'linkedin'=>'/http/linkedin',
            'twitter'=>'/http/twitter',
            'user_id'=>'1',
            'militante_id'=>'1',
            'ocupacion_id'=>'2',
            'grupo_id'=>'3',
            'cargo_id'=>'2',
            'sector_id'=>'2',
            'slug'=>'Jose Jose666',

        ]);
    }
}
