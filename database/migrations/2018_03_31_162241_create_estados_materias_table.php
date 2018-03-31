<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEstadosMateriasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estados_materias', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('materia_id')->unsigned()->required();
            $table->integer('estadocaso_id')->unsigned()->required();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('materia_id')->references('id')->on('materias');
            $table->foreign('estadocaso_id')->references('id')->on('estadoscasos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('estados_materias');
    }
}
