<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cronogramas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("gasto_id");
            $table->date("fecha_facturacion");
            $table->date("fecha_vencimiento");
            $table->date("fecha_pago");
            $table->double("importe_total");
            $table->boolean("estado");
            $table->timestamps();
            $table->foreign('gasto_id')->references('id')->on('pagos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
