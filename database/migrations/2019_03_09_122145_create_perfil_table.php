<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_perfil', function (Blueprint $table) {
            $table->increments('id_perfil');
            $table->string('tx_name', '30');
            $table->string('tx_desc', '100')->nullable();
            $table->enum('status', ['A', 'I'])->default('A');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_perfil');
    }
}
