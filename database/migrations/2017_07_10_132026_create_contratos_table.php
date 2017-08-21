<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('admissao')				->nullable();
            $table->date('inicio')					->nullable();
            $table->date('aviso_previo')			->nullable();
            $table->date('demissao')				->nullable();
            $table->integer('cod_colibri')			->nullable();
            $table->integer('cod_contabilidade')	->nullable();
            
            $table->integer('Empresas_idEmpresas')	->unsigned()->nullable();
            $table->foreign('Empresas_idEmpresas')	->references('id')->on('empresas');
            
            $table->integer('TipoFuncionarios_idTipoFuncionarios')->unsigned()->nullable();
            $table->foreign('TipoFuncionarios_idTipoFuncionarios')->references('id')->on('tipo_funcionarios');
            
            $table->integer('Users_idUsers')		->unsigned()->nullable();
            $table->foreign('Users_idUsers')		->references('id')->on('users');
            
            $table->longText('observacoes')			->nullable();
            
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
        Schema::dropIfExists('contratos');
    }
}
