@extends('layouts.app')

@section('title', 'Редактирование статьи: ' . $article->title)

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('news.index') }}">Новости</a></li>
                <li class="breadcrumb-item active">Редактирование</li>
            </ol>
        </nav>

        <h1 class="mb-4">Редактирование статьи</h1>

        <form action="{{ route('news.update', $article->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Заголовок *</label>
                <input type="text"
                       class="form-control @error('title') is-invalid @enderror"
                       id="title"
                       name="title"
                       value="{{ old('title', $article->title) }}"
                       required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Содержание *</label>
                <textarea class="form-control @error('content') is-invalid @enderror"
                          id="content"
                          name="content"
                          rows="10"
                          required>{{ old('content', $article->content) }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Автор *</label>
                <input type="text"
                       class="form-control @error('author') is-invalid @enderror"
                       id="author"
                       name="author"
                       value="{{ old('author', $article->author) }}"
                       required>
                @error('author')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="preview_image" class="form-label">Preview изображение (URL)</label>
                    <input type="url"
                           class="form-control @error('preview_image') is-invalid @enderror"
                           id="preview_image"
                           name="preview_image"
                           value="{{ old('preview_image', $article->preview_image) }}">
                    @error('preview_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="full_image" class="form-label">Full изображение (URL)</label>
                    <input type="url"
                           class="form-control @error('full_image') is-invalid @enderror"
                           id="full_image"
                           name="full_image"
                           value="{{ old('full_image', $article->full_image) }}">
                    @error('full_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox"
                       class="form-check-input"
                       id="is_published"
                       name="is_published"
                       value="1"
                       {{ old('is_published', $article->is_published) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_published">
                    Опубликована
                </label>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-warning">Обновить статью</button>
                <a href="{{ route('news.index') }}" class="btn btn-secondary">Отмена</a>
            </div>
        </form>
    </div>
@endsection
