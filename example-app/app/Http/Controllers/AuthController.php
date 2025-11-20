<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.signin');
    }

    public function registration(Request $request): JsonResponse
    {
        // Валидация данных
        $validated = $request->validate([
            'name' => 'required|string|max:255|min:2',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Если валидация прошла успешно, возвращаем JSON с данными
        return response()->json([
            'success' => true,
            'message' => 'Регистрация успешна!',
            'data' => [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password_length' => strlen($validated['password']),
            ],
            'received_at' => now()->toDateTimeString()
        ], 200);
    }
}
