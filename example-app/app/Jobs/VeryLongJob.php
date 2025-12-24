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

class VeryLongJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $article;
    public $tries = 3;
    public $timeout = 120; // 2 минуты

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
        \Log::info("VeryLongJob started for article {$this->article->id}");

        // Имитация долгой задачи
        \Log::info("Step 1: Processing article data...");
        sleep(5);

        \Log::info("Step 2: Preparing email content...");
        sleep(5);

        // Находим модераторов
        $moderators = User::whereHas('roles', function ($query) {
            $query->where('slug', 'moderator');
        })->get();

        \Log::info("Step 3: Sending emails to {$moderators->count()} moderators...");

        foreach ($moderators as $moderator) {
            try {
                Mail::to($moderator->email)
                    ->send(new NewArticleNotification($this->article));

                \Log::info("Email sent to {$moderator->email}");
                sleep(2); // Имитация задержки

            } catch (\Exception $e) {
                \Log::error("Error sending to {$moderator->email}: " . $e->getMessage());
            }
        }

        \Log::info("VeryLongJob completed successfully!");
    }

    /**
     * Handle job failure.
     */
    public function failed(\Throwable $exception): void
    {
        \Log::error("VeryLongJob failed: " . $exception->getMessage());

        // Можно отправить уведомление администратору
        // Mail::to('admin@example.com')->send(new JobFailedNotification($this->article, $exception));
    }
}
