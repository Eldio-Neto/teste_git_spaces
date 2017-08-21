<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipamentos', function (Blueprint $table) {
        	$table->increments('id');
        	$table->string('Marca', 45);
        	$table->string('Modelo', 45);
        	$table->string('Mac', 45);
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
        Schema::dropIfExists('equipamentos');
    }
}
