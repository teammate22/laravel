@extends('layouts.app')

@section('title', 'Новости')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Последние новости</h1>
        <a href="{{ route('news.create') }}" class="btn btn-success">
            + Создать статью
        </a>
    </div>

    <!-- Сообщения об успехе -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        @foreach ($news as $article)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    @if ($article->preview_image)
                        <img src="{{ $article->preview_image }}" class="card-img-top" alt="{{ $article->title }}"
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
                                <strong>Дата:</strong> {{ $article->created_at->format('d.m.Y') }}<br>
                                <strong>Статус:</strong>
                                <span class="badge {{ $article->is_published ? 'bg-success' : 'bg-warning' }}">
                                    {{ $article->is_published ? 'Опубликовано' : 'Черновик' }}
                                </span>
                            </p>
                            <div class="btn-group w-100">
                                <a href="{{ route('news.show', $article->id) }}"
                                    class="btn btn-primary btn-sm">Читать</a>
                                <a href="{{ route('news.edit', $article->id) }}"
                                    class="btn btn-warning btn-sm">Редактировать</a>
                                <form action="{{ route('news.destroy', $article->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Удалить статью?')">
                                        Удалить
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Пагинация-->
    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <!-- Стрелка "Назад" -->
                @if ($news->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">&laquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $news->previousPageUrl() }}" rel="prev">&laquo;</a>
                    </li>
                @endif

                <!-- Номера страниц -->
                @foreach ($news->getUrlRange(1, $news->lastPage()) as $page => $url)
                    @if ($page == $news->currentPage())
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach

                <!-- Стрелка "Вперед" -->
                @if ($news->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $news->nextPageUrl() }}" rel="next">&raquo;</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link">&raquo;</span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>

    @if ($news->isEmpty())
        <div class="alert alert-info">
            Новости пока отсутствуют.
            <a href="{{ route('news.create') }}">Создайте первую статью!</a>
        </div>
    @endif
@endsection
