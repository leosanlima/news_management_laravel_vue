<?php

use App\Http\Controllers\Api\NewsController;
use Illuminate\Support\Facades\Route;


// Route para busca
Route::get('news/search', [NewsController::class, 'search'])->name('news.search');

// Rota para listar todas as notícias
Route::get('news', [NewsController::class, 'index']);

// Rota para detalhes de uma notícia específica
Route::get('news/{id}', [NewsController::class, 'show']);