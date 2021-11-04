<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiosSerieTable extends Migration
{
    public function up()
    {
        Schema::create('estudios_serie', function (Blueprint $table) {
            $table->id();
            $table->foreignId('serie_id')->constrained('series');
            $table->foreignId('estudio_id')->constrained('estudios');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('estudios_serie');
    }
}
