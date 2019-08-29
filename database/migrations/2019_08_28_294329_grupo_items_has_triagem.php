<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GrupoItemsHasTriagem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo_items_has_triagems', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('id_triagem');
            $table->foreign('id_triagem')->references('id')->on('triagems');
           
            $table->unsignedBigInteger('id_grupo_item');
            $table->foreign('id_grupo_item')->references('id')->on('grupo_items');
           
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
        //
    }
}
