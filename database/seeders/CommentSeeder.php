<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use joshtronic\LoremIpsum;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lipsum = new LoremIpsum();

        for ($i=1; $i <= 20; $i++) { 
            DB::table('comments')->insert([
                'grade' => 0,
                'comment' => $lipsum->words(\random_int(4,15)),
                'article_id' => \random_int(1,4)
            ]);
        }
    }
}
