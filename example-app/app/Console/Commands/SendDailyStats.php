<?php

namespace App\Console\Commands;

use App\Models\ArticleView;
use App\Models\Comment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendDailyStats extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'stats:daily';

    /**
     * The console command description.
     */
    protected $description = 'Отправка ежедневной статистики модераторам';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $today = Carbon::today();

        // 🔹 Количество просмотров статей за сегодня
        $viewsCount = ArticleView::whereDate('created_at', $today)->count();

        // 🔹 Количество комментариев за сегодня
        $commentsCount = Comment::whereDate('created_at', $today)->count();

        // 🔹 Получаем email всех модераторов
        $emails = User::whereHas('roles', function ($q) {
            $q->where('slug', 'moderator');
        })->pluck('email')->toArray();

        if (count($emails) === 0) {
            $this->warn('Модераторы не найдены.');

            return Command::SUCCESS;
        }

        Mail::raw(
            "Статистика за {$today->format('d.m.Y')}:\n\n".
            "Просмотров статей: {$viewsCount}\n".
            "Новых комментариев: {$commentsCount}",
            function ($message) use ($emails) {
                $message->to($emails)
                    ->subject('Ежедневная статистика сайта');
            }
        );

        $this->info('Статистика успешно отправлена модераторам.');

        return Command::SUCCESS;
    }
}
