<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemporadasTable extends Migration
{
    public function up()
    {
        Schema::create('temporadas', function (Blueprint $table) {
            $table->id();
            $table->integer('temporada');
            $table->string('descricao');
            $table->foreignId('serie_id')->constrained('series');

            $table->string('status');

            $table->dateTime('lancamento_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('temporadas');
    }
}
