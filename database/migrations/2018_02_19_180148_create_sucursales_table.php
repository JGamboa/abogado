<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSucursalesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucursales', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('empresa_id')->unsigned()->required();
            $table->string('nombre', 40)->required();
            $table->string('direccion', 70)->required();
            $table->integer('region_id')->unsigned()->required();
            $table->integer('comuna_id')->unsigned()->required();
            $table->integer('provincia_id')->unsigned()->required();
            $table->integer('tipo')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('region_id')->references('id')->on('regiones');
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('comuna_id')->references('id')->on('comunas');
            $table->foreign('provincia_id')->references('id')->on('provincias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sucursales');
    }
}
