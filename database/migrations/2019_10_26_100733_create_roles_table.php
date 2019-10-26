<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('nome',50);
            $table->string('descricao',200)->nullable();
            $table->timestamps();
            
        });
        
        Schema::create('role_users', function (Blueprint $table) {
            
            $table->increments('id');
            
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
                
            $table->integer('role_id')->unsigned();   
            $table->foreign('role_id')
                ->references('id')
                ->on('roles');
            
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
        Schema::dropIfExists('role_users');
        Schema::dropIfExists('roles');
    }
}
