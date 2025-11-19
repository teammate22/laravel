<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

// Главная страница через контроллер
Route::get('/', [MainController::class, 'index']);

// Старые маршруты (оставляем)
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

// Новый маршрут для галереи
Route::get('/gallery/{id}', [MainController::class, 'gallery'])->name('gallery');
