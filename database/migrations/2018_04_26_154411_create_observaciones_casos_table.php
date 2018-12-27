<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObservacionesCasosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observaciones_casos', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('caso_id')->unsigned();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('observacion', 255);
            $table->timestamps();
            $table->foreign('caso_id')->references('id')->on('casos');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('observaciones_casos');
    }
}
