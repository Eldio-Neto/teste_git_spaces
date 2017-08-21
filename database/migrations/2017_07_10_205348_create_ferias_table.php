<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ferias', function (Blueprint $table) {
        	$table->increments('id');
        	$table->date('inicio_aquisicao');
        	$table->date('termino_aquisicao');
        	$table->date('inicio_gozo');
        	$table->date('termino_gozo');
        	$table->longText('observacoes')				->nullable();
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
        Schema::dropIfExists('ferias');
    }
}
