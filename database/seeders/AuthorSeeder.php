<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 5; $i++) { 
            DB::table('authors')->insert([
                'name' => "Author-{$i}",
                'email' => Str::random(10).'@gmail.com',
            ]);
            
        }
    }
}
