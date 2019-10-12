<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriagemItensGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('triagem_itens_grupos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('outro', 30)->nullable();

            $table->unsignedBigInteger('grupo_items_id');
            $table->foreign('grupo_items_id')->references('id')->on('grupo_items');

            $table->unsignedBigInteger('triagems_id');
            $table->foreign('triagems_id')->references('id')->on('triagems');

            
            $table->softDeletes();
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
        Schema::dropIfExists('triagem_itens_grupos');
    }
}
