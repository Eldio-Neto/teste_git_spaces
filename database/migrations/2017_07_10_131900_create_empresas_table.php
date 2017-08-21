<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
        	$table->increments('id');
        	$table->string('fantasia', 40);
        	$table->string('CNPJ', 20);
        	$table->string('razao_social', 40);
        	$table->string('abreviacao', 40)	->nullable();
        	$table->string('phone', 16)			->nullable();
        	$table->string('mobile', 16)		->nullable();
        	
        	$table->string('CEP', 12)			->nullable();
        	$table->string('Logradouro', 60)	->nullable();
        	$table->string('Bairro', 40)		->nullable();
        	$table->string('Cidade', 40)		->nullable();
        	$table->integer('UFs_idUFs')		->nullable()->unsigned();
        	$table->foreign('UFs_idUFs')		->references('id')->on('ufs');
            
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
        Schema::dropIfExists('empresas');
    }
}
