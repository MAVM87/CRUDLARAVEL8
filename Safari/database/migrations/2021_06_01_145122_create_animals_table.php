<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id('id_animal');

            $table->String('Nombre');
            $table->String('Familia');
            $table->String('Genero');
            $table->String('Foto');
            $table->unsignedBigInteger('recintos_id');
            $table->foreign('recintos_id')
            ->references('id_recinto')
            ->on('recintos');
            
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
        Schema::dropIfExists('animals');
    }
}
