@extends('layouts.app')

@section('title', 'Мои комментарии')

@section('content')
<div class="container mt-4">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('news.index') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('profile') }}">Профиль</a></li>
            <li class="breadcrumb-item active">Мои комментарии</li>
        </ol>
    </nav>

    <h1 class="mb-4">Мои комментарии</h1>

    <!-- Отклонённые комментарии -->
    <div class="card mb-4 border-danger">
        <div class="card-header bg-danger text-white">
            <h5 class="mb-0">
                <i class="bi bi-x-circle"></i> Отклонённые комментарии
                <span class="badge bg-light text-danger">{{ $rejectedComments->total() }}</span>
            </h5>
        </div>
        <div class="card-body">
            @if($rejectedComments->isEmpty())
                <p class="text-muted mb-0">Нет отклонённых комментариев</p>
            @else
                <div class="list-group">
                    @foreach($rejectedComments as $comment)
                        <div class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong>Статья:</strong>
                                    <a href="{{ route('news.show', $comment->article_id) }}">
                                        {{ $comment->article->title }}
                                    </a>
                                    <br>
                                    <small class="text-muted">
                                        {{ $comment->created_at->format('d.m.Y H:i') }} |
                                        Отклонено: {{ $comment->moderated_at->format('d.m.Y H:i') }}
                                    </small>
                                </div>
                            </div>
                            <p class="mt-2 mb-1"><strong>Ваш комментарий:</strong> {{ $comment->content }}</p>

                            @if($comment->rejection_reason)
                                <div class="alert alert-danger mt-2 mb-0 py-2">
                                    <strong><i class="bi bi-exclamation-triangle"></i> Причина отклонения:</strong><br>
                                    {{ $comment->rejection_reason }}
                                </div>
                            @else
                                <div class="alert alert-warning mt-2 mb-0 py-2">
                                    <i class="bi bi-info-circle"></i> Комментарий отклонён модератором без указания причины
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>

                <div class="mt-3">
                    {{ $rejectedComments->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>

    <!-- Комментарии на модерации -->
    <div class="card border-warning">
        <div class="card-header bg-warning text-dark">
            <h5 class="mb-0">
                <i class="bi bi-clock"></i> Комментарии на модерации
                <span class="badge bg-light text-warning">{{ $pendingComments->total() }}</span>
            </h5>
        </div>
        <div class="card-body">
            @if($pendingComments->isEmpty())
                <p class="text-muted mb-0">Нет комментариев на модерации</p>
            @else
                <div class="list-group">
                    @foreach($pendingComments as $comment)
                        <div class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong>Статья:</strong>
                                    <a href="{{ route('news.show', $comment->article_id) }}">
                                        {{ $comment->article->title }}
                                    </a>
                                    <br>
                                    <small class="text-muted">
                                        Отправлен: {{ $comment->created_at->format('d.m.Y H:i') }}
                                    </small>
                                </div>
                                <span class="badge bg-warning text-dark">
                                    <i class="bi bi-hourglass-split"></i> На проверке
                                </span>
                            </div>
                            <p class="mt-2 mb-0">{{ $comment->content }}</p>
                        </div>
                    @endforeach
                </div>

                <div class="mt-3">
                    {{ $pendingComments->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
