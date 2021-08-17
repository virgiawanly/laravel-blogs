<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Topic;
use App\Models\User;
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
        User::factory(2)->create();
        Article::factory(10)->create();
        Topic::factory(5)->create();

        $articles = Article::all();
        $articles->each(function ($p) {
            $p->topics()->attach([rand(1, 3), rand(4, 5)]);
        });
    }
}
