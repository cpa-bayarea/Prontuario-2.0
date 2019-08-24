<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {

            $table->increments('id');
            $table->string('nome');
            $table->string('nome_social')->nullable();
            $table->string('nome_responsavel')->nullable();
            $table->date('data_nascimento');
            $table->string('cpf',14)->unique();
            $table->string('rg')->nullable();
            $table->string('endereco');
            $table->string('email');
            $table->integer('cidade_id')->unsigned();
            $table->foreign('cidade_id')->references('id')->on('cities');
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
        Schema::dropIfExists('pacientes');
    }
}
