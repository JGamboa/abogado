<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateuploadsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uploads', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('empresa_id')->unsigned()->required();
            $table->string('name', 250);
            $table->string('path', 250)->nullable();
            $table->string('extension', 20)->nullable();
            $table->string('caption', 250)->nullable();
            $table->integer('empleado_id')->unsigned()->nullable();
            $table->string('hash', 250)->nullable();
            $table->boolean('isPublic')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('empleado_id')->references('id')->on('empleados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('uploads');
    }
}
