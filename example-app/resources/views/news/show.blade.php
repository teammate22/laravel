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

        @if($article->full_image)
            <div class="text-center mb-4">
                <img src="{{ $article->full_image }}"
                     alt="{{ $article->title }}"
                     class="img-fluid rounded">
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
@endsection
