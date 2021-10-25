<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('capitulos');
    }
}
