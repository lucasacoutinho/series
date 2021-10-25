<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasSerieTable extends Migration
{
    public function up()
    {
        Schema::create('categorias_serie', function (Blueprint $table) {
            $table->id();
            $table->foreignId('serie_id')->constrained('series');
            $table->foreignId('categoria_id')->constrained('categorias');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categorias_serie');
    }
}
