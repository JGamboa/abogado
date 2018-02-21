<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegionesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regiones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pais_id')->unsigned()->required();
            $table->string('nombre', 60)->unique()->required();
            $table->string('ISO_3166_2_CL', 6);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('pais_id')->references('id')->on('pais');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('regiones');
    }
}
