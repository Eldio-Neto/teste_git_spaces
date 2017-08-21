<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitacaos', function (Blueprint $table) {
        	$table->increments('id');
        	$table->integer('Users_idUsers')						->unsigned()->nullable();
        	$table->foreign('Users_idUsers')						->references('id')->on('users');
        	$table->integer('TipoSolicitacaos_idTipoSolicitacaos')	->unsigned()->nullable();
        	$table->foreign('TipoSolicitacaos_idTipoSolicitacaos')	->references('id')->on('tipo_solicitacaos');
        	
        	$table->enum('status', 				['Pendente', 'Negado', 'Aprovado']);
        	$table->longText('resposta')							->nullable();
        	$table->date('data_falta')								->nullable();
        	$table->double('valor')									->nullable();
        	$table->date('data_retirada')							->nullable();
        	$table->longText('detalhes')							->nullable();
        	
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
        Schema::dropIfExists('solicitacaos');
    }
}
