@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('news.index') }}">Новости</a></li>
            <li class="breadcrumb-item active">{{ Str::limit($article->title, 50) }}</li>
        </ol>
    </nav>

    <article>
        <header class="mb-4">
            <h1>{{ $article->title }}</h1>
            <div class="text-muted mb-3">
                <strong>Автор:</strong> {{ $article->author }} |
                <strong>Опубликовано:</strong> {{ $article->created_at->format('d.m.Y H:i') }}
            </div>
        </header>

        @if ($article->full_image)
            <div class="text-center mb-4">
                <img src="{{ $article->full_image }}" alt="{{ $article->title }}" class="img-fluid rounded">
            </div>
        @endif

        <div class="article-content">
            {!! nl2br(e($article->content)) !!}
        </div>

        <div class="mt-5">
            <a href="{{ route('news.index') }}" class="btn btn-secondary">
                ← Назад к списку новостей
            </a>
        </div>
    </article>

    <!-- Комментарии -->
    <div class="mt-5">
        <h3>Комментарии</h3>

        <!-- Форма добавления комментария -->
        @auth
            @can('create-comment')
                <form action="{{ route('comments.store', $article->id) }}" method="POST" class="mb-4">
                    @csrf
                    <div class="mb-3">
                        <label for="content" class="form-label">Добавить комментарий</label>
                        <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form>
            @else
                <div class="alert alert-info">
                    Только читатели и модераторы могут оставлять комментарии
                </div>
            @endcan
        @else
            <div class="alert alert-warning">
                <a href="{{ route('login') }}">Войдите</a>, чтобы оставлять комментарии
            </div>
        @endauth

        <!-- Список комментариев -->
        @php
            $commentsCount = optional($article->comments)->count() ?? 0;
        @endphp

        @if ($commentsCount > 0)
            <div class="list-group">
                @foreach ($article->comments as $comment)
                    <div class="list-group-item">
                        <div class="d-flex justify-content-between">
                            <div>
                                <strong>{{ optional($comment->user)->name ?? 'Аноним' }}</strong>
                                <small class="text-muted">{{ $comment->created_at->format('d.m.Y H:i') }}</small>
                            </div>

                            <!-- Кнопка удаления комментария -->
                            @can('manage-comments')
                                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Удалить комментарий?')">
                                        Удалить
                                    </button>
                                </form>
                            @endcan
                        </div>
                        <p class="mt-2">{{ $comment->content }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-muted">Комментариев пока нет</p>
        @endif
    </div>
@endsection
