@extends('layouts.app')

@section('title', $article['name'])

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Главная</a></li>
                <li class="breadcrumb-item active">{{ $article['name'] }}</li>
            </ol>
        </nav>

        <article>
            <header class="mb-4">
                <h1>{{ $article['name'] }}</h1>
                <p class="text-muted">Опубликовано: {{ $article['date'] }}</p>
            </header>

            <!-- Full image -->
            <div class="text-center mb-4">
                @if($article['full_exists'])
                    <img src="{{ asset($article['full_image']) }}"
                         alt="{{ $article['name'] }}"
                         class="img-fluid rounded shadow"
                         style="max-height: 500px;">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center rounded"
                         style="height: 400px;">
                        <div class="text-center">
                            <h4 class="text-muted">Изображение не найдено</h4>
                            <p class="text-muted">Файл: {{ $article['full_image'] }}</p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Article content -->
            <div class="article-content">
                <p class="lead">{{ $article['shortDesc'] ?? '' }}</p>
                <div class="text-justify">
                    @foreach(explode("\n", $article['desc']) as $paragraph)
                        @if(trim($paragraph))
                            <p>{{ $paragraph }}</p>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ url('/') }}" class="btn btn-secondary">← Назад к статьям</a>
            </div>
        </article>
    </div>
@endsection
