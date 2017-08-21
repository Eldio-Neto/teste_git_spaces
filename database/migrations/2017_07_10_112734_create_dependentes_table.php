<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDependentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 30);
            $table->string('last_name', 30)	->nullable();
            $table->date('data_nascimento')	->nullable();
            $table->longText('observacao')	->nullable();
            
            $table->integer('TipoDependentes_idTipoDependentes')	->unsigned()->nullable();
            $table->foreign('TipoDependentes_idTipoDependentes')	->references('id')->on('tipo_dependentes');
            $table->integer('Users_idUsers')	->unsigned()->nullable();
            $table->foreign('Users_idUsers')	->references('id')->on('users');
            
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
        Schema::dropIfExists('dependentes');
    }
}
