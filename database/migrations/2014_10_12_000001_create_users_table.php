<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tx_nome', 100);
            $table->string('username', 11)->unique();
            $table->char('status', 1)->default('P'); // Opções => [A, I, P] Ativo, Inativo or Pendente

            $table->integer('users_id')->unsigned()->nullable();
            $table->foreign('users_id')->references('id')->on('users');

            $table->string('nu_telefone', 15);
            $table->string('nu_celular', 15)->nullable();
            $table->string('tx_email', 100);
            $table->string('nu_semestre', 2)->nullable();
            $table->string('nu_crp', 7)->nullable();


            $table->integer('id_linha')->unsigned()->nullable();
            $table->foreign('id_linha')->references('id_linha_teorica')->on('tb_linha_teorica');

            $table->integer('id_perfil')->unsigned();
            $table->foreign('id_perfil')->references('id_perfil')->on('tb_perfil');

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 100);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

