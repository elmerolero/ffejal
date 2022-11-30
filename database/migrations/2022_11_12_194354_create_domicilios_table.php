<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomiciliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domicilios', function (Blueprint $table) {
            $table->id();
            $table->string('calle', 100);
            $table->string('numero');
            $table->integer('interior')->nullable();
            $table->string('colonia', 100);
            $table->integer('codigo_postal');
            $table->foreignId('pais_id')->references('id')->on('paises');
            $table->foreignId('estado_id')->references('id')->on('estados');
            $table->foreignId('municipio_id')->references('id')->on('municipios');
            $table->foreignId('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('domicilios');
    }
}
