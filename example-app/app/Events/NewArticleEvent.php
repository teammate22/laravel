<?php

namespace App\Events;

use App\Models\Article;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Queue\SerializesModels;

class NewArticleEvent implements ShouldBroadcastNow
{
    use SerializesModels;

    public $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function broadcastOn(): Channel
    {
        return new Channel('test');
    }

    public function broadcastWith(): array
    {
        return [
            'id' => $this->article->id,
            'title' => $this->article->title,
        ];
    }
}
