<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEletronicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eletronicos', function (Blueprint $table) {
        	$table->increments('id');
        	$table->string('Marca', 20);
        	$table->string('Modelo', 20)		->nullable();
        	$table->string('MAC', 15);
        	
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
        Schema::dropIfExists('eletronicos');
    }
}
