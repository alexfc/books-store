<?php

namespace Database\Factories;

use App\Enums\BookStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'author' => $this->faker->name(),
            'release_date' => $this->faker->dateTimeBetween('-10 years', 'now'),
            'category' => $this->faker->word(),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'status' => $this->faker->randomElement(BookStatus::cases()),
        ];
    }
}
