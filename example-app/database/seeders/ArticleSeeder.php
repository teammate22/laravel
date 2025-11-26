<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        // Создаем 20 фейковых статей
        Article::factory(20)->create();

        $this->command->info('20 articles created successfully!');
    }
}
