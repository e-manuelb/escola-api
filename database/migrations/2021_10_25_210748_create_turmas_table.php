<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turmas', function (Blueprint $table) {
            $table->id();
            $table->string('ano');
            $table->string('nivelDeEnsino');
            $table->string('serie');
            $table->string('turno');
            $table->unsignedBigInteger('id_escola');
            $table->timestamps();
        });

        Schema::table('turmas', function (Blueprint $table) {

            $table->foreign('id_escola')->references('id')->on('escolas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turma');
    }
}
