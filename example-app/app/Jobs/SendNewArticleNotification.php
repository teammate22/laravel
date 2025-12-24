<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Article;
use App\Models\User;
use App\Mail\NewArticleNotification;
use Illuminate\Support\Facades\Mail;

class SendNewArticleNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $article;
    public $tries = 3; // Количество попыток
    public $timeout = 60; // Таймаут 60 секунд
    public $backoff = [10, 30, 60]; // Задержка между попытками (секунды)

    /**
     * Create a new job instance.
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        \Log::info("Job started: Sending notifications for article {$this->article->id}");

        // Находим всех модераторов
        $moderators = User::whereHas('roles', function ($query) {
            $query->where('slug', 'moderator');
        })->get();

        if ($moderators->isEmpty()) {
            \Log::warning("No moderators found for article notification");
            return;
        }

        $sentCount = 0;

        // Отправляем каждому модератору
        foreach ($moderators as $moderator) {
            try {
                Mail::to($moderator->email)
                    ->send(new NewArticleNotification($this->article));

                $sentCount++;
                \Log::info("Email sent to {$moderator->email}");

                // Небольшая задержка между отправками чтобы не спамить
                if ($moderators->count() > 1) {
                    sleep(1);
                }

            } catch (\Exception $e) {
                \Log::error("Failed to send email to {$moderator->email}: " . $e->getMessage());
                // Продолжаем отправку другим, не прерываем всю задачу
            }
        }

        \Log::info("Job completed: Sent {$sentCount} emails for article {$this->article->id}");
    }

    /**
     * Обработка неудачного выполнения
     */
    public function failed(\Throwable $exception): void
    {
        \Log::error("Job failed for article {$this->article->id}: " . $exception->getMessage());

        // Здесь можно отправить уведомление админу
        // или записать в специальный лог
    }
}
