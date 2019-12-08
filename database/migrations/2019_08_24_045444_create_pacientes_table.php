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
            $table->string('tx_nome');
            $table->string('tx_nome_social')->nullable();
            $table->string('tx_nome_responsavel')->nullable();
            $table->date('dt_nascimento');
            $table->string('nu_cpf',14)->unique();
            $table->string('nu_rg', 15);
            $table->string('tx_endereco')->nullable();
            $table->string('tx_email')->nullable();

            $table->integer('cidade_id')->unsigned()->nullable();
            $table->foreign('cidade_id')->references('id')->on('cities');

            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('status_de_cadastros');

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
