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
        Artisan::call('passport:install');

        create_admin_user();

        initialize_articles_permissions();

        first_user_as_articles_manager();

        factory(Article::class, 50)->create();
    }
}
