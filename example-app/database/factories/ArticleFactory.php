<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(6),
            'content' => $this->faker->paragraphs(3, true),
            'author' => $this->faker->name(),
            'preview_image' => $this->faker->imageUrl(400, 300, 'nature', true),
            'full_image' => $this->faker->imageUrl(800, 600, 'nature', true),
            'is_published' => $this->faker->boolean(90), // 90% chance of being published
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
