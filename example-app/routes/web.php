<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;

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
