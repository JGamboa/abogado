<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmpresasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('rut', 10)->unique()->required();
            $table->string('razon_social', 150)->required();
            $table->string('nombre_fantasia', 150)->nullable();
            $table->string('direccion', 70)->required();
            $table->integer('region_id')->unsigned()->required();
            $table->integer('comuna_id')->unsigned()->required();
            $table->integer('provincia_id')->unsigned()->required();
            $table->string('logotipo', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('region_id')->references('id')->on('regiones');
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
        Schema::drop('empresas');
    }
}
