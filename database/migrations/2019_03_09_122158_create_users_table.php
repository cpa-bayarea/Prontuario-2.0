// This is a second migrate of project, users migrations.



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
           // $table->string('name');
            # Type of user.
           // $table->integer('id_perfil')->unsigned();
           // $table->foreign('id_perfil')->references('id_perfil')->on('tb_perfil');
           $table->char('status', 1)->default('A'); 
            // Options for this column => [A, I, P] Active, Inactive or Pendent
            $table->string('username', 100);
          //  $table->string('username', 11)->unique();
           // $table->timestamp('email_verified_at')->nullable();
             $table->string('password');
             
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
