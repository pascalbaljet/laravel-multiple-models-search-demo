<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'       => $this->faker->catchPhrase,
            'description' => $this->faker->text,
            'released_at' => $this->faker->dateTime,
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Book $book) {
            $book->comments()->saveMany(
                Comment::factory()->count(random_int(0, 10))->make()
            );
        });
    }
}
