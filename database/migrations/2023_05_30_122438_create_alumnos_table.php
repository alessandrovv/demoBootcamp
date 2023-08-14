<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('codEstudiante');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('area');
            $table->string('nivel')->nullable();
            $table->string('modalidad');
            $table->string('turno');
            $table->string('nombresApoderado');
            $table->string('apellidosApoderado');
            $table->string('emailApoderado')->nullable();
            $table->string('celApoderado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
