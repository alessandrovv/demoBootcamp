<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleAsistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_asistencias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idAsistencia');
            $table->foreign('idAsistencia')->references('id')->on('asistencias');
            $table->unsignedBigInteger('idAlumno');
            $table->foreign('idAlumno')->references('id')->on('alumnos');
            $table->unsignedBigInteger('idEstado');
            $table->foreign('idEstado')->references('id')->on('estado_asistencias');
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
        Schema::dropIfExists('detalle_asistencias');
    }
}
