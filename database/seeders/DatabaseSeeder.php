<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\PostTableSeeder;
use Database\Seeders\CommentTableSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PostTableSeeder::class,
            CommentTableSeeder::class
        ]);
    }
}
