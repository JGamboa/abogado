<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCasosUploadsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casos_uploads', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('caso_id')->unsigned()->required();
            $table->integer('upload_id')->unsigned()->required();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('caso_id')->references('id')->on('casos');
            $table->foreign('upload_id')->references('id')->on('uploads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('casos_uploads');
    }
}
