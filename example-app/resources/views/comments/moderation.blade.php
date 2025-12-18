@extends('layouts.app')

@section('title', 'Модерация комментариев')

@section('content')
    <div class="container mt-4">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('news.index') }}">Главная</a></li>
                <li class="breadcrumb-item active">Модерация комментариев</li>
            </ol>
        </nav>

        <h1 class="mb-4">Комментарии на модерации</h1>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($pendingComments->isEmpty())
            <div class="alert alert-info">
                Нет комментариев, ожидающих модерации. Отличная работа! 🎉
            </div>
        @else
            <div class="alert alert-warning">
                <i class="bi bi-hourglass-split"></i>
                {{ $pendingComments->total() }} комментариев ожидают проверки
            </div>

            <div class="list-group">
                @foreach ($pendingComments as $comment)
                    <div class="list-group-item">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <strong>{{ $comment->user->name ?? 'Аноним' }}</strong>
                                        <small class="text-muted ms-2">
                                            {{ $comment->created_at->format('d.m.Y H:i') }}
                                        </small>
                                    </div>
                                    <span class="badge bg-warning text-dark">
                                        <i class="bi bi-clock"></i> На модерации
                                    </span>
                                </div>

                                <p class="mt-2 mb-3">{{ $comment->content }}</p>

                                <div class="text-muted small">
                                    <strong>Статья:</strong>
                                    <a href="{{ route('news.show', $comment->article_id) }}">
                                        {{ Str::limit($comment->article->title, 50) }}
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3 border-top pt-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Форма ОДОБРЕНИЯ -->
                                    <form action="{{ route('comments.approve', $comment->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">
                                            <i class="bi bi-check-circle"></i> Одобрить
                                        </button>
                                    </form>

                                    <!-- Форма ОТКЛОНЕНИЯ с причиной -->
                                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="collapse"
                                        data-bs-target="#reject-form-{{ $comment->id }}">
                                        <i class="bi bi-x-circle"></i> Отклонить
                                    </button>
                                </div>

                                <div class="col-md-6 text-end">
                                    <!-- Кнопка УДАЛЕНИЯ (только для спама/нарушений) -->
                                    <button type="button" class="btn btn-danger btn-sm"
                                        onclick="if(confirm('ВНИМАНИЕ: Комментарий будет удалён БЕЗВОЗВРАТНО.\n\nУдалить только если это:\n- Спам\n- Нарушение правил\n- Личная информация')) {
                        document.getElementById('delete-form-{{ $comment->id }}').submit();
                    }">
                                        <i class="bi bi-trash"></i> Удалить (без уведомления)
                                    </button>
                                </div>
                            </div>

                            <!-- Скрытая форма для отклонения с причиной -->
                            <div class="collapse mt-2" id="reject-form-{{ $comment->id }}">
                                <form action="{{ route('comments.reject', $comment->id) }}" method="POST">
                                    @csrf
                                    <div class="card card-body">
                                        <h6><i class="bi bi-exclamation-triangle"></i> Отклонить комментарий</h6>
                                        <p class="text-muted small">
                                            Пользователь увидит причину отклонения в своём профиле
                                        </p>
                                        <div class="mb-2">
                                            <label class="form-label small">Причина отклонения:</label>
                                            <select name="rejection_reason" class="form-select form-select-sm">
                                                <option value="">Выберите причину...</option>
                                                <option value="Нарушение правил сообщества">Нарушение правил сообщества
                                                </option>
                                                <option value="Несоответствие теме статьи">Несоответствие теме статьи
                                                </option>
                                                <option value="Некорректное содержание">Некорректное содержание</option>
                                                <option value="Повторный комментарий">Повторный комментарий</option>
                                                <option value="Другая причина">Другая причина</option>
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label small">Дополнительный комментарий:</label>
                                            <textarea name="rejection_note" class="form-control form-control-sm" rows="2"
                                                placeholder="Уточните причину (необязательно)"></textarea>
                                        </div>
                                        <div class="d-flex gap-2">
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-x-circle"></i> Отклонить с уведомлением
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary btn-sm"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#reject-form-{{ $comment->id }}">
                                                Отмена
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Скрытая форма для удаления -->
                            <form id="delete-form-{{ $comment->id }}"
                                action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="d-none">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="delete_reason" value="Удалено модератором без уведомления">
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Пагинация -->
            <div class="d-flex justify-content-center mt-4">
                {{ $pendingComments->links() }}
            </div>
        @endif
    </div>

    <script>
        function confirmReject(commentId) {
            if (confirm('Отклонить этот комментарий?')) {
                document.getElementById('reject-form-' + commentId).submit();
            }
        }
    </script>
@endsection
