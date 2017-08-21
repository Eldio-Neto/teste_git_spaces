<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtestadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atestados', function (Blueprint $table) {
        	$table->increments('id');
        	$table->dateTime('data_hora');
        	$table->integer('quantidade_dias');
        	$table->integer('CID')						->nullable();
        	$table->enum('tipo', ['Atestado Médico', 'Atestado de Comparecimento']);
        	$table->longText('observacoes');
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
        Schema::dropIfExists('atestados');
    }
}
