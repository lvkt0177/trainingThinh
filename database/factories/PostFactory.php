<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
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
            //
            'user_id' => fake()->numberBetween(1,3),
            'title' => fake()->sentence(),
            'description' => fake()->sentence(),
            'content' => fake()->paragraph(),
            'publish_date' => fake()->dateTime('now')->format('Y-m-d H:i:s'),
            'status' => 0,
        ];
    }
}
