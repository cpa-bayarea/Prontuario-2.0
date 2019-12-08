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
            $table->string('tx_email')->nullable();
            $table->string('nu_cep', 10);
            $table->char('tx_uf', 2);
            $table->string('tx_logradouro', 200)->nullable();
            $table->string('tx_complemento', 200)->nullable();
            $table->string('tx_bairro', 70)->nullable();
            $table->string('tx_localidade', 50)->nullable();

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
