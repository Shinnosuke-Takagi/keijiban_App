<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
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
          'category_id' => 3,
          'title' => 'テストタイトル',
          'detail' => 'テストです！',
        ]);
    }
}
