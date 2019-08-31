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

            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('nome_social')->nullable();
            $table->string('nome_responsavel')->nullable();
            $table->date('data_nascimento');
            $table->string('cpf',14)->unique()->nullable();
            $table->string('rg')->nullable();
            $table->string('endereco')->nullable();
            $table->string('email')->nullable();

            $table->integer('cidade_id')->unsigned()->nullable();
            $table->foreign('cidade_id')->references('id')->on('cities');

            $table->unsignedBigInteger('id_status');
            $table->foreign('id_status')->references('id')->on('status_de_cadastros');
           
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
        Schema::dropIfExists('pacientes');
    }
}
