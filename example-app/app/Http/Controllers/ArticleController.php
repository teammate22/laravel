<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        // Пагинация - 6 статей на страницу
        $news = Article::published()
            ->latest()
            ->paginate(6);

        return view('news.index', compact('news'));
    }

    public function show($id)
    {
        $article = Article::published()->findOrFail($id);
        return view('news.show', compact('article'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        // Валидация данных
        $validated = $request->validate([
            'title' => 'required|string|min:5|max:255',
            'content' => 'required|string|min:10',
            'author' => 'required|string|max:100',
            'preview_image' => 'nullable|url',
            'full_image' => 'nullable|url',
            'is_published' => 'boolean'
        ]);

        // Создание статьи
        Article::create($validated);

        return redirect()->route('news.index')
            ->with('success', 'Статья успешно создана!');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('news.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        // Валидация данных
        $validated = $request->validate([
            'title' => 'required|string|min:5|max:255',
            'content' => 'required|string|min:10',
            'author' => 'required|string|max:100',
            'preview_image' => 'nullable|url',
            'full_image' => 'nullable|url',
            'is_published' => 'boolean'
        ]);

        // Обновление статьи
        $article->update($validated);

        return redirect()->route('news.index')
            ->with('success', 'Статья успешно обновлена!');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('news.index')
            ->with('success', 'Статья успешно удалена!');
    }
}
