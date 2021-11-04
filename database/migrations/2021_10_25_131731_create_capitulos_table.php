<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCapitulosTable extends Migration
{
    public function up()
    {
        Schema::create('capitulos', function (Blueprint $table) {
            $table->id();
            $table->integer('capitulo');
            $table->string('titulo');
            $table->string('slug');
            $table->text('descricao');
            $table->string('link');

            $table->string('status');

            $table->dateTime('lancamento_at')->nullable();
            $table->foreignId('temporada_id')->constrained('temporadas');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('capitulos');
    }
}
