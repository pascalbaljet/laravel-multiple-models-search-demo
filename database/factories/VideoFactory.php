<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Video::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'         => $this->faker->catchPhrase,
            'description'  => $this->faker->text,
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
        return $this->afterCreating(function (Video $video) {
            $video->comments()->saveMany(
                Comment::factory()->count(random_int(0, 10))->make()
            );
        });
    }
}
