<?php

use Ergare17\Articles\Models\Article;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Article::class, 50)->create();

        Artisan::call('passport:install');
    }
}
