<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CadEmprestimos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idcli')->unsigned();
            $table->foreign('idcli')->references('id')->on('cad_clis');
            $table->date('dataEmprestimo');
            $table->double('amount', 8, 2);
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
