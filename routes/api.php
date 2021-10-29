<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Autor\AutorController;
use App\Http\Controllers\Serie\SerieController;
use App\Http\Controllers\Estudio\EstudioController;
use App\Http\Controllers\Categoria\CategoriaController;

Route::apiResource('categorias', CategoriaController::class);
Route::apiResource('series', SerieController::class)->parameters(['series' => 'serie']);
Route::apiResource('estudios', EstudioController::class)->parameters(['estudios' => 'estudio']);
Route::apiResource('autores', AutorController::class)->parameters(['autores' => 'autor']);
