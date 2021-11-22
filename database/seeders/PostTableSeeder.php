<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'user_id' => 1,
            'content' => "Hello, this is testing post!",
            'visibility' => 1
        ]);
    }
}
