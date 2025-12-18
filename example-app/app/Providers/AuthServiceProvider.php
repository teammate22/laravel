<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // Регистрируем политику для модели Article
        \App\Models\Article::class => \App\Policies\ArticlePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Gate::before - возвращаем null для продолжения
        Gate::before(function (User $user, $ability) {
            // Если пользователь модератор И ability не 'create-comment' - разрешаем
            if ($user->hasRole('moderator') && $ability !== 'create-comment') {
                return true;
            }

            // Возвращаем null чтобы продолжить проверку другими Gates
            return null;
        });

        // Теперь этот Gate будет вызываться для 'create-comment'
        Gate::define('create-comment', function (User $user) {
            return $user->hasAnyRole(['reader', 'moderator']);
        });

        // Шлюз для проверки роли читателя
        Gate::define('is-reader', function (User $user) {
            return $user->hasRole('reader');
        });

        // Шлюз для проверки роли модератора
        Gate::define('is-moderator', function (User $user) {
            return $user->hasRole('moderator');
        });

        // Шлюз для управления комментариями
        Gate::define('manage-comments', function (User $user) {
            // Только модератор может управлять комментариями
            return $user->hasRole('moderator');
        });
    }
}
