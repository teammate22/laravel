<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="/">Example App</a>
                <div class="navbar-nav">
                    <a class="nav-link" href="/">Главная</a>
                    <a class="nav-link" href="/about">О нас</a>
                    <a class="nav-link" href="/contacts">Контакты</a>
                    <a class="nav-link" href="{{ route('news.index') }}">Новости</a>
                    @auth
                        <!-- Показать для авторизованных пользователей -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('profile') }}">Профиль</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Выйти</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <!-- Показать для гостей -->
                        <a class="nav-link" href="{{ route('login') }}">Войти</a>
                        <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                    @endauth
                </div>
            </div>
        </nav>
    </header>

    <main class="container py-4">
        @yield('content')
    </main>

    <footer class="bg-dark text-light py-3 mt-auto">
        <div class="container">
            Варушкин Тимофей, 241-3210
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
