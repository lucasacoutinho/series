<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapitulosTemporadaTable extends Migration
{
    public function up()
    {
        Schema::create('capitulos_temporada', function (Blueprint $table) {
            $table->id();
            $table->foreignId('temporada_id')->constrained('temporadas');
            $table->foreignId('capitulo_id')->constrained('capitulos');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('capitulos_temporada');
    }
}
