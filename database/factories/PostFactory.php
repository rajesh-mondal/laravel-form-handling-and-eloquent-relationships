<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'       => $this->faker->sentence(6),
            'content'     => $this->faker->paragraphs(3, true),
            'category_id' => Category::inRandomOrder()->first()->id,
            // 'image'       => $this->faker->imageUrl(480, 200, 'tech', true),
        ];
    }
}
