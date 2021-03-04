<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagtosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagtos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idfat')->unsigned();
            $table->foreign('idfat')->references('id')->on('faturas');
            $table->double('valor', 8, 2);
            $table->date('data');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagtos');
    }
}
