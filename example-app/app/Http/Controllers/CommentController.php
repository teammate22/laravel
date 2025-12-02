<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function store(Request $request, $articleId)
    {
        // Проверяем шлюз для создания комментариев
        if (! Gate::allows('create-comment')) {
            return redirect()->back()
                ->with('error', 'У вас нет прав для создания комментариев');
        }

        $validated = $request->validate([
            'content' => 'required|string|min:3|max:1000',
        ]);

        $article = Article::findOrFail($articleId);

        $comment = new Comment($validated);
        $comment->user_id = auth()->id();
        $comment->article_id = $article->id;
        $comment->save();

        return redirect()->route('news.show', $article->id)
            ->with('success', 'Комментарий успешно добавлен!');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        // Проверяем шлюз для управления комментариями
        if (! Gate::allows('manage-comment')) {
            return redirect()->back()
                ->with('error', 'У вас нет прав для создания комментариев');
        }

        $articleId = $comment->article_id;
        $comment->delete();

        return redirect()->route('news.show', $articleId)
            ->with('success', 'Комментарий успешно удален!');
    }
}
