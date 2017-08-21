<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContribuicaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contribuicaos', function (Blueprint $table) {
            $table->increments('id');
            $table->double('valor', 6, 2);
            $table->date('data')->nullable();
            $table->integer('Sindicatos_idSindicatos')	->unsigned()->nullable();
            $table->foreign('Sindicatos_idSindicatos')	->references('id')->on('sindicatos');
            $table->enum('Tipo', ['Sindical', 'Assistencial'] );
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
        Schema::dropIfExists('contribuicaos');
    }
}
