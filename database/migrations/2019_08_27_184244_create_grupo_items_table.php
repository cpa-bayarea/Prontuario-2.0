<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrupoItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tx_nome_item_grupo',255);
            $table->string('tx_outro',255);
            $table->unsignedBigInteger('id_grupo');
            $table->foreign('id_grupo')->references('id')->on('grupos');
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
        Schema::dropIfExists('grupo_items');
    }
}
