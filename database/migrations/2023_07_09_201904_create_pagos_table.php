<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idDetalleContrato');
            $table->foreign('idDetalleContrato')->references('id')->on('detalle_contratos');
            $table->decimal('monto', 8, 2);
            $table->boolean('activo')->default(1);
            $table->timestamps();
            // $table->foreign('idContrato')->references('id')->on('contratos');
            // $table->foreign('idContrato')->references('contratos')->on('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagos');
    }
}
