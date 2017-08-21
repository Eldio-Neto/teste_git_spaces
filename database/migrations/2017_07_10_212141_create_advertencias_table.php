<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertencias', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data');
            $table->string('motivo', 50);
            $table->integer('Contratos_idContratos')	->unsigned()->nullable();
            $table->foreign('Contratos_idContratos')	->references('id')->on('contratos');
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
        Schema::dropIfExists('advertencias');
    }
}
