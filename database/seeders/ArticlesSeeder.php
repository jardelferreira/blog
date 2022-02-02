<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use joshtronic\LoremIpsum;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lipsum = new LoremIpsum();

        for ($i=1; $i < 5; $i++) { 
            DB::table('articles')->insert([
                'title' => $lipsum->words(\random_int(1,4)),
                "content" => $lipsum->paragraphs(\random_int(1,3)),
                "author_id" => $i
            ]);
        }
    }
}
