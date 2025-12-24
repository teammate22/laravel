<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserCommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;

// Главная и статические страницы
Route::get('/', [MainController::class, 'index'])->name('home');
Route::view('/about', 'about')->name('about');
Route::get('/contacts', [MainController::class, 'contacts'])->name('contacts');
Route::get('/gallery/{id}', [MainController::class, 'gallery'])->name('gallery');

// Статьи (используем route model binding: {article})
Route::get('/news', [ArticleController::class, 'index'])->name('news.index');
Route::get('/news/create', [ArticleController::class, 'create'])->name('news.create');
Route::post('/news', [ArticleController::class, 'store'])->name('news.store');
Route::get('/news/{article}', [ArticleController::class, 'show'])->name('news.show');
Route::get('/news/{article}/edit', [ArticleController::class, 'edit'])->name('news.edit');
Route::put('/news/{article}', [ArticleController::class, 'update'])->name('news.update');
Route::delete('/news/{article}', [ArticleController::class, 'destroy'])->name('news.destroy');

// Аутентификация — гостевые страницы
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Выход
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Защищённые маршруты (для авторизованных пользователей)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', fn () => view('profile'))->name('profile');

    // Комментарии (создание / удаление пользователем)
    Route::post('/news/{article}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    Route::get('/my-comments', [UserCommentController::class, 'myComments'])->name('my.comments');
});

// Модерация — только для пользователей с разрешением manage-comments
Route::middleware(['can:manage-comments'])->group(function () {
    Route::get('/comments/moderation', [CommentController::class, 'moderationIndex'])->name('comments.moderation');
    Route::post('/comments/{comment}/approve', [CommentController::class, 'approve'])->name('comments.approve');
    Route::post('/comments/{comment}/reject', [CommentController::class, 'reject'])->name('comments.reject');
});

// Уведомления
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/notifications/read/{id}', [NotificationController::class, 'read'])->name('notifications.read');
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
});
