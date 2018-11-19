<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManchetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manchetes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo')->nullable(true);
            $table->string('descricao')->nullable(true);
            $table->string('link')->nullable(true);
            $table->string('imagem')->nullable(true);
            $table->integer('temaId')->unsigned()->nullable(true);
            $table->foreign('temaId')->references('id')->on('tema_da_manchete')->onDelete('cascade');
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
        Schema::dropIfExists('manchetes');
    }
}
