<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cad_produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idadm')->unsigned();
            $table->foreign('idadm')->references('id')->on('cad_adms');
            $table->string('nome')->nullable();
            $table->string('image')->nullable();
            $table->longText('desc')->nullable();
            $table->longText('codPag')->nullable();
            $table->double('preco');
            $table->enum('status',[
            'A'/*ATIV0*/,
            'I'/*INATIVO*/
            ]);
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
        Schema::dropIfExists('produtos');
    }
}
