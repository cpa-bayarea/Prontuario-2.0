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
           
            $table->text('queixa_principal');

            $table->unsignedBigInteger('alunos_id');
            $table->foreign('alunos_id')->references('id')->on('tb_aluno'); //trocar pelasmodificações do douglas

            $table->unsignedBigInteger('supervisors_id');
            $table->foreign('supervisors_id')->references('id')->on('tb_supervisor'); //trocar pelasmodificações do douglas

            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes');


            $table->softDeletes();
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
        Schema::dropIfExists('triagems');
    }
}
