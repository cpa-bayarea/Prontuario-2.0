<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('triagems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('triador', 100);
            $table->string('supervisor', 100);
            $table->text('queixa_principal');
            $table->string('atendimento', 100);
            $table->string('grupo', 100);
            $table->string('outro', 100)->nullable();
            $table->string('temporario', 100);
            // Paciente
            $table->unsignedBigInteger('id_pacientes');
            $table->foreign('id_pacientes')->references('id')->on('pacientes');
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
        Schema::dropIfExists('triagems');
    }
}
