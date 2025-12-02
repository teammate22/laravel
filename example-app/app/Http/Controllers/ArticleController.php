<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Gate;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::published()
            ->latest()
            ->paginate(6);

        return view('news.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::published()
            ->with('comments.user')
            ->findOrFail($id);

        return view('news.show', compact('article'));
    }

    public function create()
    {
        if (!Gate::allows('create', Article::class)) {
            abort(403, 'У вас нет прав для создания статей');
        }

        return view('news.create');
    }

    public function store(Request $request)
    {
        if (!Gate::allows('create', Article::class)) {
            abort(403, 'У вас нет прав для создания статей');
        }

        $validated = $request->validate([
            'title' => 'required|string|min:5|max:255',
            'content' => 'required|string|min:10',
            'author' => 'required|string|max:100',
            'preview_image' => 'nullable|url',
            'full_image' => 'nullable|url',
            'is_published' => 'boolean'
        ]);

        Article::create($validated);

        return redirect()->route('news.index')
            ->with('success', 'Статья успешно создана!');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);

        if (!Gate::allows('update', $article)) {
            abort(403, 'У вас нет прав для редактирования этой статьи');
        }

        return view('news.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        if (!Gate::allows('update', $article)) {
            abort(403, 'У вас нет прав для редактирования этой статьи');
        }

        $validated = $request->validate([
            'title' => 'required|string|min:5|max:255',
            'content' => 'required|string|min:10',
            'author' => 'required|string|max:100',
            'preview_image' => 'nullable|url',
            'full_image' => 'nullable|url',
            'is_published' => 'boolean'
        ]);

        $article->update($validated);

        return redirect()->route('news.index')
            ->with('success', 'Статья успешно обновлена!');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        // ✅ Проверяем через Gate
        if (!Gate::allows('delete', $article)) {
            abort(403, 'У вас нет прав для удаления этой статьи');
        }

        $article->delete();

        return redirect()->route('news.index')
            ->with('success', 'Статья успешно удалена!');
    }
}
