<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Autor\AutorController;
use App\Http\Controllers\Serie\SerieController;
use App\Http\Controllers\Estudio\EstudioController;
use App\Http\Controllers\Categoria\CategoriaController;
use App\Http\Controllers\Temporada\SerieTemporadaController;
use App\Http\Controllers\Capitulo\TemporadaCapituloController;

Route::name('auth.')->prefix('auth')->group(function () {
    Route::post('login',   [AuthController::class, 'login'])->name('login');
    Route::post('logout',  [AuthController::class, 'logout'])->name('logout');
    Route::post('refresh', [AuthController::class, 'refresh'])->name('refresh');
    Route::post('me',      [AuthController::class, 'me'])->name('me');
});

Route::apiResource('categorias', CategoriaController::class)->parameters(['categorias' => 'categoria']);
Route::apiResource('series', SerieController::class)->parameters(['series' => 'serie']);
Route::apiResource('estudios', EstudioController::class)->parameters(['estudios' => 'estudio']);
Route::apiResource('autores', AutorController::class)->parameters(['autores' => 'autor']);
Route::apiResource('serie.temporadas', SerieTemporadaController::class)->parameters(['temporadas' => 'temporada']);
Route::apiResource('temporada.capitulos', TemporadaCapituloController::class)->parameters(['temporada' => 'temporada', 'capitulos' => 'capitulo']);
