<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rols', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('descripcion');
            $table->boolean('activo')->default(1);
            $table->timestamps();
        });

        Schema::create('permisos', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('rol_permiso', function (Blueprint $table) {
            $table->unsignedBigInteger('idRol');
            $table->foreign('idRol')->references('id')->on('rols');
            $table->unsignedBigInteger('idPermiso');
            $table->foreign('idPermiso')->references('id')->on('permisos');
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
        Schema::dropIfExists('rols');
        Schema::dropIfExists('permisos');
        Schema::dropIfExists('rol_permiso');
    }
}
