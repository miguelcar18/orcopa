<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('cedula')->unique();
            $table->date('inicio');
            $table->date('culminacion');
            $table->string('especialidad');
            $table->string('modulo')->nullable();
            $table->integer('tutor')->unsigned();
            $table->foreign('tutor')->references('id')->on('tutores')->onDelete('cascade');
            $table->integer('empresa')->unsigned();
            $table->foreign('empresa')->references('id')->on('empresas')->onDelete('cascade');
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
        Schema::dropIfExists('pasantes');
    }
}
