<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'description' => fake()->text(),
            'start_at' => fake()->dateTime(),
            'end_at' => fake()->dateTime(),
            'location' => fake()->city(),
            'available_tickets' => fake()->numberBetween(0,100000),
            'price' => fake()->randomFloat(2, 50, 1000),
            'category' => random_int(1, 6)

        ];
    }
}
