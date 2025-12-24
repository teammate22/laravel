<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.ts'])
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
    <div id="app"></div>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="/">Example App</a>
                <div class="navbar-nav">
                    <a class="nav-link" href="/">Главная</a>
                    <a class="nav-link" href="/about">О нас</a>
                    <a class="nav-link" href="/contacts">Контакты</a>
                    <a class="nav-link" href="{{ route('news.index') }}">Новости</a>
                    @can('create', App\Models\Article::class)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('news.create') }}">
                                <i class="bi bi-plus-circle"></i> Создать статью
                            </a>
                        </li>
                    @endcan
                    @auth
                        @can('manage-comments')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('comments.moderation') }}">
                                    <i class="bi bi-shield-check"></i> Модерация
                                    @php
                                        $pendingCount = \App\Models\Comment::pending()->count();
                                    @endphp
                                    @if ($pendingCount > 0)
                                        <span class="badge bg-danger rounded-pill">{{ $pendingCount }}</span>
                                    @endif
                                </a>
                            </li>
                        @endcan
                        <!-- Показать для авторизованных пользователей -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('my.comments') }}">
                                <i class="bi bi-chat-text"></i> Мои комментарии
                                @php
                                    $myRejectedCount = auth()->user()->rejectedComments()->count();
                                @endphp
                                @if ($myRejectedCount > 0)
                                    <span class="badge bg-danger rounded-pill">{{ $myRejectedCount }}</span>
                                @endif
                            </a>
                        </li>

                        <!-- Notifications Dropdown -->
                        @php
                            $notifications = auth()->user()->unreadNotifications()->latest()->take(5)->get();
                            $unreadCount = auth()->user()->unreadNotifications()->count();
                        @endphp
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                Уведомления
                                @if ($unreadCount > 0)
                                    <span class="badge bg-danger rounded-pill">{{ $unreadCount }}</span>
                                @endif
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                @forelse($notifications as $notification)
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('news.show', ['article' => $notification->data['article_id']]) }}"
                                            onclick="event.preventDefault(); document.getElementById('mark-as-read-{{ $notification->id }}').submit();">
                                            {{ $notification->data['title'] }}
                                        </a>
                                        <form id="mark-as-read-{{ $notification->id }}"
                                            action="{{ route('notifications.read', $notification->id) }}" method="GET"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                @empty
                                    <li class="dropdown-item">Нет новых уведомлений</li>
                                @endforelse
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('notifications.index') }}">Все уведомления</a>
                                </li>
                            </ul>
                        </li>

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
