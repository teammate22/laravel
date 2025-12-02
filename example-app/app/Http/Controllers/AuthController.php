<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Показать форму регистрации
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Обработка регистрации
     */
    public function register(Request $request)
    {
        // Валидация данных
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Создание пользователя
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Редирект на форму авторизации с сообщением
        return redirect()->route('login')
            ->with('success', 'Регистрация успешна! Теперь войдите в систему.');
    }

    /**
     * Показать форму авторизации
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Обработка авторизации
     */
    public function login(Request $request)
    {
        // Валидация данных
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Попытка аутентификации
        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            // Создание токена Sanctum
            $user = Auth::user();
            $token = $user->createToken('auth-token')->plainTextToken;

            // Сохранение токена в сессии
            session(['auth_token' => $token]);

            // Редирект на главную страницу
            return redirect()->intended('/');
        }

        // Если аутентификация не удалась
        return back()->withErrors([
            'email' => 'Неверные учетные данные.',
        ])->onlyInput('email');
    }

    /**
     * Выход из системы
     */
    public function logout(Request $request)
    {
        // Удаление токена Sanctum
        if (Auth::check()) {
            $user = Auth::user();
            $user->tokens()->delete(); // Удаляем все токены пользователя
        }

        // Завершение сессии
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Редирект на главную страницу
        return redirect('/');
    }
}
