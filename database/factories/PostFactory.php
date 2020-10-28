<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'        => $this->faker->catchPhrase,
            'subtitle'     => $this->faker->randomElement([null, $this->faker->sentence]),
            'body'         => $this->faker->sentences(3, true),
            'published_at' => $this->faker->randomElement([null, $this->faker->dateTime]),
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Post $post) {
            $post->comments()->saveMany(
                Comment::factory()->count(random_int(0, 10))->make()
            );
        });
    }
}
