<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('tx_nome', 100);
            $table->string('username', 11)->unique(); // Matrícula
            $table->string('nu_telefone', 15);
            $table->string('nu_celular', 15)->nullable();
            $table->string('nu_semestre', 2);
//            $table->char('status', 1)->default('P'); // Opções => [A, I, P] Ativo, Inativo or Pendente

            $table->unsignedBigInteger('supervisor_id');
            $table->foreign('supervisor_id')->references('id')->on('supervisores');
            $table->timestamps();
            $table->softDeletes();

//            $table->index(['id', 'username', 'nu_crp']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alunos');
    }
}
