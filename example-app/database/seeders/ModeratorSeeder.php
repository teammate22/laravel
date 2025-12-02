<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class ModeratorSeeder extends Seeder
{
    public function run(): void
    {
        // Создаем пользователя-модератора
        $moderator = User::create([
            'name' => 'Модератор',
            'email' => 'moderator@example.com',
            'password' => bcrypt('password123'),
        ]);

        // Назначаем роль модератора
        $moderatorRole = Role::where('slug', 'moderator')->first();
        $moderator->roles()->attach($moderatorRole);

        $this->command->info('Модератор создан: moderator@example.com / password123');
    }
}
