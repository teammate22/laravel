@extends('layouts.app')

@section('title', 'Новости')

@section('content')
    <h1 class="mb-4">Последние новости</h1>

    <div class="row">
        @foreach($articles as $article)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    @if($article->preview_image)
                        <img src="{{ $article->preview_image }}"
                             class="card-img-top"
                             alt="{{ $article->title }}"
                             style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text flex-grow-1">
                            {{ Str::limit($article->content, 150) }}
                        </p>
                        <div class="mt-auto">
                            <p class="text-muted small">
                                <strong>Автор:</strong> {{ $article->author }}<br>
                                <strong>Дата:</strong> {{ $article->created_at->format('d.m.Y') }}
                            </p>
                            <a href="{{ route('articles.show', $article->id) }}"
                               class="btn btn-primary btn-sm">
                                Читать далее
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if($articles->isEmpty())
        <div class="alert alert-info">
            Новости пока отсутствуют. Зайдите позже!
        </div>
    @endif
@endsection
