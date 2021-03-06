<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->string('nome',50)->unique();
            $table->string('descricao',200)->nullable();
            $table->timestamps();
            
        });
        
        Schema::create('permission_roles', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->bigInteger('role_id')->unsigned();
            
            $table->foreign('role_id')
                ->references('id')
                ->on('roles');
            
            $table->bigInteger('permission_id')->unsigned();
            $table->foreign('permission_id')
                ->references('id')
                ->on('permissions');
            
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
        Schema::dropIfExists('permission_roles');
        Schema::dropIfExists('permissions');
    }
}
