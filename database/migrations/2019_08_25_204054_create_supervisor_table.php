<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupervisorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nu_crp', 7)->unique();

            $table->unsignedBigInteger('linha_id');
            $table->foreign('linha_id')->references('id')->on('linhas_teoricas');

            $table->unsignedbiginteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
            $table->softDeletes();
            $table->index(['id', 'nu_crp']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supervisores');
    }
}
