<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 70)			->unique();
            $table->string('password', 70)		->nullable();
            $table->string('first_name', 30);
            $table->string('last_name', 30)		->nullable();
            
            $table->integer('EstadoCivils_idEstadoCivils')	->unsigned()->nullable();
            $table->foreign('EstadoCivils_idEstadoCivils')	->references('id')->on('estado_civils');
            $table->date('data_nascimento')	->nullable();
            $table->enum('genero', 				['M', 'F'] );
            $table->string('phone', 16)			->nullable();
            $table->string('mobile', 16)		->nullable();
            
            $table->string('CPF', 14)			->nullable();
            $table->string('RG', 20)			->nullable();
            $table->string('Emissor', 10)		->nullable();
            $table->string('PIS', 15)			->nullable();
            $table->string('titulo', 20)		->nullable();
            $table->string('titulo_zona', 5)	->nullable();
            $table->string('titulo_secao', 5)	->nullable();
            $table->string('CTPS', 10)			->nullable();
            $table->string('CTPS_serie', 06)	->nullable();
            $table->string('CTPS_uf', 06)		->nullable();
            $table->date('CTPS_emissao')		->nullable();
            $table->string('CNH', 15)			->nullable();
            $table->string('CNH_categoria', 15)	->nullable();
            $table->date('CNH_validade')		->nullable();
            
            $table->string('nome_pai', 45)		->nullable();
            $table->string('nome_mae', 45)		->nullable();
            
            $table->integer('Enderecos_idEnderecos')		->unsigned()->nullable();
            $table->foreign('Enderecos_idEnderecos')		->references('id')->on('enderecos');
            
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
