<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    /**
     * Список комментариев на модерации (только для модераторов)
     */
    public function moderationIndex()
    {
        // Проверка прав
        if (! Gate::allows('manage-comments')) {
            abort(403, 'У вас нет прав для модерации комментариев');
        }

        $pendingComments = Comment::with(['user', 'article'])
            ->pending()
            ->latest()
            ->paginate(10);

        return view('comments.moderation', compact('pendingComments'));
    }

    /**
     * Сохранить новый комментарий (с статусом "на модерации")
     */
    public function store(Request $request, $articleId)
    {
        if (! auth()->check()) {
            return redirect()->route('login')
                ->with('error', 'Войдите, чтобы оставлять комментарии');
        }

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
        $comment->status = Comment::STATUS_PENDING; // По умолчанию на модерации
        $comment->save();

        return redirect()->route('news.show', $article->id)
            ->with('success', 'Комментарий добавлен и ожидает модерации!');
    }

    /**
     * Одобрить комментарий
     */
    public function approve($id)
    {
        $comment = Comment::findOrFail($id);

        if (! Gate::allows('manage-comments')) {
            abort(403, 'У вас нет прав для модерации комментариев');
        }

        $comment->status = Comment::STATUS_APPROVED;
        $comment->moderated_by = auth()->id();
        $comment->moderated_at = now();
        $comment->save();

        return redirect()->route('comments.moderation')
            ->with('success', 'Комментарий одобрен и теперь виден на сайте.');
    }

    /**
     * Отклонить комментарий
     */
    public function reject(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        if (! Gate::allows('manage-comments')) {
            abort(403, 'У вас нет прав для модерации комментариев');
        }

        $validated = $request->validate([
            'rejection_reason' => 'required|string|max:255',
            'rejection_note' => 'nullable|string|max:500',
        ]);

        $comment->status = Comment::STATUS_REJECTED;
        $comment->moderated_by = auth()->id();
        $comment->moderated_at = now();

        // Формируем полное сообщение с причиной
        $fullReason = $validated['rejection_reason'];
        if (! empty($validated['rejection_note'])) {
            $fullReason .= ': '.$validated['rejection_note'];
        }

        $comment->rejection_reason = $fullReason;
        $comment->save();

        return redirect()->route('comments.moderation')
            ->with('success', 'Комментарий отклонён. Пользователь уведомлён о причине.');
    }

    /**
     * Удалить комментарий (полное удаление)
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        if (! Gate::allows('manage-comments')) {
            abort(403, 'У вас нет прав для удаления комментариев');
        }

        $articleId = $comment->article_id;
        $comment->delete();

        return redirect()->route('news.show', $articleId)
            ->with('success', 'Комментарий успешно удалён.');
    }
}
