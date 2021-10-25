<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoresSerieTable extends Migration
{
    public function up()
    {
        Schema::create('autores_serie', function (Blueprint $table) {
            $table->id();
            $table->foreignId('serie_id')->constrained('series');
            $table->foreignId('autor_id')->constrained('autores');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('autores_serie');
    }
}
