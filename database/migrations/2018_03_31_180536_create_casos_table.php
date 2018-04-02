<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatecasosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casos', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->json('cliente');
            $table->json('contraparte');
            $table->date('fecha_recurso');
            $table->date('fecha_captacion');
            $table->integer('captador')->unsigned()->required();
            $table->string('rol', 15);
            $table->integer('materia_id')->unsigned()->required();
            $table->integer('estadocaso_id')->unsigned()->required();
            $table->integer('corte_id')->unsigned()->required();
            $table->string('tribunal', 30);
            $table->integer('responsable_proceso')->unsigned()->required();
            $table->boolean('pyp')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('captador')->references('id')->on('empleados');
            $table->foreign('materia_id')->references('id')->on('materias');
            $table->foreign('estadocaso_id')->references('id')->on('estadoscasos');
            $table->foreign('corte_id')->references('id')->on('cortes');
            $table->foreign('responsable_proceso')->references('id')->on('empleados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('casos');
    }
}
