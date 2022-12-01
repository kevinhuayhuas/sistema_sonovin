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
            $table->string("empresa");
            $table->string("correo");
            $table->string("telefono");
            $table->string("celular");
            $table->string("web");
            $table->string("distrito");
            $table->string("departamento");
            $table->string("direccion");
            $table->string("inmueble");
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
