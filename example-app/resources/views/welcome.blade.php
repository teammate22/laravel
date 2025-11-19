@extends('layouts.app')

@section('title', 'Главная - Наши статьи')

@section('content')
    <h1 class="mb-4">Наши статьи</h1>

    <div class="row">
        @foreach($articles as $article)
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article['name'] }}</h5>
                        <p class="card-text">
                            @if(isset($article['shortDesc']))
                                {{ $article['shortDesc'] }}
                            @else
                                {{ Str::limit($article['desc'], 100) }}
                            @endif
                        </p>
                        <p class="text-muted">
                            <small>Дата: {{ $article['date'] }}</small>
                        </p>
                    </div>

                    <!-- Preview image как ссылка на галерею -->
                    <div class="card-img-bottom text-center p-3">
                        <a href="{{ route('gallery', $article['id']) }}">
                            @if($article['preview_exists'])
                                <img src="{{ asset($article['preview_image']) }}"
                                     alt="{{ $article['name'] }}"
                                     class="img-fluid rounded"
                                     style="max-height: 200px; object-fit: cover;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center rounded"
                                     style="height: 200px;">
                                    <span class="text-muted">Изображение не найдено: {{ $article['preview_image'] }}</span>
                                </div>
                            @endif
                        </a>
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('gallery', $article['id']) }}" class="btn btn-primary btn-sm">
                            Читать полностью
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
