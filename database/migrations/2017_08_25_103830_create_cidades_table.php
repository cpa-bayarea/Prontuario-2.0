<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cidades', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('estado_id')->unsigned();
            #$table->foreign('state_id')->references('id')->on('states');
            $table->string('title');
            $table->integer('iso');
            $table->integer('iso_ddd');
            $table->integer('status');
            $table->string('slug');
            $table->integer('population');
            $table->decimal('lat', 12, 8);
            $table->decimal('long', 12, 8);
            $table->decimal('income_per_capita', 8, 2);


        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cidades');
    }
}
