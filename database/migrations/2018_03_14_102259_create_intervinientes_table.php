<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateintervinientesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervinientes', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('empresa_id')->unsigned()->required();
            $table->string('rut', 10)->required();
            $table->string('nombres', 100)->required();
            $table->string('apellido_paterno', 70)->nullable();
            $table->string('apellido_materno', 70)->nullable();
            $table->string('direccion', 70)->required();
            $table->integer('region_id')->unsigned()->required();
            $table->integer('provincia_id')->unsigned()->required();
            $table->integer('comuna_id')->unsigned()->required();
            $table->string('oficio', 50);
            $table->string('telefonos', 100)->nullable();
            $table->string('correo_electronico', 80)->nullable();
            $table->integer('isapre')->unsigned()->required();
            $table->text('observacion')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('region_id')->references('id')->on('regiones');
            $table->foreign('provincia_id')->references('id')->on('provincias');
            $table->foreign('comuna_id')->references('id')->on('comunas');
            $table->foreign('isapre')->references('id')->on('isapres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('intervinientes');
    }
}
