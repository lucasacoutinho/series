<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Categorias\CategoriaController;

Route::apiResource('categorias', CategoriaController::class);
