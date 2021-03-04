<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faturas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idEmprestimo')->unsigned();
            $table->foreign('idEmprestimo')->references('id')->on('emprestimos');
            $table->integer('faturaNumero')->unsigned();
            $table->date('vcto');
            $table->double('valor', 8, 2);
            $table->double('pago', 8, 2);
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
        Schema::dropIfExists('faturas');
    }
}
