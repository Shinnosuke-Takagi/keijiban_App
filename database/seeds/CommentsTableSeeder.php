<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for($i = 1; $i <= 3; $i ++){
        DB::table('comments')->insert([
          'post_id' => '1',
          'description' => 'テスト'.$i.'テスト'.$i.'テスト'.$i.'テスト'.$i,
        ]);
      }
    }
}
