<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Honorific>
 */
class HonorificFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->title(), // Random title-like string, e.g., "Mr.", "Dr."
            'description' => fake()->sentence(3, true),
            'is_active' => fake()->boolean(80), // 80% chance of being true
            'created_by' => 'SYSTEM FACTORY',
        ];
    }
}
