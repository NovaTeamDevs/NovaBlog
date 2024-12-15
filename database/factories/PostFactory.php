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
            'title' => $this->faker->title,
            'content' => $this->faker->text(350),
            'user_id' => 1,
            'category_id' => $this->faker->randomElement(Category::all()),
            'status' => $this->faker->randomElement(['published', 'draft', 'pending'])
        ];
    }
}
