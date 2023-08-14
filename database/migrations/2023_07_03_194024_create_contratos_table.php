<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idAlumno');
            $table->foreign('idAlumno')->references('id')->on('alumnos');
            $table->string('periodoMatricula');
            $table->unsignedBigInteger('idGrupo');
            $table->foreign('idGrupo')->references('id')->on('grupos');
            $table->unsignedBigInteger('idPlan');
            $table->foreign('idPlan')->references('id')->on('planes');
            $table->decimal('descuento')->nullable();
            $table->boolean('descuentoPorcentaje')->nullable();
            $table->integer('nroCuotas');
            $table->decimal('montoTotal');
            $table->char('estado')->default('A');
            $table->boolean('activo')->default(1);
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
        Schema::dropIfExists('contratos');
    }
}
