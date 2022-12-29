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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("apellidos");
            $table->string("empresa")->nullable();;
            $table->string("dni")->nullable();;
            $table->string("ruc")->nullable();;
            $table->string("correo")->nullable();;
            $table->string("telefono")->nullable();;
            $table->string("celular")->nullable();;
            $table->string("web")->nullable();;
            $table->string("distrito")->nullable();;
            $table->string("departamento")->nullable();;
            $table->string("direccion")->nullable();;
            $table->string("inmueble")->nullable();;
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
        Schema::dropIfExists('clientes');
    }
};
