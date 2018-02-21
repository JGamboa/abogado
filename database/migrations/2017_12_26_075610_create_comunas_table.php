<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateComunasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comunas', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('provincias_id')->unsigned()->required();
            $table->string('nombre', 60)->required();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('provincias_id')->references('id')->on('provincias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comunas');
    }
}
