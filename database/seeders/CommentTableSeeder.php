<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'user_id' => 2,
            'post_id'=> 52,
            'content' => "Comment!",
        ]);
    }
}
