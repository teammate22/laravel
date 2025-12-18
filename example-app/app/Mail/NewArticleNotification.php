<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Article;

class NewArticleNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $article; // Public свойство будет доступно в шаблоне

    /**
     * Create a new message instance.
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Новая статья: ' . $this->article->title,
            from: config('mail.from.address'), // Используем из конфигурации
            to: 'moderator@example.com', // Можно настроить получателя
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.new-article', // Blade шаблон
            text: 'emails.new-article-text', // Добавляем text версию
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
