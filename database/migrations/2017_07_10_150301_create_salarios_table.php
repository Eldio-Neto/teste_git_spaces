<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salarios', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data');
            $table->double('salario', 6, 2);
            $table->string('motivo')			->nullable();
            $table->integer('Cargos_idCargos')	->unsigned()->nullable();
            $table->foreign('Cargos_idCargos')	->references('id')->on('cargos');
            $table->integer('CBO')				->nullable();
            
            $table->integer('Contratos_idContratos')	->unsigned()->nullable();
            $table->foreign('Contratos_idContratos')	->references('id')->on('contratos');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salarios');
    }
}
