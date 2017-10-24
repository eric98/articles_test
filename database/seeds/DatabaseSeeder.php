<?php

use Illuminate\Database\Seeder;
use Ergare17\Articles\Models\Article;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Article::class,50)->create();
    }
}
