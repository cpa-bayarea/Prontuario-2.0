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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('username', 11); // Matrícula
            $table->string('nu_telefone', 15);
            $table->string('nu_celular', 15)->nullable();
            $table->char('active', 1)->default('P');# Opções => [A, I, P] Ativo, Inativo or Pendente
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->index(['id', 'username']);
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
