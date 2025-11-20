@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Регистрация</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('registration') }}">
                            @csrf <!-- CSRF токен для защиты -->

                            <!-- Поле: Имя -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Имя</label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       id="name"
                                       name="name"
                                       value="{{ old('name') }}"
                                       required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Поле: Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       id="email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Поле: Пароль -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Пароль</label>
                                <input type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       id="password"
                                       name="password"
                                       required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- После поля password добавляем: -->
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Подтверждение пароля</label>
                                <input type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                id="password_confirmation"
                                name="password_confirmation"
                                required>
                            </div>

                            <!-- Кнопка отправки -->
                            <button type="submit" class="btn btn-primary w-100">Зарегистрироваться</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
