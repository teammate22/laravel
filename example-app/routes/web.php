<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;

Route::get('/news', [ArticleController::class, 'index'])->name('news.index');
Route::get('/news/create', [ArticleController::class, 'create'])->name('news.create');
Route::post('/news', [ArticleController::class, 'store'])->name('news.store');
Route::get('/news/{id}', [ArticleController::class, 'show'])->name('news.show');
Route::get('/news/{id}/edit', [ArticleController::class, 'edit'])->name('news.edit');
Route::put('/news/{id}', [ArticleController::class, 'update'])->name('news.update');
Route::delete('/news/{id}', [ArticleController::class, 'destroy'])->name('news.destroy');
Route::get('/', [MainController::class, 'index']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/contacts', function () {
    $contacts = [
        [
            'name' => 'Иван Иванов',
            'phone' => '+7 (999) 123-45-67',
            'email' => 'ivan@example.com'
        ],
        [
            'name' => 'Петр Петров',
            'phone' => '+7 (999) 765-43-21',
            'email' => 'petr@example.com'
        ],
        [
            'name' => 'Мария Сидорова',
            'phone' => '+7 (999) 555-55-55',
            'email' => 'maria@example.com'
        ]
    ];

    return view('contacts', ['contacts' => $contacts]);
});

Route::get('/gallery/{id}', [MainController::class, 'gallery'])->name('gallery');

Route::get('/signin', [AuthController::class, 'create'])->name('signin');
Route::post('/signin', [AuthController::class, 'registration'])->name('registration');

Route::get('/news', [ArticleController::class, 'index'])->name('news.index');
Route::get('/news/{id}', [ArticleController::class, 'show'])->name('news.show');

// Аутентификация
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Защищенные маршруты
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
});
