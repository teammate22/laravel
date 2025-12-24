<?php

namespace App\Notifications;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\DatabaseMessage;

class NewArticleNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected Article $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    // Каналы уведомлений (в нашем случае только база)
    public function via($notifiable)
    {
        return ['database'];
    }

    // Данные, которые сохраняются в таблице notifications
    public function toDatabase($notifiable)
    {
        return [
            'article_id' => $this->article->id,
            'title' => $this->article->title,
            'author' => $this->article->author,
        ];
    }
}
