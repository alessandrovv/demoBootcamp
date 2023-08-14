<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_contratos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idContrato');
            $table->foreign('idContrato')->references('contratos')->on('id')->cascadeOnDelete();
            $table->date('fechaPago');
            $table->decimal('montoPrevisto')->nullable();
            $table->decimal('montoPagado')->nullable();
            $table->boolean('pagado')->default(false);
            $table->boolean('eliminado')->default(false);
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
        Schema::dropIfExists('detalle_contratos');
    }
}
