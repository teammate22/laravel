<?php

use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\AuthController;
use Illuminate\Support\Facades\Route;

// Аутентификация
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Статьи
Route::get('/news', [ArticleController::class, 'index']);
Route::get('/news/{article}', [ArticleController::class, 'show']);

// Методы, требующие авторизацию
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/news', [ArticleController::class, 'store']);
    Route::put('/news/{article}', [ArticleController::class, 'update']);
    Route::delete('/news/{article}', [ArticleController::class, 'destroy']);
});
