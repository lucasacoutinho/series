<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiosTable extends Migration
{
    public function up()
    {
        Schema::create('estudios', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('slug');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('estudios');
    }
}
