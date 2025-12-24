<?php

namespace App\Http\Controllers\API;

use App\Jobs\SendNewArticleNotification;
use App\Jobs\VeryLongJob;
use App\Models\Article;
use App\Models\User;
use App\Notifications\NewArticleNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        $page = request()->get('page', 1);
        $cacheKey = "articles_page_{$page}";

        $articles = Cache::remember($cacheKey, 60, function () {
            return Article::published()
                ->latest()
                ->paginate(6);
        });

        return response()->json($articles);
    }

    public function show($id)
    {
        $cacheKey = "article_{$id}";

        $article = Cache::rememberForever($cacheKey, function () use ($id) {
            return Article::published()
                ->with('comments.user')
                ->findOrFail($id);
        });

        return response()->json($article);
    }

    public function create()
    {
        if (! Gate::allows('create', Article::class)) {
            return response()->json(['error' => 'У вас нет прав для создания статей'], 403);
        }

        return response()->json(['message' => 'Создание статьи разрешено']);
    }

    public function store(Request $request)
    {
        if (! Gate::allows('create', Article::class)) {
            return response()->json(['error' => 'У вас нет прав для создания статей'], 403);
        }

        $validated = $request->validate([
            'title' => 'required|string|min:5|max:255',
            'content' => 'required|string|min:10',
            'author' => 'required|string|max:100',
            'preview_image' => 'nullable|url',
            'full_image' => 'nullable|url',
            'is_published' => 'boolean',
        ]);

        $article = Article::create($validated);
        event(new \App\Events\NewArticleEvent($article));

        // Очищаем кэш для всех страниц статей
        $totalPages = ceil(Article::published()->count() / 6);
        for ($i = 1; $i <= $totalPages; $i++) {
            Cache::forget("articles_page_{$i}");
        }

        $users = User::where('id', '!=', auth()->id())->get();
        Notification::sendNow($users, new NewArticleNotification($article));

        SendNewArticleNotification::dispatch($article)
            ->delay(now()->addSeconds(5))
            ->onQueue('emails');

        return response()->json([
            'message' => 'Статья успешно создана! Email отправлен модераторам.',
            'article' => $article
        ], 201);
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);

        if (! Gate::allows('update', $article)) {
            return response()->json(['error' => 'У вас нет прав для редактирования этой статьи'], 403);
        }

        return response()->json($article);
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        if (! Gate::allows('update', $article)) {
            return response()->json(['error' => 'У вас нет прав для редактирования этой статьи'], 403);
        }

        $validated = $request->validate([
            'title' => 'required|string|min:5|max:255',
            'content' => 'required|string|min:10',
            'author' => 'required|string|max:100',
            'preview_image' => 'nullable|url',
            'full_image' => 'nullable|url',
            'is_published' => 'boolean',
        ]);

        $article->update($validated);

        Cache::forget("article_{$id}");
        Cache::flush();

        return response()->json([
            'message' => 'Статья успешно обновлена!',
            'article' => $article
        ]);
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        if (! Gate::allows('delete', $article)) {
            return response()->json(['error' => 'У вас нет прав для удаления этой статьи'], 403);
        }

        $article->delete();

        Cache::forget("article_{$id}");
        Cache::flush();

        return response()->json(['message' => 'Статья успешно удалена!']);
    }
}
