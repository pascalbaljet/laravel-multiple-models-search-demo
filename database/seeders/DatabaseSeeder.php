<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Book::factory(100)->create();
        Post::factory(100)->create();
        Video::factory(100)->create();
    }
}
