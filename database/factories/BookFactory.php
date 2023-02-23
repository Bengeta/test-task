<?php

namespace Database\Factories;

use App\Models\Author;
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
    protected $book = Book::class;
    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->realTextBetween(15,25),
            'author_id' => $this->faker->randomElement(Author::query()->pluck('id')),
            'description' => $this->faker->realText(),
            'page_count' => $this->faker->randomDigit()*100,
        ];
    }
}
