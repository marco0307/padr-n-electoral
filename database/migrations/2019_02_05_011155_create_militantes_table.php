<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMilitantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('militantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('cedula')->unique()->required();
            $table->string('cedula_pdf')->nullable();
            $table->char('sexo',1);
            $table->string('email')->unique();
            $table->string('telefono')->nullable();
            $table->string('celular');
            $table->string('fecha_nacimiento');
            $table->string('formulario_fisico')->nullable();
            $table->string('foto')->nullable()->default('perfil.png');
            $table->string('comentario',1100)->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('slug');
            //Foreign keys
            $table->integer('user_id');
            $table->integer('militante_id')->nullable();
            $table->integer('ocupacion_id');
            $table->integer('grupo_id')->nullable();
            $table->integer('cargo_id');
            $table->integer('sector_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('militante_id')->references('id')->on('militantes')->onDelete('cascade');
            $table->foreign('ocupacion_id')->references('id')->on('ocupacions');
            $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('cascade');
            $table->foreign('cargo_id')->references('id')->on('cargos');
            $table->foreign('sector_id')->references('id')->on('sectors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('militantes');
    }
}
